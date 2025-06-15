@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('add.matkul.action') }}" method="POST">
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
                                        <label for="roundText">Nama Mata Kuliah</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            placeholder="Masukan Nama Mata Kuliah" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Kode</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            placeholder="Masukan Kode Mata Kuliah" name="kode">
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="col-12">

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="roundText">Nama Dosen</label>
                                        <select name="dosen_id" id="dosen_id" class="form-control round select2">
                                        <option value="" selected disabled>-- Pilih Dosen --</option>
                                        @foreach ($user as $dsn)
                                            <option value="{{ $dsn->id }}">{{ $dsn->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="roundText">Prodi</label>
                                        <select name="prodi_id" class="form-control round select2">
                                        <option value="" selected disabled>-- Pilih Prodi --</option>
                                        @foreach ($matkul as $mtl)
                                            <option value="{{ $mtl->id }}">{{ $mtl->prodi->nama }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="roundText">Semester</label>
                                        <input type="number" id="roundText" class="form-control round"
                                            placeholder="Masukan semester" name="semester">
                                    </div>
                                </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary"
                                            style="width: 100%; border-radius:50px">Tambah</button>
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
