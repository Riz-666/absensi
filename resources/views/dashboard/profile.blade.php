@extends('dashboard.layout.app')
@section('content')
    <!-- Input Style start -->
    <form action="{{ Route('edit.profile.action') }}" method="POST">
        @csrf
        <section id="input-style">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $judul }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="roundText">Nama</label>
                                        <input type="text" id="roundText" class="form-control round"
                                            value="{{ old('name', $user->name) }}" name="name">
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="roundText">Email</label>
                                            <input type="text" id="roundText" class="form-control round"
                                                value="{{ old('name', $user->email) }}" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="roundText">Password</label>
                                            <input type="password" id="roundText" class="form-control round"
                                                placeholder="Masukan Password Baru" name="password">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary"
                                                style="width: 100%; border-radius:50px">Perbarui Profile</button>
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
