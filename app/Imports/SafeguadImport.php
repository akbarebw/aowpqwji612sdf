<?php

namespace App\Imports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SafeguadImport implements ToModel
{
    public function model(array $row)
    {
        $data =[];
        foreach ($row as $key=>$rows){
            if($key>2){
                if($rows[5] != ''){
                    $item['penilaian_pelaksana_id'] = $rows[4];
                    $item['penilaianPelaksana'] = $rows[4];
                    $item['data_pendukung'] = $rows[5];
                    $item['pic'] = $rows[6];
                    $item['catatan'] = $rows[7];
                    $item['link'] = $rows[8];
                    array_push($data,$item);
                }
            }
        }
        return $data;

    }
}
