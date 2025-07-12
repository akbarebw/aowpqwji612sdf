<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\PangkatGolongan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PengajuanFungsionalPegawai;


class PengajuanFungsionalPegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan_fungsional_pegawai.index');
    }


    public function data_table()
    {
        $pengajuan = PengajuanFungsionalPegawai::orderBy('created_at', 'desc');

        return DataTables::of($pengajuan)
            ->addColumn('action', function ($row) {
                $button = '';

                // edit button only if status is not approved
                if ($row->status != 'Approved') {
                    $button .= '<a title="Edit" href="' . route('dashboard.pengajuan-fungsional-pegawai.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a> ';
                }

                // approve button
                $button .= '<a title="Persetujuan" href="' . route('dashboard.pengajuan-fungsional-pegawai.persetujuan', $row->id) . '" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a> ';

                // delete button
                $button .= '<button title="Hapus" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button> ';

                return $button;
            })
            ->addColumn('status', function ($row) {
                if($row->status == 'Pending') {
                    return '<span class="badge badge-warning">' . $row->status . '</span>';
                } elseif($row->status == 'Approved') {
                    return '<span class="badge badge-success">' . $row->status . '</span>';
                } elseif($row->status == 'Rejected') {
                    // return rejected with reason
                    return '<span class="badge badge-danger">' . $row->status . '</span><br><small class="text-danger">Alasan: ' . $row->reason . '</small>';
                }
            })
            ->addColumn('golongan_diajukan', function ($row) {
                return $row->golonganDiajukan->kode_golongan . ' - ' . $row->golonganDiajukan->nama_pangkat ?? '-';
            })
            ->addColumn('sk_pangkat_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pangkat_terakhir);
                if ($row->sk_pangkat_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pangkat_terakhir) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('ijazah_transkrip_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->ijazah_transkrip_terakhir);
                if ($row->ijazah_transkrip_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->ijazah_transkrip_terakhir) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('penilaian_angka_kredit', function ($row) {
                $filePath = public_path('storage/' . $row->penilaian_angka_kredit);
                if ($row->penilaian_angka_kredit && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->penilaian_angka_kredit) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('dp3_skp', function ($row) {
                $filePath = public_path('storage/' . $row->dp3_skp);
                if ($row->dp3_skp && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->dp3_skp) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sertifikat_lulus_ukom', function ($row) {
                $filePath = public_path('storage/' . $row->sertifikat_lulus_ukom);
                if ($row->sertifikat_lulus_ukom && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sertifikat_lulus_ukom) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sertifikat_diklat', function ($row) {
                $filePath = public_path('storage/' . $row->sertifikat_diklat);
                if ($row->sertifikat_diklat && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sertifikat_diklat) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->rawColumns(['sk_pangkat_terakhir', 'ijazah_transkrip_terakhir', 'penilaian_angka_kredit', 'dp3_skp', 'sertifikat_lulus_ukom', 'sertifikat_diklat', 'action', 'status'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $golongans = PangkatGolongan::all();
        return view('dashboard.pengajuan_fungsional_pegawai.create', compact('golongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sk_pangkat_terakhir'       => 'required|file|max:50000',
            'ijazah_transkrip_terakhir' => 'required|file|max:50000',
            'penilaian_angka_kredit'    => 'required|file|max:50000',
            'dp3_skp'                   => 'required|file|max:50000',
            'sertifikat_lulus_ukom'     => 'required|file|max:50000',
            'sertifikat_diklat'         => 'required|file|max:50000',
        ]);

        $uploadPath = public_path('storage/pengajuan_fungsional_pegawai');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true); // bikin folder kalau belum ada
        }

        $skPangkat = null;
        $ijazahTranskripTerakhir = null;
        $penilaianAngkaKredit = null;
        $dp3Skp = null;
        $sertifikatLulusUkom = null;
        $sertifikatDiklat = null;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $file = $request->file('sk_pangkat_terakhir');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPangkat = 'pengajuan_fungsional_pegawai/' . $fileName;
        }

        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $file = $request->file('ijazah_transkrip_terakhir');
            $fileName = 'IjazahTranskripTerakhir_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $ijazahTranskripTerakhir = 'pengajuan_fungsional_pegawai/' . $fileName;
        }

        if ($request->hasFile('penilaian_angka_kredit')) {
            $file = $request->file('penilaian_angka_kredit');
            $fileName = 'PenilaianAngkaKredit_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $penilaianAngkaKredit = 'pengajuan_fungsional_pegawai/' . $fileName;
        }


        if ($request->hasFile('dp3_skp')) {
            $file = $request->file('dp3_skp');
            $fileName = 'DP3SKP_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $dp3Skp = 'pengajuan_fungsional_pegawai/' . $fileName;
        }

        if ($request->hasFile('sertifikat_lulus_ukom')) {
            $file = $request->file('sertifikat_lulus_ukom');
            $fileName = 'SertifikatLulusUkom_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $sertifikatLulusUkom = 'pengajuan_fungsional_pegawai/' . $fileName;
        }

        if ($request->hasFile('sertifikat_diklat')) {
            $file = $request->file('sertifikat_diklat');
            $fileName = 'SertifikatDiklat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $sertifikatDiklat = 'pengajuan_fungsional_pegawai/' . $fileName;
        }

        if(auth()->user()){
            $golonganSebelumnya = Pegawai::where('user_id', auth()->user()->id)->first()->pangkat_golongan_id;
        } else {
            $golonganSebelumnya = null;
        }

        PengajuanFungsionalPegawai::create([
            'golongan_sebelumnya'       => $golonganSebelumnya,
            'golongan_diajukan'         => $request->golongan_diajukan,
            'sk_pangkat_terakhir'       => $skPangkat,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'penilaian_angka_kredit'    => $penilaianAngkaKredit,
            'dp3_skp'                   => $dp3Skp,
            'sertifikat_lulus_ukom'     => $sertifikatLulusUkom,
            'sertifikat_diklat'         => $sertifikatDiklat,
            'status'                    => 'Pending',
            'created_by'                => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-pegawai.index')->with('success', 'Pengajuan berhasil diajukan');
    }


    public function edit($id)
    {
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);
        $golongans = PangkatGolongan::all();
        return view('dashboard.pengajuan_fungsional_pegawai.edit', compact('pengajuan', 'golongans'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);

        $skPangkat               = $pengajuan->sk_pangkat_terakhir;
        $ijazahTranskripTerakhir = $pengajuan->ijazah_transkrip_terakhir;
        $penilaianAngkaKredit    = $pengajuan->penilaian_angka_kredit;
        $dp3Skp                  = $pengajuan->dp3_skp;
        $sertifikatLulusUkom     = $pengajuan->sertifikat_lulus_ukom;
        $sertifikatDiklat        = $pengajuan->sertifikat_diklat;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $skPangkat = $request->file('sk_pangkat_terakhir')->store('pengajuan', 'public');
        }

        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $ijazahTranskripTerakhir = $request->file('ijazah_transkrip_terakhir')->store('pengajuan_fungsional_pegawai', 'public');
        }

        if ($request->hasFile('penilaian_angka_kredit')) {
            $penilaianAngkaKredit = $request->file('penilaian_angka_kredit')->store('pengajuan_fungsional_pegawai', 'public');
        }

        if ($request->hasFile('dp3_skp')) {
            $dp3Skp = $request->file('dp3_skp')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sertifikat_lulus_ukom')) {
            $sertifikatLulusUkom = $request->file('sertifikat_lulus_ukom')->store('pengajuan_fungsional_pegawai', 'public');
        }

        if ($request->hasFile('sertifikat_diklat')) {
            $sertifikatDiklat = $request->file('sertifikat_diklat')->store('pengajuan_fungsional_pegawai', 'public');
        }

        $pengajuan->update([
            'golongan_diajukan'         => $request->golongan_diajukan,
            'sk_pangkat_terakhir'       => $skPangkat,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'penilaian_angka_kredit'    => $penilaianAngkaKredit,
            'dp3_skp'                   => $dp3Skp,
            'sertifikat_lulus_ukom'     => $sertifikatLulusUkom,
            'sertifikat_diklat'         => $sertifikatDiklat,
            'status'                    => 'Pending',
            'reason'                    => null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-pegawai.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }

    public function persetujuan($id){
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);
        return view('dashboard.pengajuan_fungsional_pegawai.approval', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Approved',
            'decided_by' => auth()->user()->id ?? null,
        ]);

        // update pegawai -> pangkat_golongan_id
        $pegawai = Pegawai::where('user_id', $pengajuan->created_by)->first();
        $pegawai->update([
            'pangkat_golongan_id' => $pengajuan->golongan_diajukan,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-pegawai.index')->with('success', 'Pengajuan berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Rejected',
            'reason' => $request->reason,
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-pegawai.index')->with('success', 'Pengajuan berhasil ditolak');
    }
}
