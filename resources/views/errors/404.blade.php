<x-error-layout>
    <x-slot name="title">404 Not Found</x-slot>
    <h1>404</h1>
    <div class="page-description">
        Halaman yang anda cari tidak ditemukan!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
