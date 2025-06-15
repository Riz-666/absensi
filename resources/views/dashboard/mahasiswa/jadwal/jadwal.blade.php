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


                            @if($jwl->hari === \Carbon\Carbon::now()->translatedFormat('l'))
                                <a href="" class="btn btn-success" style="width: 100%;">Lihat Jadwal</a>
                            @else
                                <a href="" class="btn btn-danger" style="width: 100%;">Lihat Jadwal</a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
