@extends('layout.admin.app')

@section('title', 'Data Users')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Users</h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
    </div>

    @include('partials.alert')

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada data user.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
