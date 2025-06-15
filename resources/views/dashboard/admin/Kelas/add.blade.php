@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('add.kelas.action') }}" method="POST">
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
                                        <label for="roundText">Nama</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            placeholder="Masukan Kelas" name="nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Angkatan</label>
                                        <input type="number" id="roundText" class="form-control round"
                                            placeholder="Masukan Tahun Angkatan" name="angkatan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Prodi</label>
                                        <select name="prodi_id" id="" class="form-control round">
                                                <option value="">-- Pilih Prodi --</option>
                                            @foreach ($prodi as $prd)
                                                <option value="{{ $prd->id }}">{{ $prd->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Wali Kelas</label>
                                        <select name="wali_kelas_id" id="" class="form-control round">
                                                <option value="">-- Pilih Wali Kelas --</option>
                                            @foreach ($wali as $wl)
                                                <option value="{{ $wl->id }}">{{ $wl->name }}</option>
                                            @endforeach
                                        </select>
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
