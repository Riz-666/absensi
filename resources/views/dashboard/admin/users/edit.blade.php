@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('edit.users.action',$edit->id) }}" method="POST">
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
                                        value="{{ $edit->name }}" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Email</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        value="{{ $edit->email }}" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Password</label>
                                    <input type="password" id="roundText" class="form-control round"
                                        placeholder="{{ $edit->password }}" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">Role</label>
                                    {{-- enum --}}
                                    <select name="role" id="role" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Role --</option>
                                        <option value="admin" {{ old('role', $edit->role == "admin" ? 'selected' : '') }}>Admin</option>
                                        <option value="dosen" {{ old('role', $edit->role == "dosen" ? 'selected' : '') }}>Dosen</option>
                                        <option value="mahasiswa" {{ old('role', $edit->role == "mahasiswa" ? 'selected' : '') }}>Mahasiswa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">NIM</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        value="{{ $edit->nim }}" name="nim">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">NIP</label>
                                    <input type="text" id="roundText" class="form-control round"
                                        value="{{ $edit->nip }}" name="nip">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Semester</label>
                                    <input type="number" id="roundText" class="form-control round"
                                        value="{{ $edit->semester }}" name="semester">
                                        <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Kelas</label>

                                    <select name="kelas_id" id="kelas" class="form-control round">
                                        <option value="" selected disabled>-- Pilih Kelas --</option>
                                        @foreach ($kelas as $kls)
                                            <option value="{{ $kls->id }}" {{ $edit->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p style="font-size: 10px">Kosongkan Jika Ingin Menambahkan Dosen Atau Admin</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="roundText">Status</label>
                                    <select name="status" id="status" class="form-control round">
                                        <option value="0" {{ old('status', $edit->status == "0" ? 'selected' : '') }}>Nonaktif</option>
                                        <option value="1" {{ old('status', $edit->status == "1" ? 'selected' : '') }}>Aktif</option>
                                    </select>
                                </div>
                            </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" style="width: 100%; border-radius:50px">Edit</button>
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
