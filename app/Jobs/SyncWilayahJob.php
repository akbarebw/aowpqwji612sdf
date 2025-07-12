<?php

namespace App\Jobs;

use App\Models\Wilayah;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncWilayahJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $wilayahData;

    /**
     * Create a new job instance.
     */
    public function __construct($wilayahData)
    {
        $this->wilayahData = $wilayahData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->wilayahData;

        Wilayah::updateOrCreate(
           [
                'id_wilayah' => $item['id_wilayah'],
                'id_level_wilayah' => $item['id_level_wilayah'],
           ],
           [
                'id_wilayah' => $item['id_wilayah'],
                'id_negara' => $item['id_negara'],
                'nama_wilayah' => $item['nama_wilayah'],
                'id_induk_wilayah' => $item['id_induk_wilayah'],
           ]
        );

        
    }
}
