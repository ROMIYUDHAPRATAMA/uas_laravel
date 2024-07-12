@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Kriteria') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('kriteria.create') }}">Create Kriteria</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis Kriteria</th>
                            <th>Bobot</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($kriterias as $kriteria)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $kriteria->kode_kriteria }}</td>
                                <td>{{ $kriteria->nama_kriteria }}</td>
                                <td>{{ $kriteria->jenis_kriteria }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>
                                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                        
                                        <a class="btn btn-primary btn-sm" href="{{ route('kriteria.edit', $kriteria->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
