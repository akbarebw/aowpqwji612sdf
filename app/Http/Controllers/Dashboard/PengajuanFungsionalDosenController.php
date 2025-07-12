<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PengajuanFungsionalDosen;
use Yajra\DataTables\Facades\DataTables;


class PengajuanFungsionalDosenController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan_fungsional_dosen.index');
    }


    public function data_table()
    {
        $pengajuan = PengajuanFungsionalDosen::orderBy('created_at', 'desc');

        return DataTables::of($pengajuan)
            ->addColumn('action', function ($row) {
                $button = '';

                // edit button only if status is not approved
                if ($row->status != 'Approved') {
                    $button .= '<a title="Edit" href="' . route('dashboard.pengajuan-fungsional-dosen.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a> ';
                }

                // approve button
                $button .= '<a title="Persetujuan" href="' . route('dashboard.pengajuan-fungsional-dosen.persetujuan', $row->id) . '" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a> ';

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
            ->addColumn('ijazah_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->ijazah_terakhir);
                if ($row->ijazah_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->ijazah_terakhir) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('akreditasi_prodi', function ($row) {
                $filePath = public_path('storage/' . $row->akreditasi_prodi);
                if ($row->akreditasi_prodi && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->akreditasi_prodi) . '" target="_blank">Lihat File</a>';
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
            ->addColumn('bukti_bkd', function ($row) {
                $filePath = public_path('storage/' . $row->bukti_bkd);
                if ($row->bukti_bkd && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->bukti_bkd) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('surat_pengantar', function ($row) {
                $filePath = public_path('storage/' . $row->bukti_bkd);
                if ($row->bukti_bkd && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->bukti_bkd) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sk_pangkat', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pangkat);
                if ($row->sk_pangkat && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pangkat) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sk_jabatan', function ($row) {
                $filePath = public_path('storage/' . $row->sk_jabatan);
                if ($row->sk_jabatan && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_jabatan) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->addColumn('sertifikasi_dosen', function ($row) {
                $filePath = public_path('storage/' . $row->sertifikasi_dosen);
                if ($row->sertifikasi_dosen && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sertifikasi_dosen) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->rawColumns([
                'action',
                'status',
                'ijazah_terakhir',
                'akreditasi_prodi',
                'skp',
                'bukti_bkd',
                'surat_pengantar',
                'sk_pangkat',
                'sk_jabatan',
                'sertifikasi_dosen',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.pengajuan_fungsional_dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ijazah_terakhir'       => 'required|file|max:50000',
            'akreditasi_prodi'     => 'required|file|max:50000',
            'skp'                  => 'required|file|max:50000',
            'bukti_bkd'           => 'required|file|max:50000',
            'surat_pengantar'           => 'required|file|max:50000',
            'sk_pangkat'         => 'required|file|max:50000',
            'sk_jabatan'         => 'required|file|max:50000',
            'sertifikasi_dosen'   => 'required|file|max:50000',
        ]);

        $uploadPath = public_path('storage/pengajuan_fungsional_dosen');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true); // bikin folder kalau belum ada
        }

        $ijazahTerakhir = null;
        $akreditasiProdi = null;
        $skp = null;
        $buktiBkd = null;
        $suratPengantar = null;
        $skPangkat = null;
        $skJabatan = null;
        $sertifikasiDosen = null;

        if ($request->hasFile('ijazah_terakhir')) {
            $file = $request->file('ijazah_terakhir');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $ijazahTerakhir = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('akreditasi_prodi')) {
            $file = $request->file('akreditasi_prodi');
            $fileName = 'AkreditasiProdi_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $akreditasiProdi = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('skp')) {
            $file = $request->file('skp');
            $fileName = 'SKP_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skp = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('bukti_bkd')) {
            $file = $request->file('bukti_bkd');
            $fileName = 'BuktiBKD_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $buktiBkd = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('surat_pengantar')) {
            $file = $request->file('surat_pengantar');
            $fileName = 'SuratPengantar_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $suratPengantar = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('sk_pangkat')) {
            $file = $request->file('sk_pangkat');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPangkat = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('sk_jabatan')) {
            $file = $request->file('sk_jabatan');
            $fileName = 'SKJabatan_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skJabatan = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        if ($request->hasFile('sertifikasi_dosen')) {
            $file = $request->file('sertifikasi_dosen');
            $fileName = 'SertifikasiDosen_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $sertifikasiDosen = 'pengajuan_fungsional_dosen/' . $fileName;
        }

        $pengajuan = PengajuanFungsionalDosen::create([
            'ijazah_terakhir'     => $ijazahTerakhir,
            'akreditasi_prodi'    => $akreditasiProdi,
            'skp'                 => $skp,
            'bukti_bkd'           => $buktiBkd,
            'surat_pengantar'     => $suratPengantar,
            'sk_pangkat' => $skPangkat,
            'sk_jabatan'          => $skJabatan,
            'sertifikasi_dosen'    => $sertifikasiDosen,
            'status'              => 'Pending',
            'created_by'          => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-dosen.index')->with('success', 'Pengajuan berhasil diajukan');
    }


    public function edit($id)
    {
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);
        return view('dashboard.pengajuan_fungsional_dosen.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);

        $ijazahTerakhir   = $pengajuan->ijazah_terakhir;
        $akreditasiProdi  = $pengajuan->akreditasi_prodi;
        $skp              = $pengajuan->skp;
        $buktiBkd         = $pengajuan->bukti_bkd;
        $suratPengantar   = $pengajuan->surat_pengantar;
        $skPangkat        = $pengajuan->sk_pangkat;
        $skJabatan        = $pengajuan->sk_jabatan;
        $sertifikasiDosen = $pengajuan->sertifikasi_dosen;

        if ($request->hasFile('ijazah_terakhir')) {
            $ijazahTerakhir = $request->file('ijazah_terakhir')->store('pengajuan', 'public');
        }

        if ($request->hasFile('akreditasi_prodi')) {
            $akreditasiProdi = $request->file('akreditasi_prodi')->store('pengajuan', 'public');
        }

        if ($request->hasFile('skp')) {
            $skp = $request->file('skp')->store('pengajuan', 'public');
        }

        if ($request->hasFile('bukti_bkd')) {
            $buktiBkd = $request->file('bukti_bkd')->store('pengajuan', 'public');
        }

        if ($request->hasFile('surat_pengantar')) {
            $suratPengantar = $request->file('surat_pengantar')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sk_pangkat')) {
            $skPangkat = $request->file('sk_pangkat')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sk_jabatan')) {
            $skJabatan = $request->file('sk_jabatan')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sertifikasi_dosen')) {
            $sertifikasiDosen = $request->file('sertifikasi_dosen')->store('pengajuan', 'public');
        }

        $pengajuan->update([
            'ijazah_terakhir'       => $ijazahTerakhir,
            'akreditasi_prodi'     => $akreditasiProdi,
            'skp'                  => $skp,
            'bukti_bkd'           => $buktiBkd,
            'surat_pengantar'     => $suratPengantar,
            'sk_pangkat' => $skPangkat,
            'sk_jabatan'          => $skJabatan,
            'sertifikasi_dosen'    => $sertifikasiDosen,
            'status'                    => 'Pending',
            'reason'                    => null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-dosen.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }

    public function persetujuan($id){
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);
        return view('dashboard.pengajuan_fungsional_dosen.approval', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);
        $pengajuan->update([
            'status' => 'Approved',
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-dosen.index')->with('success', 'Pengajuan berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = PengajuanFungsionalDosen::findOrFail($id);
        $pengajuan->update([
            'status' => 'Rejected',
            'reason' => $request->reason,
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-fungsional-dosen.index')->with('success', 'Pengajuan berhasil ditolak');
    }
}
