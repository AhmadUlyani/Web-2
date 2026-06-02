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
            'alamat' => 'nullable|string',
            'tgl_mendaftar' => 'nullable|date',
            'tgl_terakhir_bayar' => 'nullable|date|after_or_equal:tgl_mendaftar',
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
            'alamat' => 'nullable|string',
            'tgl_mendaftar' => 'nullable|date',
            'tgl_terakhir_bayar' => 'nullable|date|after_or_equal:tgl_mendaftar',
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