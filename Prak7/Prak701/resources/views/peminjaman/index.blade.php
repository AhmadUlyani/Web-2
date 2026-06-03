@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <div class="container">
        <div class="top-bar">
            <h2>Data Peminjaman</h2>
            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Tambah Peminjaman</a>
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
                    <th>Nama Member</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th style="width: 1%; white-space: nowrap;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pinjamans as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->member->nama_member ?? '-' }}</td>
                        <td>{{ $p->buku->judul ?? '-' }}</td>
                        <td>{{ $p->tgl_pinjam }}</td>
                        <td>{{ $p->tgl_kembali }}</td>
                        <td style="white-space: nowrap;">
                            <div class="table-actions">
                                <a href="{{ route('peminjaman.edit', $p->id_peminjaman) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('peminjaman.destroy', $p->id_peminjaman) }}" method="POST"
                                    onsubmit="return confirm('Hapus data peminjaman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Data peminjaman belum ada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
