@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('edit.jadwal.action',$edit->id) }}" method="POST">
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
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($matkul as $mtl)
                                                <option
                                                    value="{{ $mtl->id }}"{{ $edit->matkul_id == $mtl->id ? 'selected' : '' }}>
                                                    {{ $mtl->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Dosen</label>
                                        {{-- enum --}}
                                        <select name="dosen_id" id="dosen_id" class="form-control round">
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($dosen as $dsn)
                                                <option
                                                    value="{{ $dsn->id }}"{{ $edit->dosen_id == $dsn->id ? 'selected' : '' }}>
                                                    {{ $dsn->name }}</option>
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
                                            <option value="" disabled
                                                {{ old('hari', $edit->hari ?? '') == '' ? 'selected' : '' }}>-- Pilih Hari
                                                --</option>
                                            <option value="Senin"
                                                {{ old('hari', $edit->hari ?? '') == 'Senin' ? 'selected' : '' }}>Senin
                                            </option>
                                            <option value="Selasa"
                                                {{ old('hari', $edit->hari ?? '') == 'Selasa' ? 'selected' : '' }}>Selasa
                                            </option>
                                            <option value="Rabu"
                                                {{ old('hari', $edit->hari ?? '') == 'Rabu' ? 'selected' : '' }}>Rabu
                                            </option>
                                            <option value="Kamis"
                                                {{ old('hari', $edit->hari ?? '') == 'Kamis' ? 'selected' : '' }}>Kamis
                                            </option>
                                            <option value="Jumat"
                                                {{ old('hari', $edit->hari ?? '') == 'Jumat' ? 'selected' : '' }}>Jumat
                                            </option>
                                            <option value="Sabtu"
                                                {{ old('hari', $edit->hari ?? '') == 'Sabtu' ? 'selected' : '' }}>Sabtu
                                            </option>
                                            <option value="Minggu"
                                                {{ old('hari', $edit->hari ?? '') == 'Minggu' ? 'selected' : '' }}>Minggu
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Jam Mulai</label>
                                        <input type="time" id="roundText" name="jam_mulai" class="form-control round" value="{{ old('jam_mulai', $edit->jam_mulai ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Jam Selesai</label>
                                        <input type="time" id="roundText" class="form-control round" name="jam_selesai" value="{{ old('jam_mulai', $edit->jam_selesai ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Ruang</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            value="{{ old('ruang', $edit->ruang ?? '') }}" name="ruang">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Kelas</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            value="{{ old('kelas', $edit->kelas ?? '') }}" name="kelas">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">prodi</label>
                                        {{-- enum --}}
                                        <select name="prodi_id" id="prodi_id" class="form-control round">
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($prodi as $prd)
                                                <option
                                                    value="{{ $prd->id }}"{{ $edit->prodi_id == $prd->id ? 'selected' : '' }}>
                                                    {{ $prd->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary"
                                            style="width: 100%; border-radius:50px">Edit</button>
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
