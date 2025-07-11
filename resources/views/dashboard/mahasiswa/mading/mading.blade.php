@extends('dashboard.layout.app')
@section('content')

@foreach ($mading as $mdg)
<div class="card w-100 mb-3">
  <div class="card-body">
    <h5 class="card-title">{{ $mdg->judul }}</h5>
    <p class="card-text">{!! $mdg->isi !!}</p>
    <div class="text-end">
        <p class="text-secondary">{{ $mdg->user->name }} | {{ $mdg->created_at }}</p>
    </div>
  </div>
</div>

@endforeach

@endsection
