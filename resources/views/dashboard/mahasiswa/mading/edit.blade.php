@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('edit.mading.action', $edit->id) }}" method="POST">
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="roundText">Judul</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            value="{{ old('judul', $edit->judul ?? '') }}" name="judul">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Kelas</label>
                                        <select name="kelas_id" id="" class="form-control round select2">
                                            <option value="" disabled>-- Pilih Kelas --</option>
                                            @foreach ($kelas as $kls)
                                                <option value="{{ $kls->id }}"
                                                    {{ $edit->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roundText">Di Buat Oleh</label>
                                        <select name="dibuat_oleh" id="" class="form-control round select2">
                                            <option value="" disabled>-- Pilih Pembuat --</option>
                                            @foreach ($user as $usr)
                                                <option
                                                    value="{{ $usr->id }}"{{ $edit->dibuat_oleh == $usr->id ? 'selected' : '' }}>
                                                    {{ $usr->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="roundText">Isi</label>
                                        <textarea name="isi" id="ckeditor" rows="10" cols="80">{{ old('isi', $edit->isi ?? '') }}</textarea>
                                    </div>
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
