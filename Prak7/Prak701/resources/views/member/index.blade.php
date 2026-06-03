@extends('layouts.app')

@section('title', 'Data Member')

@section('content')
    <div class="container">
        <div class="top-bar">
            <h2>Data Member</h2>
            <a href="{{ route('member.create') }}" class="btn btn-primary">+ Tambah Member</a>
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
                    <th>Nama</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th style="width: 1%; white-space: nowrap;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($members as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->nama_member }}</td>
                        <td>{{ $m->nomor_member }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->tgl_mendaftar }}</td>
                        <td>{{ $m->tgl_terakhir_bayar }}</td>
                        <td style="white-space: nowrap;">
                            <div class="table-actions">
                                <a href="{{ route('member.edit', $m->id_member) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('member.destroy', $m->id_member) }}" method="POST"
                                    onsubmit="return confirm('Hapus member ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Data member belum ada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
