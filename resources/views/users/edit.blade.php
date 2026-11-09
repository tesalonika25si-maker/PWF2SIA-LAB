@extends('layout.admin.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Edit User</h3>

    @include('partials.alert')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $user->name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $user->email) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak ingin mengganti password">
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
