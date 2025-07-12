<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Aset;
use App\Models\User;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\PegawaiAset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PangkatGolongan;
use App\Models\JabatanFungsional;
use App\Models\JabatanStruktural;
use App\Models\StatusKepegawaian;
use App\Http\Controllers\Controller;
use App\Models\PegawaiJabatanFungsional;
use App\Models\PegawaiJabatanStruktural;
use App\Models\PegawaiStatusKepegawaian;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.pegawai.index');
    }

    public function data_table(Request $request)
    {
        // Retrieve Pegawai data with the related jabatanStruktural, jabatanFungsional, and user relationships
        $pegawai = Pegawai::with(['jabatanStruktural', 'jabatanFungsional', 'user'])
            ->orderBy('nama', 'asc');

        return DataTables::of($pegawai)
            ->addIndexColumn()
            ->addColumn('jabatanStruktural', function ($row) {
                // Check if the jabatanStruktural relationship is not empty and return the name(s)
                $jabatanStruktural = $row->jabatanStruktural->take(5);
                return $jabatanStruktural->isNotEmpty()
                    ? $jabatanStruktural->pluck('name')->implode(', ')
                    : '-';
            })
            ->addColumn('jabatanFungsional', function ($row) {
                // Check if the jabatanFungsional relationship is not empty and return the name(s)
                $jabatanFungsional = $row->jabatanFungsional->take(5);
                return $jabatanFungsional->isNotEmpty()
                    ? $jabatanFungsional->pluck('nama_jabatan_fungsional')->implode(', ')
                    : '-';
            })
            ->addColumn('action', function ($row) {
                // Generate the edit URL and delete button with the row ID
                $editUrl = route('dashboard.pegawai.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                    </a>
                    <button data-id="' . $row->id . '" class="btn btn-danger btn-sm delete">
                        <i class="fa fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action']) // Mark the action column to be rendered as raw HTML
            ->make(true); // Return the data in DataTables-friendly format
    }



    public function create()
    {
        $agama = Agama::all();
        $jabatanStruktural = JabatanStruktural::all();
        $jabatanFungsional = JabatanFungsional::all();
        $user = User::orderBy('name', 'asc')->get();
        $statusPegawais = StatusKepegawaian::all();
        $asets = Aset::all();
        $golongans = PangkatGolongan::all();

        return view('dashboard.pegawai.create', compact('agama','jabatanStruktural','jabatanFungsional','user', 'statusPegawais', 'asets', 'golongans'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama'              => 'required',
            'email'             => 'nullable|email',
            'nip'               => 'required|unique:pegawai',
            'kontak'            => 'required',
            'foto'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'umur'              => 'required|integer',
            'jenis_kelamin'     => 'required',
            'id_agama'          => 'required',
            'alamat'            => 'required',
            'kewaranegaraan'    => 'required',
            'status_perkawinan' => 'required',
            'kontak_darurat'    => 'required',
            'status_pegawai_id' => 'required',
            'aset_id'           => 'required',
            // 'user_id' => 'required'
        ], [
            'nama.required'                  => 'Nama pegawai harus diisi',
            'email.email'                    => 'Format email tidak valid',
            'nip.required'                   => 'NIP harus diisi',
            'nip.unique'                     => 'NIP sudah digunakan',
            'kontak.required'                => 'Kontak harus diisi',
            'foto.image'                     => 'File harus berupa gambar',
            'foto.mimes'                     => 'Format foto tidak valid',
            'foto.max'                       => 'Ukuran foto maksimal 2MB',
            'tempat_lahir.required'          => 'Tempat lahir harus diisi',
            'tanggal_lahir.required'         => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date'             => 'Format tanggal lahir tidak valid',
            'umur.required'                  => 'Umur harus diisi',
            'umur.integer'                   => 'Umur harus berupa angka',
            'jenis_kelamin.required'         => 'Jenis kelamin harus dipilih',
            'id_agama.required'              => 'Agama harus dipilih',
            'alamat.required'                => 'Alamat harus diisi',
            'kewaranegaraan.required'        => 'Kewarganegaraan harus diisi',
            'status_perkawinan.required'     => 'Status perkawinan harus dipilih',
            'kontak_darurat.required'        => 'Kontak darurat harus diisi',
            'status_pegawai_id.required'     => 'Status pegawai harus dipilih',
            'aset_id.required'               => 'Aset harus dipilih',
        ]);

        $picture_name = null;

        if($request->hasFile('foto'))
        {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            //upload foto to folder
            $upload_path = public_path('storage/img/pegawai/');
            $picture_name = 'Pegawai_' . $request->nama .'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);

        }

        // Simpan data pegawai
        $pegawai = Pegawai::create([
            'nama'                => $request->nama,
            'email'               => $request->email,
            'nip'                 => $request->nip,
            'kontak'              => $request->kontak,
            'foto'                => $picture_name,
            'tempat_lahir'        => $request->tempat_lahir,
            'tanggal_lahir'       => $request->tanggal_lahir,
            'umur'                => $request->umur,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'id_agama'            => $request->id_agama,
            'alamat'              => $request->alamat,
            'kewaranegaraan'      => $request->kewaranegaraan,
            'status_perkawinan'   => $request->status_perkawinan,
            'kontak_darurat'      => $request->kontak_darurat,
            'user_id'             => $request->user_id,
            'pangkat_golongan_id' => $request->pangkat_golongan_id,
        ]);

        // jabatan multiple
        if($request->jabatan_struktural_id)
        {
            foreach ($request->jabatan_struktural_id as $jabatanId) {
                PegawaiJabatanStruktural::create([
                    'pegawai_id'            => $pegawai->id,
                    'jabatan_struktural_id' => $jabatanId,
                    'status'                => 'aktif',
                ]);
            }
        }

        if($request->jabatan_fungsional_id)
        {
            foreach ($request->jabatan_fungsional_id as $jabatan) {
                PegawaiJabatanFungsional::create([
                    'pegawai_id'            => $pegawai->id,
                    'jabatan_fungsional_id' => $jabatan,
                    'status'                => 'aktif',
                ]);
            }
        }

        if($request->status_pegawai_id)
        {
            foreach ($request->status_pegawai_id as $status) {
                PegawaiStatusKepegawaian::create([
                    'pegawai_id'            => $pegawai->id,
                    'status_kepegawaian_id' => $status,
                ]);
            }
        }

        if($request->aset_id)
        {
            foreach ($request->aset_id as $aset) {
                PegawaiAset::create([
                    'pegawai_id' => $pegawai->id,
                    'aset_id'    => $aset,
                ]);
            }
        }

        return redirect()->route('dashboard.pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('dashboard.pegawai.show', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = Pegawai::with(['jabatanStruktural', 'jabatanFungsional'])->where('id', $id)->firstOrFail();
        $agama = Agama::all();
        $jabatanStruktural = JabatanStruktural::all();
        $jabatanFungsional = JabatanFungsional::all();
        $user = User::orderBy('name', 'asc')->get();
        $statusPegawais = StatusKepegawaian::all();
        $asets = Aset::all();
        $pegawaiJabatanStruktural = PegawaiJabatanStruktural::where('pegawai_id', $pegawai->id)->pluck('jabatan_struktural_id')->toArray();
        $pegawaiJabatanFungsional = PegawaiJabatanFungsional::where('pegawai_id', $pegawai->id)->pluck('jabatan_fungsional_id')->toArray();
        $pegawaiStatus = PegawaiStatusKepegawaian::where('pegawai_id', $pegawai->id)->pluck('status_kepegawaian_id')->toArray();
        $pegawaiAset = PegawaiAset::where('pegawai_id', $pegawai->id)->pluck('aset_id')->toArray();
        $golongans = PangkatGolongan::all();

        return view('dashboard.pegawai.edit', compact('pegawai', 'agama', 'jabatanStruktural', 'jabatanFungsional', 'user', 'statusPegawais', 'asets', 'pegawaiJabatanStruktural', 'pegawaiJabatanFungsional', 'pegawaiStatus', 'pegawaiAset', 'golongans'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama'              => 'required',
            'email'             => 'nullable|email',
            'nip'               => 'required',
            'kontak'            => 'required',
            'foto'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'umur'              => 'required|integer',
            'jenis_kelamin'     => 'required',
            'id_agama'          => 'required',
            'alamat'            => 'required',
            'kewaranegaraan'    => 'required',
            'status_perkawinan' => 'required',
            'kontak_darurat'    => 'required',
            'status_pegawai_id' => 'required',
            'aset_id'           => 'required',
            // 'user_id' => 'required'
        ], [
            'nama.required'                  => 'Nama pegawai harus diisi',
            'email.email'                    => 'Format email tidak valid',
            'nip.required'                   => 'NIP harus diisi',
            'kontak.required'                => 'Kontak harus diisi',
            'foto.image'                     => 'File harus berupa gambar',
            'foto.mimes'                     => 'Format foto tidak valid',
            'foto.max'                       => 'Ukuran foto maksimal 2MB',
            'tempat_lahir.required'          => 'Tempat lahir harus diisi',
            'tanggal_lahir.required'         => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date'             => 'Format tanggal lahir tidak valid',
            'umur.required'                  => 'Umur harus diisi',
            'umur.integer'                   => 'Umur harus berupa angka',
            'jenis_kelamin.required'         => 'Jenis kelamin harus dipilih',
            'id_agama.required'              => 'Agama harus dipilih',
            'alamat.required'                => 'Alamat harus diisi',
            'kewaranegaraan.required'        => 'Kewarganegaraan harus diisi',
            'status_perkawinan.required'     => 'Status perkawinan harus dipilih',
            'kontak_darurat.required'        => 'Kontak darurat harus diisi',
            'status_pegawai_id.required'     => 'Status pegawai harus dipilih',
            'aset_id.required'               => 'Aset harus dipilih',
        ]);

        $picture_name = $pegawai->foto;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            // Hapus foto lama kalau ada
            if ($pegawai->foto && file_exists(public_path('storage/img/pegawai/' . $pegawai->foto))) {
                unlink(public_path('storage/img/pegawai/' . $pegawai->foto));
            }

            // Upload foto baru
            $upload_path = public_path('storage/img/pegawai/');
            $picture_name = 'Pegawai_' . $request->nama . '_' . date('YmdHis') . ".$ext";
            $foto->move($upload_path, $picture_name);
        }

        // Update data pegawai
        $pegawai->update([
            'nama'                => $request->nama,
            'email'               => $request->email,
            'nip'                 => $request->nip,
            'kontak'              => $request->kontak,
            'foto'                => $picture_name,
            'tempat_lahir'        => $request->tempat_lahir,
            'tanggal_lahir'       => $request->tanggal_lahir,
            'umur'                => $request->umur,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'id_agama'            => $request->id_agama,
            'alamat'              => $request->alamat,
            'kewaranegaraan'      => $request->kewaranegaraan,
            'status_perkawinan'   => $request->status_perkawinan,
            'kontak_darurat'      => $request->kontak_darurat,
            'user_id'             => $request->user_id,
            'pangkat_golongan_id' => $request->pangkat_golongan_id,
        ]);

        // Update jabatan struktural
        PegawaiJabatanStruktural::where('pegawai_id', $pegawai->id)->delete();
        if($request->jabatan_struktural_id){
            foreach ($request->jabatan_struktural_id as $jabatanId) {
                PegawaiJabatanStruktural::create([
                    'pegawai_id' => $pegawai->id,
                    'jabatan_struktural_id' => $jabatanId,
                    'status' => 'aktif',
                ]);
            }
        }

        // Update jabatan fungsional
        PegawaiJabatanFungsional::where('pegawai_id', $pegawai->id)->delete();
        if ($request->jabatan_fungsional_id) {
            foreach ($request->jabatan_fungsional_id as $jabatan) {
                PegawaiJabatanFungsional::create([
                    'pegawai_id' => $pegawai->id,
                    'jabatan_fungsional_id' => $jabatan,
                    'status' => 'aktif',
                ]);
            }
        }

        // Pegawai Status
        PegawaiStatusKepegawaian::where('pegawai_id', $pegawai->id)->delete();
        foreach ($request->status_pegawai_id as $status) {
            PegawaiStatusKepegawaian::create([
                'pegawai_id'            => $pegawai->id,
                'status_kepegawaian_id' => $status,
            ]);
        }

        // Pegawai Aset
        PegawaiAset::where('pegawai_id', $pegawai->id)->delete();
        foreach ($request->aset_id as $aset) {
            PegawaiAset::create([
                'pegawai_id' => $pegawai->id,
                'aset_id'    => $aset,
            ]);
        }

        return redirect()->route('dashboard.pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }



}
