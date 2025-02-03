@extends('layouts.app')

@section('title', 'Candidate')

@section('content')
<div class="row">

    @can('candidate-create')
    <div class="col-md-12">
        <a href="{{ route('app.candidate.create') }}" class="btn btn-primary mb-3">Add Candidate</a>
    </div>
    @endcan

    <div class="col-md-12">
        @include('includes.alert')
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Candidate</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Image</th>
                                <th>Nama Calon Ketua</th>
                                <th>Nama Calon Wakil Ketua</th>
                                <th>Visi Calon</th>
                                <th>Misi Calon</th>
                                <th>Nomer Urut</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($candidates as $candidate)
                            <tr>
                                <!-- isi sesuai yg ada pada tabel database -->
                                <td>{{ $candidate->name }}</td>
                                <td>{{ $candidate->image }}</td>
                                <td>{{ $candidate->namaKetua }}</td>
                                <td>{{ $candidate->namaWakilKetua }}</td>
                                <td>{{ $candidate->visi }}</td>
                                <td>{{ $candidate->misi }}</td>
                                <td>{{ $candidate->sort_order }}</td>
                                <td>

                                    @can('candidate-update')
                                    <a href="{{ route('app.candidate.edit', $candidate->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    @endcan

                                    <a href="{{ route('app.candidate.show', $candidate->id) }}" class="btn btn-info">Show</a>

                                    @can('candidate-delete')
                                    <form action="{{ route('app.candidate.destroy', $candidate->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endcan
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
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection