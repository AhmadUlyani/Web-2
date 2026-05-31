@extends('layouts.app')

@section('content')
    <section class="max-w-6xl mx-auto px-6 py-12">
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900">
                Profil
            </h1>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            {{-- Card Foto Profile --}}
            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm text-center">
                <img src="{{ asset('images/' . $profile->gambar) }}" alt="Foto Profile"
                    class="w-40 h-40 mx-auto rounded-2xl object-cover border border-slate-200 mb-6">

                <h2 class="text-2xl font-bold text-slate-900">
                    {{ $profile->nama_lengkap }}
                </h2>

                <p class="text-slate-500 mt-1">
                    {{ $profile->nim }}
                </p>

                <div class="mt-5 inline-block px-4 py-2 rounded-full bg-slate-100 text-slate-700 text-sm">
                    {{ $profile->asal_prodi }}
                </div>
            </div>

            {{-- Card Informasi Biodata --}}
            <div class="lg:col-span-2 bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    Biodata
                </h3>

                <div class="grid md:grid-cols-2 gap-5">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">Nama Lengkap</p>
                        <p class="font-semibold text-slate-900">
                            {{ $profile->nama_lengkap }}
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">NIM</p>
                        <p class="font-semibold text-slate-900">
                            {{ $profile->nim }}
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">Asal Prodi</p>
                        <p class="font-semibold text-slate-900">
                            {{ $profile->asal_prodi }}
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">Hobi</p>
                        <p class="font-semibold text-slate-900">
                            {{ $profile->hobi }}
                        </p>
                    </div>

                    <div class="md:col-span-2 bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">Skill</p>
                        <p class="font-semibold text-slate-900">
                            {{ $profile->skill }}
                        </p>
                    </div>

                    <div class="md:col-span-2 bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <p class="text-sm text-slate-500 mb-1">Informasi Tambahan</p>
                        <p class="font-semibold text-slate-900 leading-relaxed">
                            {{ $profile->informasi_tambahan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Experience --}}
        <div>
            <div class="mb-6">
                <p class="text-sm font-semibold text-blue-600 mb-2">
                    Experience
                </p>

                <h2 class="text-3xl font-bold text-slate-900">
                    Pengalaman Paling Berkesan
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($experiences as $experience)
                    <div
                        class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">

                        {{-- Gambar Experience --}}
                        <div class="p-3">
                            <img src="{{ asset('images/' . $experience->gambar) }}" alt="{{ $experience->judul }}"
                                class="w-full aspect-square object-cover rounded-2xl">
                        </div>

                        {{-- Isi Card --}}
                        <div class="px-6 pb-6 flex flex-col flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-6">
                                {{ $experience->judul }}
                            </h3>

                            <a href="{{ route('experience.detail', $experience->id) }}"
                                class="mt-auto inline-flex justify-center w-full px-4 py-3 rounded-xl bg-slate-900 text-white font-medium hover:bg-slate-700 transition">
                                Lihat Detail
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
