<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\KebutuhanKhusus;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncKebutuhanKhususJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $kebutuhanKhusus;

    /**
     * Create a new job instance.
     */
    public function __construct($kebutuhanKhusus)
    {
        $this->kebutuhanKhusus = $kebutuhanKhusus;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $item = $this->kebutuhanKhusus;

        KebutuhanKhusus::updateOrCreate(
            ['id_kebutuhan_khusus' => $item['id_kebutuhan_khusus']],
            [
                'nama_kebutuhan_khusus' => $item['nama_kebutuhan_khusus']
            ]
        );
    }
}
