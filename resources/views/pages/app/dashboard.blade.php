@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-12">
    @include('includes.alert')
</div>

@role('voter')
@can('vote-create')
<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="text-center">
            <h3>Pilih Kandidat Yang Menurut Kamu Cocok Menjabat</h3>
        </div>
    </div>

    @foreach ($candidates as $candidate)
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" class="card-img-top mb-3">
                <h5 class="card-title">#{{ $candidate->sort_order }} - {{ $candidate->name }}</h5>
                <p><strong>Ketua:</strong> {{ $candidate->namaKetua }}</p>
                <p><strong>Wakil Ketua:</strong> {{ $candidate->namaWakilKetua }}</p>
                <hr>
                <h6>Visi:</h6>
                <p>{{ $candidate->visi }}</p>
                <h6>Misi:</h6>
                <p>{{ $candidate->misi }}</p>

                <a href="" class="btn btn-primary"> vote</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endcan
@endrole
@endsection