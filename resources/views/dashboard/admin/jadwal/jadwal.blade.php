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
                            <a href="{{ Route('add.jadwal') }}" class="btn btn-primary">Tambah Jadwal</a>
                        @endif
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>MATKUL</th>
                                    <th>DOSEN</th>
                                    <th>HARI</th>
                                    <th>JAM MULAI</th>
                                    <th>JAM SELESAI</th>
                                    <th>RUANG</th>
                                    <th>KELAS</th>
                                    <th>PRODI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $jwl)
                                    <tr>
                                        <td>{{ $jwl->matkul->name }}</td>
                                        <td>{{ $jwl->dosen->name }}</td>
                                        <td>{{ $jwl->hari }}</td>
                                        <td>{{ $jwl->jam_mulai }}</td>
                                        <td>{{ $jwl->jam_selesai }}</td>
                                        <td>{{ $jwl->ruang }}</td>
                                        <td>{{ $jwl->kelas }}</td>
                                        <td>{{ $jwl->prodi->nama }}</td>
                                        @if(Auth::user()->role === "admin")
                                        <td><a href="{{ Route('edit.jadwal',$jwl->id) }}"><i class="badge-circle badge-circle-light-secondary text-warning font-medium-1" data-feather="edit"></i></a>
                                            <form action="{{ Route('destroy.jadwal.action',$jwl->id) }}" method="POST">
                                                @csrf
                                                <button class="show_confirm" data-konf-delete="" style="background: none; border: none; padding: 0; margin: 0;" ><i class="badge-circle badge-circle-light-secondary text-danger font-medium-1 show_confirm" data-feather="trash-2"></i></button>
                                            </form>
                                        @else
                                            <td><a href="" class="btn btn-primary"> Absen</a>
                                        @endif
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
