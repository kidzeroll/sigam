<x-error-layout>
    <x-slot name="title">419 Page Expired</x-slot>
    <h1>419</h1>
    <div class="page-description">
        Halaman yang anda cari expired!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
