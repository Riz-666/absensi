@extends('dashboard.layout.app')
@section('content')
<div class="page-title">
            <h3>{{ $judul }}</h3>
        </div>
    <!-- Hoverable rows start -->
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if(Auth::user()->role === "admin")
                            <a href="{{ Route('add.prodi') }}" class="btn btn-primary">Tambah Prodi</a>
                        @endif
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>FAKULTAS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodi as $prd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prd->nama }}</td>
                                        <td>{{ $prd->fakultas }}</td>

                                        <td><a href="{{ Route('edit.prodi',$prd->id) }}"><i class="badge-circle badge-circle-light-secondary text-warning font-medium-1" data-feather="edit"></i></a>
                                            <form action="{{ Route('destroy.prodi.action',$prd->id) }}" method="POST">
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
