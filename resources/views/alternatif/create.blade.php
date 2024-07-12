@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Alternatif') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_alternatif">Kode Alternatif</label>
            <input type="text" name="kode_alternatif" class="form-control" id="kode_alternatif" required>
        </div>
        <div class="form-group">
            <label for="nama_alternatif">Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="form-control" id="nama_alternatif" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
