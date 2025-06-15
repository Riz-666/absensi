@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('add.users.action') }}" method="POST">
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
                                        placeholder="Masukan Nama" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Email</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        placeholder="Masukan Email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Password</label>
                                    <input type="password" id="roundText" class="form-control round"
                                        placeholder="Masukan Password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Role</label>
                                    {{-- enum --}}
                                    <select name="role" id="role" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Role --</option>
                                        <option value="admin">Admin</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">NIM</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        placeholder="Masukan NIM" name="nim">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">NIP</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        placeholder="Masukan NIP" name="nip">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Semester</label>
                                    <input type="number" id="roundText" class="form-control round"
                                        placeholder="Masukan Semester" name="semester">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Kelas</label>
                                    <select name="kelas_id" id="kelas" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Kelas --</option>
                                        @foreach ($kelas as $kls)
                                            <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Status</label>
                                    <select name="status" id="status" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Status --</option>
                                        <option value="0">Nonaktif</option>
                                        <option value="1">Aktif</option>
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
