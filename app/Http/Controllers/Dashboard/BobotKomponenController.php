<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Komponen;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Models\BobotKomponen;
use App\Models\ListMataKuliah;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BobotKomponenController extends Controller
{
    public function index()
    {
        return view('dashboard.bobot-komponen.index');
    }

    public function create()
    {
        $listMataKuliah = ListMataKuliah::OrderBy('nama_mata_kuliah')->get();
    
        $komponen = Komponen::OrderBy('name')->get();

        return view('dashboard.bobot-komponen.create', compact('listMataKuliah','komponen'));
    }

    public function data_table()
    {
        // Ambil semua data dan group berdasarkan id_kelas_kuliah
        // $grouped = BobotKomponen::with('kelasKuliah')->all()->groupBy('id_kelas_kuliah');
        $grouped = BobotKomponen::with(['list_mata_kuliah','komponen'])->get()->groupBy('id_matkul');

        $bobotkomponen = $grouped->map(function ($items, $id_matkul) {
            return [
                'id_matkul' => $id_matkul,
                'nama_mata_kuliah' =>  $items->first()->list_mata_kuliah->nama_program_studi . ' | ' .
                                       $items->first()->list_mata_kuliah->kode_mata_kuliah . ' | ' . 
                                       $items->first()->list_mata_kuliah->nama_mata_kuliah . ' | ' . 
                                       'sks: ' .$items->first()->list_mata_kuliah->sks_mata_kuliah 
                                       ?? '-',
        
                // Ambil nama komponen dari relasi
                'nama_komponen' => $items->map(function($item) {
                    return $item->komponen->name ?? '-';
                })->implode(', '),
                'komponen_ids' => $items->pluck('komponen.id')->implode(', '),
                // Format presentase jadi 80%, 20%, ...
                'presentase_list' => $items->pluck('persentase')->map(function($val) {
                    return $val . '%';
                })->implode(', '),
            ];
        })->values();
        
    
        // Tampilkan ke DataTables
        return DataTables::of($bobotkomponen)
            ->addColumn('nama_mata_kuliah', function ($row) {
                return $row['nama_mata_kuliah'];
            })
            ->addColumn('persentase', function($row) {
                return $row['presentase_list']; 
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.bobot.komponen.edit', $row['id_matkul']) . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-pen"></i>
                    </a>
                    <button data-id="'. $row['id_matkul'] . '" data-komponen="'. $row['komponen_ids'] .'" class="btn btn-danger btn-sm delete">
                        <i class="fa fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_matkul' =>'required',
            
        ]); 

        $komponen = $request->id_komponen;
        
        if($komponen != null){
            foreach($komponen as $index => $item) {
                // create New Data 
                $bobotkomponen = BobotKomponen::create([
                    'id_matkul' => $request->id_matkul,
                    'id_komponen' => $item,
                    'persentase' => $request->persentase[$index],
                ]);

               
            }

        }
        return redirect()->route('dashboard.bobot.komponen.index')->with('success','Komponen berhasil dibuat');
    }

    public function edit($id_matkul)
    {
        $bobotkomponen = BobotKomponen::with('komponen')
            ->where('id_matkul', $id_matkul)
            ->get();
    
        $matakuliah = $bobotkomponen->first()->list_mata_kuliah ?? null;
    
        $listMataKuliah = ListMataKuliah::OrderBy('nama_mata_kuliah')->get();
    
        $komponen = Komponen::OrderBy('name')->get();


        return view('dashboard.bobot-komponen.edit', compact(
          'bobotkomponen',
          'komponen',
          'matakuliah',
          'listMataKuliah',
        ));
    }

    public function update(Request $request, $id_matkul)
    {
        // Validasi input
        $request->validate([
            'id_komponen.*' => 'required|exists:komponen,id',
            'persentase.*' => 'required|numeric|min:0|max:100',
        ]);
    
        $komponen = $request->id_komponen;
        $persentase = $request->persentase;
    
        if ($komponen != null && $persentase != null && count($komponen) === count($persentase)) {
            // Hapus bobot komponen lama yang tidak ada di inputan baru
            BobotKomponen::where('id_matkul', $id_matkul)
                ->whereNotIn('id_komponen', $komponen) // Hapus komponen yang tidak ada di inputan baru
                ->delete();
    
            // Proses untuk update atau buat data baru
            foreach ($komponen as $key => $idKomponen) {
                $bobot = BobotKomponen::where('id_matkul', $id_matkul)
                            ->where('id_komponen', $idKomponen)
                            ->first();
    
                if ($bobot) {
                    // Update jika sudah ada
                    $bobot->persentase = $persentase[$key];
                    $bobot->save();
                } else {
                    // Buat baru jika belum ada
                    BobotKomponen::create([
                        'id_matkul' => $id_matkul,
                        'id_komponen' => $idKomponen,
                        'persentase' => $persentase[$key],
                    ]);
                }
            }
    
            // Redirect dengan pesan sukses
            return redirect()->route('dashboard.bobot.komponen.index')->with('success', 'Bobot komponen berhasil diperbarui.');
        }
    
        // Jika data tidak valid
        return redirect()->back()->with('error', 'Tidak ada data yang dikirim atau terjadi kesalahan.');
    }

    public function destroy($id_matkul, Request $request)
    {
        // Get an array of komponen_ids from the request
        $komponenIds = $request->input('komponen_ids'); 
    
        // Perform a bulk delete using whereIn()
        BobotKomponen::where('id_matkul', $id_matkul)
                    ->whereIn('id_komponen', $komponenIds)  // Delete all matching komponen_ids
                    ->delete();
    
        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }
    

}
