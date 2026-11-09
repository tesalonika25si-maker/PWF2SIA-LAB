@extends('layout.admin.app')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Tambah User</h3>

    @include('partials.alert')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Minimal 8 karakter"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
