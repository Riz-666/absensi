@extends('dashboard.layout.app')
@section('content')
    <div class="page-title">
        <h3>{{ $judul }}</h3>
    </div>
    @foreach ($jadwal->chunk(3) as $index)
        <div class="container mt-5 text-center">
            <div class="col-md-12 row ">
                @foreach ($index as $jwl)
                    <div class="col-md-4">
                        <div class="card mt-4 ">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-marker my-3"></i>
                                <div class="underline">
                                    <h5 class="card-title">{{ $jwl->matkul->name }}</h5>
                                    <hr>
                                </div>
                                <p class="card-text px-5 py-3">
                                    Dosen : {{ $jwl->dosen->name }}
                                    <br>
                                    Hari : {{ $jwl->hari }}
                                    <br>
                                    Jam Mulai : {{ $jwl->jam_mulai }}
                                    <br>
                                    Jam Selesai : {{ $jwl->jam_selesai }}
                                    <br>
                                    Ruang : {{ $jwl->ruang }}
                                    <br>
                                    Kelas : {{ $jwl->kelas }}
                                    <br>
                                    Prodi : {{ $jwl->prodi->nama }}
                                </p>

                                @if ($jwl->is_hari_ini && !$jwl->sudah_absen && $jwl->is_dalam_jam)
                                    <form action="{{ route('mahasiswa.absen', $jwl->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">Absen</button>
                                    </form>
                                @elseif($jwl->sudah_absen)
                                    <button class="btn btn-warning w-100" disabled>Sudah Absen</button>
                                @elseif(!$jwl->is_dalam_jam && $jwl->is_hari_ini) 
                                    <button class="btn btn-secondary w-100" disabled>Di luar jam</button>
                                @else
                                    <button class="btn btn-danger w-100" disabled>Belum Ada Jadwal</button>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
