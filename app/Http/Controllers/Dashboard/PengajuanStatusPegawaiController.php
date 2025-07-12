<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanStatusPegawai;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class PengajuanStatusPegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan_status_pegawai.index');
    }


    public function data_table()
    {
        $pengajuan = PengajuanStatusPegawai::orderBy('created_at', 'desc');

        return DataTables::of($pengajuan)
            ->addColumn('action', function ($row) {
                $button = '';

                // edit button only if status is not approved
                if ($row->status != 'Approved') {
                    $button .= '<a title="Edit" href="' . route('dashboard.pengajuan-status-pegawai.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a> ';
                }

                // approve button
                $button .= '<a title="Persetujuan" href="' . route('dashboard.pengajuan-status-pegawai.persetujuan', $row->id) . '" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></a> ';

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
            ->addColumn('sk_pangkat_terakhir', function ($row) {
                $filePath = public_path('storage/' . $row->sk_pangkat_terakhir);
                if ($row->sk_pangkat_terakhir && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_pangkat_terakhir) . '" target="_blank">Lihat File</a>';
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
            ->addColumn('sk_mutasi', function ($row) {
                $filePath = public_path('storage/' . $row->sk_mutasi);
                if ($row->sk_mutasi && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->sk_mutasi) . '" target="_blank">Lihat File</a>';
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
            ->addColumn('skp', function ($row) {
                $filePath = public_path('storage/' . $row->skp);
                if ($row->skp && file_exists($filePath)) {
                    return '<a href="' . asset('storage/' . $row->skp) . '" target="_blank">Lihat File</a>';
                } else {
                    return '<span class="text-danger">File tidak ditemukan</span>';
                }
            })
            ->rawColumns([
                'action',
                'status',
                'sk_pangkat_terakhir',
                'sk_cpns',
                'sk_mutasi',
                'ijazah_transkrip_terakhir',
                'skp',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.pengajuan_status_pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sk_pangkat_terakhir'       => 'required|file|max:50000',
            'sk_cpns'                   => 'required|file|max:50000',
            'sk_mutasi'                 => 'required|file|max:50000',
            'ijazah_transkrip_terakhir' => 'required|file|max:50000',
            'skp'                       => 'required|file|max:50000',
        ]);

        $uploadPath = public_path('storage/pengajuan_status_pegawai');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true); // bikin folder kalau belum ada
        }

        $skPangkat = null;
        $skCpns = null;
        $skMutasi = null;
        $ijazahTranskripTerakhir = null;
        $skp = null;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $file = $request->file('sk_pangkat_terakhir');
            $fileName = 'SKPangkat_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skPangkat = 'pengajuan_status_pegawai/' . $fileName;
        }

        if ($request->hasFile('sk_cpns')) {
            $file = $request->file('sk_cpns');
            $fileName = 'SKCPNS_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skCpns = 'pengajuan_status_pegawai/' . $fileName;
        }

        if ($request->hasFile('sk_mutasi')) {
            $file = $request->file('sk_mutasi');
            $fileName = 'SKMutasi_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skMutasi = 'pengajuan_status_pegawai/' . $fileName;
        }

        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $file = $request->file('ijazah_transkrip_terakhir');
            $fileName = 'IjazahTranskrip_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $ijazahTranskripTerakhir = 'pengajuan_status_pegawai/' . $fileName;
        }

        if ($request->hasFile('skp')) {
            $file = $request->file('skp');
            $fileName = 'SKP_' . Str::slug(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $skp = 'pengajuan_status_pegawai/' . $fileName;
        }

        PengajuanStatusPegawai::create([
            'sk_pangkat_terakhir'       => $skPangkat,
            'sk_cpns'                   => $skCpns,
            'sk_mutasi'                 => $skMutasi,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'skp'                       => $skp,
            'status'                    => 'Pending',
            'created_by'                => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-status-pegawai.index')->with('success', 'Pengajuan berhasil diajukan');
    }


    public function edit($id)
    {
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);
        return view('dashboard.pengajuan_status_pegawai.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);

        $skPangkat               = $pengajuan->sk_pangkat_terakhir;
        $skCpns                  = $pengajuan->sk_cpns;
        $skMutasi                = $pengajuan->sk_mutasi;
        $ijazahTranskripTerakhir = $pengajuan->ijazah_transkrip_terakhir;
        $skp                     = $pengajuan->skp;

        if ($request->hasFile('sk_pangkat_terakhir')) {
            $skPangkat = $request->file('sk_pangkat_terakhir')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sk_cpns')) {
            $skCpns = $request->file('sk_cpns')->store('pengajuan', 'public');
        }

        if ($request->hasFile('sk_mutasi')) {
            $skMutasi = $request->file('sk_mutasi')->store('pengajuan', 'public');
        }

        if ($request->hasFile('ijazah_transkrip_terakhir')) {
            $ijazahTranskripTerakhir = $request->file('ijazah_transkrip_terakhir')->store('pengajuan', 'public');
        }

        if ($request->hasFile('skp')) {
            $skp = $request->file('skp')->store('pengajuan', 'public');
        }

        $pengajuan->update([
            'sk_pangkat_terakhir'       => $skPangkat,
            'sk_cpns'                   => $skCpns,
            'sk_mutasi'                 => $skMutasi,
            'ijazah_transkrip_terakhir' => $ijazahTranskripTerakhir,
            'skp'                       => $skp,
            'status'                    => 'Pending',
        ]);

        return redirect()->route('dashboard.pengajuan-status-pegawai.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }

    public function persetujuan($id){
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);
        return view('dashboard.pengajuan_status_pegawai.approval', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Approved',
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-status-pegawai.index')->with('success', 'Pengajuan berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = PengajuanStatusPegawai::findOrFail($id);
        $pengajuan->update([
            'status' => 'Rejected',
            'reason' => $request->reason,
            'decided_by' => auth()->user()->id ?? null,
        ]);

        return redirect()->route('dashboard.pengajuan-status-pegawai.index')->with('success', 'Pengajuan berhasil ditolak');
    }
}
