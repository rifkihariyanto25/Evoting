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

@role('admin')
<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mb-3"> Hasil Voting Real Time</h2>

        <div class="card">
            <div class="card-body">
                <div class="pie-results"></div>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection

@section('scripts')
@role('admin')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var candidates = @json($candidates->pluck('name'));
        var votes = @json($candidates->pluck('votes_count'));

        // Tambahkan nomor urut ke setiap nama kandidat
        var numberedCandidates = candidates.map(function(name, index) {
            return (index + 1) + ". " + name;  // Nomor urut dimulai dari 1
        });

        console.log(numberedCandidates, votes); // Debug untuk cek hasilnya

        var options = {
            chart: {
                type: 'pie',
                width: '500px'
            },
            series: votes,
            labels: numberedCandidates  // Gunakan nama yang sudah diberi nomor
        };

        var chart = new ApexCharts(document.querySelector(".pie-results"), options);
        chart.render();
    });
</script>


<script>
    setTimeout(function() {
        location.reload();
    }, 5000);
</script>
@endrole
@endsection
