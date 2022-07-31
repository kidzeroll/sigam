<x-error-layout>
    <x-slot name="title">401 Unauthorized</x-slot>
    <h1>401</h1>
    <div class="page-description">
        Silahkan login terlebih dahulu!
    </div>
    <div class="page-search">
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                Kembali ke halaman home
            </a>
        </div>
    </div>
</x-error-layout>
