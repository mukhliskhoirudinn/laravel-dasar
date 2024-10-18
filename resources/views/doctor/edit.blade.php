@extends('layout.template')
@section('title', 'Edit Doctor')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Doctor</h1>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">

                @session('error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession

                <form action="{{ url('doctor/' . $doctor->uuid) }}" method="post">
                    @method('put')
                    @csrf
                    <x-input label="Name" name="name" value="{{ $doctor->name }}"></x-input>
                    <x-input label="Email" name="email" type="email" value="{{ $doctor->email }}"></x-input>
                    <x-input label="Phone" name="phone" type="number" value="{{ $doctor->phone }}"></x-input>
                    <div class="mb-3">
                        <label for="gender"><b>Gender</b></label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="" hidden>-- choose --</option>
                            <option value="male" {{ $doctor->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $doctor->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="float-end">
                        <x-button type="submit">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
