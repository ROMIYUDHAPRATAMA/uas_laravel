@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Kriteria') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="kode_kriteria">Kode Kriteria<span class="small text-danger">*</span></label>
                            <input type="text" id="kode_kriteria" class="form-control" name="kode_kriteria" placeholder="Kode Kriteria" value="{{ old('kode_kriteria', $kriteria->kode_kriteria) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="nama_kriteria">Nama Kriteria<span class="small text-danger">*</span></label>
                            <input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria" placeholder="Nama Kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="jenis_kriteria">Jenis Kriteria<span class="small text-danger">*</span></label>
                            <select name="jenis_kriteria" id="jenis_kriteria" class="form-control">
                                <option value="Cost" {{ $kriteria->jenis_kriteria == 'Cost' ? 'selected' : '' }}>Cost</option>
                                <option value="Benefit" {{ $kriteria->jenis_kriteria == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="bobot">Bobot<span class="small text-danger">*</span></label>
                            <input type="number" step="0.01" id="bobot" class="form-control" name="bobot" placeholder="Bobot" value="{{ old('bobot', $kriteria->bobot) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
