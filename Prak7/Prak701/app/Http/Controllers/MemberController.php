<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.form', [
            'data' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required|string|max:250',
            'nomor_member' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date|after_or_equal:tgl_mendaftar',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa teks.',
            'nama_member.max' => 'Nama member maksimal 250 karakter.',

            'nomor_member.required' => 'Nomor member wajib diisi.',
            'nomor_member.string' => 'Nomor member harus berupa teks.',
            'nomor_member.max' => 'Nomor member maksimal 15 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_mendaftar.date' => 'Tanggal mendaftar harus berupa tanggal yang valid.',

            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
            'tgl_terakhir_bayar.date' => 'Tanggal terakhir bayar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.after_or_equal' => 'Tanggal terakhir bayar tidak boleh lebih kecil dari tanggal mendaftar.',
        ]);

        Member::create($request->only([
            'nama_member',
            'nomor_member',
            'alamat',
            'tgl_mendaftar',
            'tgl_terakhir_bayar',
        ]));

        return redirect()->route('member.index')->with('success', 'Data member berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Member::findOrFail($id);

        return view('member.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_member' => 'required|string|max:250',
            'nomor_member' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date|after_or_equal:tgl_mendaftar',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string' => 'Nama member harus berupa teks.',
            'nama_member.max' => 'Nama member maksimal 250 karakter.',

            'nomor_member.required' => 'Nomor member wajib diisi.',
            'nomor_member.string' => 'Nomor member harus berupa teks.',
            'nomor_member.max' => 'Nomor member maksimal 15 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',

            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_mendaftar.date' => 'Tanggal mendaftar harus berupa tanggal yang valid.',

            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
            'tgl_terakhir_bayar.date' => 'Tanggal terakhir bayar harus berupa tanggal yang valid.',
            'tgl_terakhir_bayar.after_or_equal' => 'Tanggal terakhir bayar tidak boleh lebih kecil dari tanggal mendaftar.',
        ]);

        $member = Member::findOrFail($id);

        $member->update($request->only([
            'nama_member',
            'nomor_member',
            'alamat',
            'tgl_mendaftar',
            'tgl_terakhir_bayar',
        ]));

        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('member.index')->with('success', 'Data member berhasil dihapus.');
    }
}
