@extends('dashboard.layout.app')
@section('content')
<div class="page-title">
            <h3>{{ $judul }}</h3>
        </div>
    <div class="container">
        <div class="row">
            <div class="header">
                <p>{{ $tglNow }}</p>
            </div>

            <div class="absensi-box px-3 py-3 d-flex justify-content-between col-md-5">
                <p style="font-size: 40px;">Absensi Siswa</p>
                <div class="card-right d-flex align-items-center">
                    <i class="fa-solid fa-calendar-days fa-5x"></i>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="statistik col-md-5">
                <div class="stat-box bg-red">100%<br>Persentase</div>
                <div class="stat-box bg-yellow">0<br>Tidak Hadir</div>
            </div>
        </div>
        <hr style="width:41%">
        <div class="row">
            <div class="riwayat col-md-5">
                <h3>Riwayat Absensi Siswa</h3>
                <div class="hari-container">
                    @php
                        use Carbon\Carbon;

                        $hariIni = Carbon::now();
                        $minggu = $hariIni->copy()->startOfWeek(Carbon::MONDAY); // Mulai dari Senin
                        $hari = [];

                        for ($i = 0; $i < 7; $i++) {
                            $tgl = $minggu->copy()->addDays($i);
                            $hari[] = [
                                'tanggal' => $tgl->format('d'),
                                'hari' => $tgl->locale('id')->translatedFormat('D'), // Sen, Sel, dst
                                'hari_ini' => $tgl->isSameDay($hariIni),
                            ];
                        }
                    @endphp

                    <div class="hari-container d-flex">
                        @foreach ($hari as $d)
                            <div class="hari {{ $d['hari_ini'] ? 'bg-danger text-white' : '' }}">
                                {{ $d['tanggal'] }}<br>{{ $d['hari'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="statistik col-md-5">
                <div class="stat-box bg-green">26<br>Total Kehadiran</div>
            </div>
        </div>
    </div>
    <div class="jadwal">
        <h3>Jadwal Kuliah</h3>
        <div class="row">
            @foreach ($jadwal->chunk(3) as $index)
                @foreach ($index as $jwl)
                    <div class="col-md-4 text-center">
                        <div class="jadwal-card">
                            <h4>{{ $jwl->matkul->name }}</h4>
                            <p>{{ $jwl->hari }} | {{ $jwl->jam_mulai }} - {{ $jwl->jam_selesai }} |
                                {{ $jwl->ruang }}</p>
                            @if ($jwl->hari === \Carbon\Carbon::now()->translatedFormat('l'))
                                <a href="#" class="btn btn-kelas btn-success" style="width: 45%">Masuk Kelas</a>
                                <a href="#" class="btn btn-tugas btn-warning" style="width: 45%">Ruang Tugas</a>
                            @else
                                <a href="#" class="btn btn-kelas btn-danger" style="width: 45%">Masuk Kelas</a>
                                <a href="#" class="btn btn-tugas btn-warning" style="width: 45%">Ruang Tugas</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
