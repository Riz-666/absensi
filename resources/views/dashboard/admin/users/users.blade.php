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
                        <a href="{{ Route('add.users') }}" class="btn btn-primary">Tambah User</a>
                    </div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>NIM</th>
                                    <th>NIP</th>
                                    <th>SEMESTER</th>
                                    <th>KELAS</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $usr)
                                    <tr>
                                        <td class="text-bold-500">{{ $usr->name }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td class="text-bold-500">{{ $usr->role }}</td>
                                        @if (!$usr->nim)
                                            <td><span class="badge rounded-pill bg-info text-dark"><b>Tidak Ada
                                                        NIM</b></span></td>
                                        @else
                                            <td>{{ $usr->nim }}</td>
                                        @endif
                                        @if (!$usr->nip)
                                            <td><span class="badge rounded-pill bg-info text-dark"><b>Tidak Ada
                                                        NIP</b></span></td>
                                        @else
                                            <td>{{ $usr->nip }}</td>
                                        @endif

                                        @if (!$usr->semester)
                                            <td><span class="badge rounded-pill bg-info text-dark"><b>Tidak Ada
                                                        Semester</b></span></td>
                                        @else
                                            <td>{{ $usr->semester }}</td>
                                        @endif

                                        @if (!$usr->kelas_id)
                                            <td><span class="badge rounded-pill bg-info text-dark"><b>Tidak Ada
                                                        Kelas</b></span></td>
                                        @else
                                            <td>{{ $usr->kelas->nama }}</td>
                                        @endif
                                        @if ($usr->status === 1)
                                            <td><span class="badge rounded-pill bg-success">Aktif</span></td>
                                        @else
                                            <td><span class="badge rounded-pill bg-secondary">Nonaktif</span></td>
                                        @endif
                                        <td><a href="{{ Route('edit.users', $usr->id) }}"><i class="badge-circle badge-circle-light-secondary text-warning font-medium-1" data-feather="edit"></i></a>
                                            <form action="{{ Route('destroy.users.action' , $usr->id) }}" method="POST">
                                                @csrf
                                                <button class="show_confirm" data-konf-delete="{{ $usr->name }}" style="background: none; border: none; padding: 0; margin: 0;" ><i class="badge-circle badge-circle-light-secondary text-danger font-medium-1 show_confirm" data-feather="trash-2"></i></button>
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
