<x-error-layout>
    <x-slot name="title">429 Too Many Requests</x-slot>
    <h1>429</h1>
    <div class="page-description">
        Terlalu banyak permintaan dari server!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
