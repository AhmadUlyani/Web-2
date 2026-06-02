@extends('layouts.app')

@section('title', $data ? 'Edit Peminjaman' : 'Tambah Peminjaman')

@section('content')
    <div class="container-form">
        <h2>{{ $data ? 'Edit' : 'Tambah' }} Peminjaman</h2>

        <div class="card">
            <form method="POST"
                action="{{ $data ? route('peminjaman.update', $data->id_peminjaman) : route('peminjaman.store') }}">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Member</label>
                    <select name="id_member" required>
                        <option value="">-- Pilih Member --</option>

                        @foreach ($members as $m)
                            <option value="{{ $m->id_member }}"
                                {{ old('id_member', $data->id_member ?? '') == $m->id_member ? 'selected' : '' }}>
                                {{ $m->nama_member }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_member')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Buku</label>
                    <select name="id_buku" required>
                        <option value="">-- Pilih Buku --</option>

                        @foreach ($bukus as $b)
                            <option value="{{ $b->id }}"
                                {{ old('id_buku', $data->id_buku ?? '') == $b->id ? 'selected' : '' }}>
                                {{ $b->judul }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_buku')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tgl Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam"
                        value="{{ old('tgl_pinjam', $data->tgl_pinjam ?? '') }}" required
                        onchange="updateMinKembali(this.value)">
                    @error('tgl_pinjam')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali"
                        value="{{ old('tgl_kembali', $data->tgl_kembali ?? '') }}"
                        min="{{ old('tgl_pinjam', $data->tgl_pinjam ?? '') }}">
                    @error('tgl_kembali')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateMinKembali(tglPinjam) {
            document.getElementById('tgl_kembali').min = tglPinjam;

            const tglKembali = document.getElementById('tgl_kembali').value;
            if (tglKembali && tglKembali < tglPinjam) {
                document.getElementById('tgl_kembali').value = '';
            }
        }
    </script>
@endsection
