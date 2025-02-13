@extends('layouts.app')

@section('title', $candidate->name)

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('app.candidate.index') }}" class="btn btn-danger mb-3">Back</a>
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $candidate->name }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $candidate->name }}</td>
                        </tr>

                        <tr>
                            <th>Gambar Paslon</th>
                            <td>
                                <img src="{{ asset('storage/' . $candidate->image) }}" width="100" alt="{{ $candidate->name }}" class="img-thumbnail">
                            </td>

                        </tr>

                        <tr>
                            <th>Nama Calon Ketua</th>
                            <td>{{ $candidate->namaKetua }}</td>
                        </tr>

                        <tr>
                            <th>Nama Calon Wakil Ketua</th>
                            <td>{{ $candidate->namaWakilKetua }}</td>
                        </tr>


                        <tr>
                            <th>Visi Calon</th>
                            <td>{{ $candidate->visi }}</td>
                        </tr>

                        <tr>
                            <th>Misi Calon</th>
                            <td>{{ $candidate->misi }}</td>
                        </tr>

                        <tr>
                            <th>Nomor Urut</th>
                            <td>{{ $candidate->sort_order }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection