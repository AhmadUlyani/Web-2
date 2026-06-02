@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
<div class="container">
    <div class="top-bar">
        <h2>Data Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th style="width: 1%; white-space: nowrap;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($bukus as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                    <td style="white-space: nowrap;">
                        <div class="table-actions">
                            <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('buku.destroy', $b->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Data buku belum ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection