<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class StatusMahasiswa
 *
 * @property string $id
 * @property string $id_status_mahasiswa
 * @property string $nama_status_mahasiswa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|DetailPerkuliahanMahasiswa[] $detail_perkuliahan_mahasiswas
 * @property Collection|ExportDataAktivitasKuliah[] $export_data_aktivitas_kuliahs
 * @property Collection|ListNilaiPerkuliahanMahasiswa[] $list_nilai_perkuliahan_mahasiswas
 *
 * @package App\Models
 */
class StatusMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'status_mahasiswa';

    public $fillable = [
        'id_status_mahasiswa',
        'nama_status_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'id_status_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_status_mahasiswa' => 'required|string|max:36',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
