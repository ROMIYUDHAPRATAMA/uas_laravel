@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Alternatif') }}</h1>

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
            <a class="btn btn-primary" href="{{ route('alternatif.create') }}">Create Alternatif</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $alternatif->kode_alternatif }}</td>
                                <td>{{ $alternatif->nama_alternatif }}</td>
                                <td>
                                    <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST">

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('alternatif.edit', $alternatif->id) }}">Edit</a>
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
