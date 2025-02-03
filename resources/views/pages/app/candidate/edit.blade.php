@extends('layouts.app')

@section('title', 'candidate Edit')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('app.candidate.index') }}" class="btn btn-danger mb-3">Back</a>
    </div>

    <div class="col-md-12">
        @include('includes.alert')
    </div>

    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Candidate</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('app.candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $candidate -> name) }}"
                            placeholder="Enter Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $candidate -> image) }}"
                            placeholder="Enter Image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="namaKetua">Nama Ketua</label>
                        <input type="text" name="namaKetua" id="namaKetua"
                            class="form-control @error('namaKetua') is-invalid @enderror" value="{{ old('namaKetua', $candidate -> namaKetua) }}"
                            placeholder="Enter Nama Ketua">
                        @error('namaKetua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="namaWakilKetua">Nama Wakil Ketua</label>
                        <input type="text" name="namaWakilKetua" id="namaWakilKetua"
                            class="form-control @error('namaWakilKetua') is-invalid @enderror" value="{{ old('namaWakilKetua', $candidate -> namaWakilKetua) }}"
                            placeholder="Enter Nama Wakil Ketua">
                        @error('namaWakilKetua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="visi">Visi Calon</label>
                        <input type="text" name="visi" id="visi"
                            class="form-control @error('visi') is-invalid @enderror" value="{{ old('visi', $candidate -> visi) }}"
                            placeholder="Enter Visi Calon">
                        @error('visi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="misi">Misi Calon</label>
                        <input type="text" name="misi" id="misi"
                            class="form-control @error('misi') is-invalid @enderror" value="{{ old('misi', $candidate -> misi) }}"
                            placeholder="Enter Misi Calon">
                        @error('misi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sort_order">Nomor Urut Calon</label>
                        <input type="text" name="sort_order" id="sort_order"
                            class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $candidate -> sort_order) }}"
                            placeholder="Enter Nomor Urut Calon">
                        @error('sort_order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection