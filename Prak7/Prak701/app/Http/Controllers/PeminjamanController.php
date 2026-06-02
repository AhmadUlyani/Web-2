<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $pinjamans = Peminjaman::with(['member', 'buku'])->get();

        return view('peminjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        $members = Member::all();
        $bukus = Buku::all();

        return view('peminjaman.form', [
            'data' => null,
            'members' => $members,
            'bukus' => $bukus,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_member' => 'required|exists:member,id_member',
            'id_buku' => 'required|exists:buku,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date|after_or_equal:tgl_pinjam',
        ], [
            'id_member.required' => 'Member wajib dipilih.',
            'id_member.exists' => 'Member tidak ditemukan.',

            'id_buku.required' => 'Buku wajib dipilih.',
            'id_buku.exists' => 'Buku tidak ditemukan.',

            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_pinjam.date' => 'Tanggal pinjam harus berupa tanggal.',

            'tgl_kembali.date' => 'Tanggal kembali harus berupa tanggal.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih kecil dari tanggal pinjam.',
        ]);

        Peminjaman::create($request->only([
            'id_member',
            'id_buku',
            'tgl_pinjam',
            'tgl_kembali',
        ]));

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Peminjaman::findOrFail($id);
        $members = Member::all();
        $bukus = Buku::all();

        return view('peminjaman.form', compact('data', 'members', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_member' => 'required|exists:member,id_member',
            'id_buku' => 'required|exists:buku,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date|after_or_equal:tgl_pinjam',
        ], [
            'id_member.required' => 'Member wajib dipilih.',
            'id_member.exists' => 'Member tidak ditemukan.',

            'id_buku.required' => 'Buku wajib dipilih.',
            'id_buku.exists' => 'Buku tidak ditemukan.',

            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_pinjam.date' => 'Tanggal pinjam harus berupa tanggal.',

            'tgl_kembali.date' => 'Tanggal kembali harus berupa tanggal.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih kecil dari tanggal pinjam.',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update($request->only([
            'id_member',
            'id_buku',
            'tgl_pinjam',
            'tgl_kembali',
        ]));

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}