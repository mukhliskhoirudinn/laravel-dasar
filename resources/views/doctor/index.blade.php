@section('title', 'Doctor')
@extends('layout.template')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Doctor</h1>
        </div>

        <div class="row mb-2">

            <!-- Button Tambah -->
            <div class="col-md-8">
                <a href="{{ url('doctor/create') }}" class="btn btn-primary mb-2">Create</a>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ url('/doctor') }}" method="get" class="mb-3 col-md-4">
                <div class="row g-2">
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="search" placeholder="Search by Name or Email"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>


        @session('success')
            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                <strong>Success: </strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        @session('error')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession



        <div class="table-responsive small">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            {{-- <td>{{ ($doctors->currentPage() - 1) * $doctors->perPage() + $loop->iteration }}</td> --}}
                            <td>{{ $loop->iteration + ($doctors->firstItem() - 1) }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>
                                <a href="{{ url('doctor/' . $doctor->uuid) }}" class="btn btn-primary"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ url('doctor/' . $doctor->uuid . '/edit') }}" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action=" {{ url('doctor/' . $doctor->uuid) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $doctors->links() }}
        </div>
    </main>
@endsection
