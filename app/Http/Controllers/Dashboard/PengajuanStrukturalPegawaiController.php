<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\JabatanStruktural;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PegawaiJabatanStruktural;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PengajuanStrukturalPegawai;


class PengajuanStrukturalPegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan_struktural_pegawai.index');
    }


    public function data_table()
    {
        $pengajuan = PengajuanStrukturalPegawai::orderBy('created_at', 'desc');

        return DataTables::of($pengajuan)
            ->addColumn('action', function ($row) {
                $button = '';

                // edit button only if status is not approved
                if ($row->status != 'Approved') {
                    $button .= '<a title="Edit" href="' . route('dashboard.pengajuan-struktural-pegawai.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a> ';
                }

                // approve button
                $button .= '<a title="Persetujuan" href="' . route('dashboard.pengajuan-struktural-pegawai.persetujuan', $row->id) . '" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a> ';

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
                    return '<span class="badge badge-danger">' . $row->status . '</span><br><small class="text-danger">Alasan: ' . $row->reason . '</small>';
                }
            })
            ->addColumn('jabatan_sebelumnya', function($row) {
                return $row->jabatanSebelumnya->name ?? '-';
            })
            ->addColumn('jabatan_diajukan', function($row) {
                return $row->jabatanDiajukan->name ?? '-';
            })
            ->addColumn('created_by', function ($row) {
                return $row->createdBy->name ?? '-';
            })
            ->addColumn('decided_by', function ($row) {
                return $row->decidedBy->name ?? '-';
            })
            ->addColumn('sk_pangkat_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pangkat_terakhir);
                if ($row->sk_pangkat_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pangkat_terakhir) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sk_jabatan_struktural', function ($row) {
                $filePath = public_path('storage/' . $row->sk_jabatan_struktural);
                if ($row->sk_jabatan_struktural && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_jabatan_struktural) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('skp', function ($row) {
                $filePath = public_path('storage/' . $row->skp);
                if ($row->skp && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->skp) . '" target="_blank">Lihat File</a>';
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
            ->addColumn('kartu_pegawai', function ($row) {
                $filePath = public_path('storage/' . $row->kartu_pegawai);
                if ($row->kartu_pegawai && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->kartu_pegawai) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sk_cpns', function ($row) {
                $filePath = public_path('storage/' . $row->sk_cpns);
                if ($row->sk_cpns && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_cpns) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('surat_pengantar', function ($row) {
                $filePath = public_path('storage/' . $row->surat_pengantar);
                if ($row->surat_pengantar && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->surat_pengantar) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('dokumen_terkait', function ($row) {
                $filePath = public_path('storage/' . $row->dokumen_terkait);
                if ($row->dokumen_terkait && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->dokumen_terkait) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->rawColumns([
                'action',
                'status',
                'sk_pangkat_terakhir',
                'sk_jabatan_struktural',
                'skp',
                'ijazah_transkrip_terakhir',
                'kartu_pegawai',
                'sk_cpns',
                'surat_pengantar',
                'dokumen_terkait'
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $jabatanStrukturals = JabatanStruktural::all();
        return view('dashboard.pengajuan_struktural_pegawai.create', compact('jabatanStrukturals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sk_pangkat_terakhir'       => 'required|file|max:50000',
            'sk_jabatan_struktural'     => 'required|file|max:50000',
            'skp'                       => 'required|file|max:50000',
            'ijazah_transkrip_terakhir' => 'required|file|max:50000',
            'kartu_pegawai'             => 'file|max:50000',
            'sk_cpns'                   => 'file|max:50000',
            'surat_pengantar'           => 'file|max:50000',
            'dokumen_terkait'           => 'file|max:50000',
        ]);

        $uploadPath = public_path('storage/pengajuan_struktural_pegawai');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true); // bikin folder kalau belum ada
        }

        $skPangkat = null;
        $skStruktural = null;
        $skp = null;
        $ijazahTranskripTerakhir = null;
        $kartuPegawai = null;
        $skCpns = null;
        $suratPengantar = null;
        $dokumenTerkait = null;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $file = $request->file('sk_pangkat_terakhir');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPangkat = 'pengajuan_struktural_pegawai/' . $fileName;
        }

        if ($request->hasFile('sk_jabatan_struktural')) {
            $file = $request->file('sk_jabatan_struktural');
            $fileName = 'SKJabatan_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skStruktural = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('skp')) {
            $file = $request->file('skp');
            $fileName = 'SKP_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skp = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $file = $request->file('ijazah_transkrip_terakhir');
            $fileName = 'Ijazah_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $ijazahTranskripTerakhir = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('kartu_pegawai')) {
            $file = $request->file('kartu_pegawai');
            $fileName = 'KartuPegawai_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $kartuPegawai = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('sk_cpns')) {
            $file = $request->file('sk_cpns');
            $fileName = 'SKCPNS_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skCpns = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('surat_pengantar')) {
            $file = $request->file('surat_pengantar');
            $fileName = 'SuratPengantar_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $suratPengantar = 'pengajuan_struktural_pegawai/' . $fileName;
        }
        if ($request->hasFile('dokumen_terkait')) {
            $file = $request->file('dokumen_terkait');
            $fileName = 'DokumenTerkait_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $dokumenTerkait = 'pengajuan_struktural_pegawai/' . $fileName;
        }

        if(auth()->user()){
            $pegawaiId = Pegawai::where('user_id', auth()->user()->id)->first();
            $jabatanStrukturalId = null;
            if ($pegawaiId) {
                $jabatanStrukturalId = JabatanStruktural::where('pegawai_id', $pegawaiId)->first()->id;
            }
        }

        PengajuanStrukturalPegawai::create([
            'jabatan_sebelumnya'        => $jabatanStrukturalId ?? null,
            'jabatan_diajukan'          => $request->jabatan_diajukan,
            'sk_pangkat_terakhir'       => $skPangkat,
            'sk_jabatan_struktural'     => $skStruktural,
            'skp'                       => $skp,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'kartu_pegawai'             => $kartuPegawai,
            'sk_cpns'                   => $skCpns,
            'surat_pengantar'           => $suratPengantar,
            'dokumen_terkait'           => $dokumenTerkait,
            'status'                    => 'Pending',
            'created_by'                => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-struktural-pegawai.index')->with('success', 'Pengajuan berhasil diajukan');
    }


    public function edit($id)
    {
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);
        $jabatanStrukturals = JabatanStruktural::all();
        return view('dashboard.pengajuan_struktural_pegawai.edit', compact('pengajuan', 'jabatanStrukturals'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);

        $skPangkat               = $pengajuan->sk_pangkat_terakhir;
        $skStruktural            = $pengajuan->sk_jabatan_struktural;
        $skp                     = $pengajuan->skp;
        $ijazahTranskripTerakhir = $pengajuan->ijazah_transkrip_terakhir;
        $kartuPegawai            = $pengajuan->kartu_pegawai;
        $skCpns                  = $pengajuan->sk_cpns;
        $suratPengantar          = $pengajuan->surat_pengantar;
        $dokumenTerkait          = $pengajuan->dokumen_terkait;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $skPangkat = $request->file('sk_pangkat_terakhir')->store('pengajuan', 'public');
        }
        if ($request->hasFile('sk_jabatan_struktural')) {
            $skStruktural = $request->file('sk_jabatan_struktural')->store('pengajuan', 'public');
        }
        if ($request->hasFile('skp')) {
            $skp = $request->file('skp')->store('pengajuan', 'public');
        }
        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $ijazahTranskripTerakhir = $request->file('ijazah_transkrip_terakhir')->store('pengajuan', 'public');
        }
        if ($request->hasFile('kartu_pegawai')) {
            $kartuPegawai = $request->file('kartu_pegawai')->store('pengajuan', 'public');
        }
        if ($request->hasFile('sk_cpns')) {
            $skCpns = $request->file('sk_cpns')->store('pengajuan', 'public');
        }
        if ($request->hasFile('surat_pengantar')) {
            $suratPengantar = $request->file('surat_pengantar')->store('pengajuan', 'public');
        }
        if ($request->hasFile('dokumen_terkait')) {
            $dokumenTerkait = $request->file('dokumen_terkait')->store('pengajuan', 'public');
        }


        if(auth()->user()){
            $pegawaiId = Pegawai::where('user_id', auth()->user()->id)->first();
            $jabatanStrukturalId = null;
            if ($pegawaiId) {
                $jabatanStrukturalId = JabatanStruktural::where('pegawai_id', $pegawaiId)->first()->id;
            }
        }

        $pengajuan->update([
            'jabatan_sebelumnya'        => $jabatanStrukturalId ?? null,
            'jabatan_diajukan'          => $request->jabatan_diajukan,
            'sk_pangkat_terakhir'       => $skPangkat,
            'sk_jabatan_struktural'     => $skStruktural,
            'skp'                       => $skp,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'kartu_pegawai'             => $kartuPegawai,
            'sk_cpns'                   => $skCpns,
            'surat_pengantar'           => $suratPengantar,
            'dokumen_terkait'           => $dokumenTerkait,
            'status'                    => 'Pending',
        ]);

        return redirect()->route('dashboard.pengajuan-struktural-pegawai.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }

    public function persetujuan($id){
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);
        return view('dashboard.pengajuan_struktural_pegawai.approval', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Approved',
            'decided_by' => auth()->user()->id ?? null,
        ]);

        // Update Jabatan Struktural Pegawai
        $pegawai = Pegawai::where('user_id', $pengajuan->created_by)->first();
        if($pegawai) {
            PegawaiJabatanStruktural::where('pegawai_id', $pegawai->id)->delete();
            PegawaiJabatanStruktural::create([
                'pegawai_id'            => $pegawai->id,
                'jabatan_struktural_id' => $pengajuan->jabatan_diajukan,
                'status'                => 'aktif',
                'is_aktif'            => 1,
            ]);
        }


        return redirect()->route('dashboard.pengajuan-struktural-pegawai.index')->with('success', 'Pengajuan berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = PengajuanStrukturalPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Rejected',
            'reason' => $request->reason,
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-struktural-pegawai.index')->with('success', 'Pengajuan berhasil ditolak');
    }
}
