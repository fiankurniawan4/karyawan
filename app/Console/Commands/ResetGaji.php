<?php

namespace App\Console\Commands;

use App\Models\Karyawan;
use Illuminate\Console\Command;

class ResetGaji extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-gaji';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $karyawan = Karyawan::all();
        foreach ($karyawan as $k) {
            $k->status = 'Belum Digaji';
            $k->save();
        }
        $this->info(config('webconfig.reset_gaji'));
    }
}
