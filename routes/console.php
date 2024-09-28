<?php

use App\Models\Karyawan;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('reset', function () {
    $karyawan = Karyawan::all();
    foreach ($karyawan as $k) {
        $k->status = 'Belum Digaji';
        $k->tanggal_digaji = null;
        $k->save();
    }
    $this->info(config('webconfig.reset_gaji'));
})->purpose('Reset gaji karyawan')->everyFiveMinutes()->runInBackground()->timezone(config('webconfig.timezone'));

// Schedule::command('reset')->dailyAt('02:00')->runInBackground();