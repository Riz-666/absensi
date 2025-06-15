<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function(){
            $now = Now();
            $hari = $now->translatedFormat('1');
            $tgl = $now->toDateString();

            $JadwalNow = Jadwal::where('hari',$hari)->get();

            foreach ($JadwalNow as $jwl){
                $selesai = Carbon::createdFromFormat('H:i:s', $jwl->selesai);
                if ($now->greaterThan($selesai)){
                    $mahasiswa = User::where('kelas_id', $jwl->kelas_id)
                                    ->where('role','mahasiswa')
                                    ->get();

                    foreach ($mahasiswa as $mhs) {
                        $absen::create([
                            'user_id' => $mhs->id,
                            'jadwal_id' => $mhs->id,
                            'tanggal' => $tgl,
                            'status' => 'alpa'
                        ]);
                    }
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
