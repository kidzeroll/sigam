<x-error-layout>
    <x-slot name="title">403 Forbidden</x-slot>
    <h1>403</h1>
    <div class="page-description">
        Anda tidak memiliki hak akses untuk halaman ini!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
