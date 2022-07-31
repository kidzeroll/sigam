<x-error-layout>
    <x-slot name="title">503 Service Unavailable</x-slot>
    <h1>503</h1>
    <div class="page-description">
        Terjadi kesalahan dalam internal server!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
