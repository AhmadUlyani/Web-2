@extends('layouts.app')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-16">
        <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">

            <div class="grid lg:grid-cols-2 gap-0">
                <div class="p-10 md:p-14 flex flex-col justify-center">
                    <p class="text-sm font-semibold text-blue-600 mb-4">
                        Praktikum Modul 6
                    </p>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-5">
                        Selamat Datang di Website My Profile
                    </h1>
                    <p class="text-slate-600 leading-relaxed mb-8 max-w-lg">
                        Website ini dibuat menggunakan framework Laravel dengan menerapkan
                        konsep Model, View, dan Controller.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('profile') }}"
                            class="px-6 py-3 rounded-xl bg-slate-900 text-white font-medium hover:bg-slate-700 transition">
                            Lihat Profile
                        </a>
                    </div>
                </div>

                <div class="bg-slate-50 border-t lg:border-t-0 lg:border-l border-slate-200 p-10 md:p-14 flex items-center">
                    <div class="w-full bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                        <div class="flex items-center gap-4 mb-8">
                            <img src="{{ asset('images/' . $profile->gambar) }}" alt="Foto Profil"
                                class="w-14 h-14 rounded-full object-cover border border-sky-100 shadow-sm">
                            <div>
                                <p class="text-sm text-slate-500">Praktikan</p>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    {{ $profile->nama_lengkap }}
                                </h2>
                            </div>
                        </div>
                        <div class="space-y-5">
                            <div>
                                <p class="text-sm text-slate-500 mb-1">Nama Lengkap</p>
                                <p class="text-lg font-semibold text-slate-900">
                                    {{ $profile->nama_lengkap }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500 mb-1">NIM</p>
                                <p class="text-lg font-semibold text-slate-900">
                                    {{ $profile->nim }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
