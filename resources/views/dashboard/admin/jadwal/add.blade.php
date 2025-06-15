@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('add.jadwal.action') }}" method="POST">
        @csrf
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $judul }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Mata Kuliah</label>
                                    {{-- enum --}}
                                    <select name="matkul_id" id="matkul_id" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Mata Kuliah --</option>
                                        @foreach ($matkul as $mtl)
                                            <option value="{{ $mtl->id }}">{{ $mtl->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Dosen</label>
                                    {{-- enum --}}
                                    <select name="dosen_id" id="dosen_id" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Dosen --</option>
                                        @foreach ($dosen as $dsn)
                                            <option value="{{ $dsn->id }}">{{ $dsn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Hari</label>
                                    {{-- enum --}}
                                    <select name="hari" id="hari" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Hari --</option>
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Jam Mulai</label>
                                    <input type="time" id="roundText" name="jam_mulai" class="form-control round">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Jam Selesai</label>
                                    <input type="time" id="roundText" class="form-control round" name="jam_selesai">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Ruang</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        placeholder="Masukan No. Ruangan" name="ruang">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Kelas</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        placeholder="Masukan Kelas" name="kelas">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">prodi</label>
                                    {{-- enum --}}
                                    <select name="prodi_id" id="prodi_id" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Prodi --</option>
                                        @foreach ($prodi as $prd)
                                            <option value="{{ $prd->id }}">{{ $prd->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" style="width: 100%; border-radius:50px">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    <!-- Input Style end -->
@endsection
