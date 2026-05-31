@extends('layouts.app')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-12">

    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">

        <div class="p-6 md:p-8">
            <p class="text-xs font-semibold tracking-widest text-slate-500 uppercase mb-2">
                Detail Pengalaman
            </p>

            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">
                {{ $experience->judul }}
            </h1>

            <img src="{{ asset('images/' . $experience->gambar) }}"
                 alt="{{ $experience->judul }}"
                 class="w-full h-[500px] object-cover rounded-2xl border border-slate-200 shadow-sm">
        </div>

        <div class="px-6 md:px-8 pb-8">
            <div class="grid md:grid-cols-2 gap-4 mb-5">
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                    <p class="text-xs font-semibold tracking-widest text-slate-500 uppercase mb-2">
                        Waktu
                    </p>

                    <p class="font-semibold text-slate-900">
                        {{ $experience->waktu }}
                    </p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                    <p class="text-xs font-semibold tracking-widest text-slate-500 uppercase mb-2">
                        Kegiatan
                    </p>

                    <p class="font-semibold text-slate-900">
                        {{ $experience->judul }}
                    </p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 mb-5">
                <h2 class="text-sm font-semibold tracking-widest text-slate-500 uppercase mb-3">
                    Kesan
                </h2>

                <p class="text-slate-700 leading-relaxed">
                    {{ $experience->kesan }}
                </p>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 mb-6">
                <h2 class="text-sm font-semibold tracking-widest text-slate-500 uppercase mb-3">
                    Deskripsi
                </h2>

                <p class="text-slate-700 leading-relaxed">
                    {{ $experience->deskripsi }}
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('profile') }}"
                   class="px-5 py-3 rounded-xl bg-slate-900 text-white font-medium hover:bg-slate-700 transition">
                    Kembali ke Profile
                </a>
            </div>
        </div>

    </div>

</section>
@endsection