@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('add.prodi.action') }}" method="POST">
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
                                            placeholder="Masukan Nama Prodi" name="nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Fakultas</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            placeholder="Masukan Nama Fakultas" name="fakultas">
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
