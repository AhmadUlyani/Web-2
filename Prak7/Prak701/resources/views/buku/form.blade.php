@extends('layouts.app')

@section('title', $data ? 'Edit Buku' : 'Tambah Buku')

@section('content')
<div class="container-form">
    <h2>{{ $data ? 'Edit' : 'Tambah' }} Buku</h2>

    <div class="card">
        <form method="POST" action="{{ $data ? route('buku.update', $data->id) : route('buku.store') }}">
            @csrf

            @if ($data)
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $data->judul ?? '') }}">
                @error('judul')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis', $data->penulis ?? '') }}">
                @error('penulis')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="{{ old('penerbit', $data->penerbit ?? '') }}">
                @error('penerbit')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $data->tahun_terbit ?? '') }}">
                @error('tahun_terbit')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection