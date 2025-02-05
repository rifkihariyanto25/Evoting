@extends('layouts.app')

@section('title', $voter->name)

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('app.voter.index') }}" class="btn btn-danger mb-3">Back</a>
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $voter->name }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $voter->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $voter->user->email }}</td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection