@extends('layouts.app')

@section('title', $data ? 'Edit Member' : 'Tambah Member')

@section('content')
<div class="container-form">
    <h2>{{ $data ? 'Edit' : 'Tambah' }} Member</h2>

    <div class="card">
        <form method="POST" action="{{ $data ? route('member.update', $data->id_member) : route('member.store') }}">
            @csrf

            @if ($data)
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="nama_member" value="{{ old('nama_member', $data->nama_member ?? '') }}" required>
                @error('nama_member') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label>Nomor Member</label>
                <input type="text" name="nomor_member" value="{{ old('nomor_member', $data->nomor_member ?? '') }}" required>
                @error('nomor_member') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat">{{ old('alamat', $data->alamat ?? '') }}</textarea>
                @error('alamat') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label>Tgl Mendaftar</label>
                <input type="datetime-local" name="tgl_mendaftar" id="tgl_mendaftar"
                       value="{{ old('tgl_mendaftar', isset($data->tgl_mendaftar) ? date('Y-m-d\TH:i', strtotime($data->tgl_mendaftar)) : '') }}"
                       onchange="updateMinBayar(this.value)">
                @error('tgl_mendaftar') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label>Tgl Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar"
                       value="{{ old('tgl_terakhir_bayar', $data->tgl_terakhir_bayar ?? '') }}"
                       min="{{ isset($data->tgl_mendaftar) ? date('Y-m-d', strtotime($data->tgl_mendaftar)) : '' }}">
                @error('tgl_terakhir_bayar') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('member.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function updateMinBayar(tglMendaftar) {
        const tglOnly = tglMendaftar ? tglMendaftar.split('T')[0] : '';
        document.getElementById('tgl_terakhir_bayar').min = tglOnly;

        const tglBayar = document.getElementById('tgl_terakhir_bayar').value;
        if (tglBayar && tglBayar < tglOnly) {
            document.getElementById('tgl_terakhir_bayar').value = '';
        }
    }
</script>
@endsection