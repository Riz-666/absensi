@extends('dashboard.layout.app')
@section('content')
    <!-- Hoverable rows start -->
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $judul }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if(Auth::user()->role === "admin")
                            <a href="{{ Route('add.mading') }}" class="btn btn-primary">Tambah Mading</a>
                        @endif
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>JUDUL</th>
                                    <th>ISI</th>
                                    <th>KELAS</th>
                                    <th>DI BUAT OLEH</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mading as $mdg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mdg->judul }}</td>
                                        <td>{!! $mdg->isi !!}</td>
                                        <td>{{ $mdg->kelas->nama ?? '-' }}</td>
                                        <td>{{ $mdg->user->name ??'-' }}</td>

                                        <td><a href="{{ Route('edit.mading',$mdg->id) }}"><i class="badge-circle badge-circle-light-secondary text-warning font-medium-1" data-feather="edit"></i></a>
                                            <form action="{{ Route('destroy.mading.action',$mdg->id) }}" method="POST">
                                                @csrf
                                                <button class="show_confirm" data-konf-delete="" style="background: none; border: none; padding: 0; margin: 0;" ><i class="badge-circle badge-circle-light-secondary text-danger font-medium-1 show_confirm" data-feather="trash-2"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hoverable rows end -->
@endsection
