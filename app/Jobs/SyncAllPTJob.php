<?php

namespace App\Jobs;

use App\Models\AllProfilPt;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncAllPTJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $profilPtData;

    public function __construct($profilPtData)
    {
        $this->profilPtData = $profilPtData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->profilPtData;

        AllProfilPt::updateOrCreate(
            [
                'id_perguruan_tinggi' => $item['id_perguruan_tinggi'],
            ],
            [
                'kode_perguruan_tinggi' => $item['kode_perguruan_tinggi'],
                'nama_perguruan_tinggi' => $item['nama_perguruan_tinggi'],
                'nama_singkat' => $item['nama_singkat'],
            ]
        );
    }
}
