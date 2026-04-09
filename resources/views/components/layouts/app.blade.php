<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} | Poliklinik</title>

    {{-- FONTS & ICONS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .brand-serif { font-family: 'Instrument Serif', serif; }
    </style>
</head>

<body class="bg-slate-50 min-h-screen">

<div class="flex min-h-screen">
    
    {{-- SIDEBAR --}}
    <div id="appSidebar" class="fixed top-0 left-0 h-screen w-64 z-50 bg-[#1e2d6b] border-r border-white/10 transition-transform lg:translate-x-0 -translate-x-full shadow-2xl">
        @include('components.partials.sidebar')
    </div>

    {{-- MAIN CONTENT AREA --}}
    <div class="flex-1 flex flex-col lg:ml-64">
        
        {{-- HEADER --}}
        @include('components.partials.header')

        {{-- MAIN SLOT --}}
        <main class="p-6 flex-1">
            @if(session('success'))
                <div class="alert alert-success mb-6 rounded-xl shadow-sm">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{ $slot }}
        </main>

        {{-- FOOTER --}}
        @include('components.partials.footer')

    </div>

</div>

{{-- Overlay Mobile --}}
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

<script>
    function toggleSidebar() {
        document.getElementById('appSidebar').classList.toggle('-translate-x-full');
        document.getElementById('sidebarOverlay').classList.toggle('hidden');
    }
</script>

@stack('scripts')

</body>
</html>