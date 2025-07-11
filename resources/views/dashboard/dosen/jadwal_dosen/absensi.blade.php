@extends('dashboard.layout.app')
@section('content')
    <center>
        <div class="card text-center" style="width: 40%">
            <div class="card-header bg-success text-white ">
                <h3><i class="fa-solid fa-marker mb-2"></i><br> {{ $jadwal->matkul->name }}</h3>
            </div>
            <div class="card-body mt-4">
                <h6>{{ $jadwal->matkul->kode }}</h6>
                <h6>Hari : {{ $jadwal->hari }}</h6>
                <h6>Jam : {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</h6>
                <h6>Ruangan : {{ $jadwal->ruang }}</h6>
                <h6>Kelas : {{ $jadwal->kelas }}</h6>
                <h6>Prodi : {{ $jadwal->prodi->nama }}</h6>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="page-title">
                    <h3 class="mt-4">Kehadiran Mahasiswa</h3>
                </div>
                <div class="container mt-5 text-center">

                    {{-- FORM DIMULAI DI SINI --}}
                    <form action="{{ route('absen.delete') }}" method="POST">
                        @csrf

                        @foreach ($absen->chunk(4) as $chunk)
                            <div class="row">
                                @foreach ($chunk as $abs)
                                    <div class="col-md-3">
                                        <div class="card mt-4">
                                            <div class="card-body text-center">
                                                <i class="fa-regular fa-calendar-check mb-2"></i>
                                                <h5 class="card-title">{{ $abs->user->name }}</h5>
                                                <hr>
                                                <h6 class="mb-3">Keterangan Hadir</h6>
                                                <i class="fa fa-user fa-5x mb-3"></i>

                                                <input type="hidden" name="absen_ids[]" value="{{ $abs->id }}">

                                                <div class="d-flex justify-content-center gap-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="status[{{ $abs->id }}]"
                                                            id="hadir{{ $abs->id }}" value="hadir"
                                                            {{ $abs->status == 'hadir' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="hadir{{ $abs->id }}">Hadir</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="status[{{ $abs->id }}]"
                                                            id="alpa{{ $abs->id }}" value="alpa"
                                                            {{ $abs->status == 'alpa' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="alpa{{ $abs->id }}">Tidak
                                                            Hadir</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        @if ($absen->isEmpty())
                            <div class="alert alert-info mt-4">Belum Ada Mahasiswa Yang Absen</div>
                        @else
                            <div class="mt-4">
                                <button type="submit" class="btn btn-warning w-50">Konfirmasi Absen</button>
                            </div>
                        @endif
                    </form>
                    {{-- FORM SELESAI DI SINI --}}
                </div>
            </div>
        </div>

    </center>
@endsection
