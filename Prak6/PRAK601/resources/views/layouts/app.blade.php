<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Laravel MVC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">
    <div class="min-h-screen flex flex-col">

        <nav class="bg-white border-b border-slate-200 shadow-sm">
            <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-slate-800">
                    Praktikum Pemrograman Web 2
                </a>

                <div class="flex items-center gap-2">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition">
                        Beranda
                    </a>

                    <a href="{{ route('profile') }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-100 transition">
                        Profil
                    </a>
                </div>
            </div>
        </nav>

        <main class="flex-1">
            @yield('content')
        </main>

    </div>
</body>

</html>
