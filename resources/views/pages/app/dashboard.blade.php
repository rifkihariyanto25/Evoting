@extends('layouts.app')

@section('title', 'Dashboard Voting')

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

                @if (Auth::user()->voter->vote)
                <button class="btn btn-primary" disabled>
                    Already Voted
                </button>
                @else
                <a href="{{ route('app.vote', $candidate->id) }}" class="btn btn-primary">
                    Vote
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endcan
@endrole
@endsection