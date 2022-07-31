<x-backend-layout>
    <x-slot name="title">Detail Artikel</x-slot>

    <div class="row">

        <div class="col-md-9 col-12">
            <x-card class="card-primary">

                <x-slot name="label">Detail Artikel</x-slot>

                <h5>{{ $model->judul }}</h5>
                <small>{{ $model->user->name }} | {{ $model->created_at->format('d M Y') }}</small>

                <hr class="bg-primary">

                @if ($model->photo_path)
                    <img src="{{ asset('storage/' . $model->photo_path) }}" width="100%" height="400px">
                @endif

                <div class="mt-3">
                    {!! $model->isi !!}
                </div>

                <div class="form-group mt-3">
                    <a href="{{ route('artikel.index') }}" class="btn btn-danger btn-block text-decoration-none">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>

            </x-card>

        </div>


        <div class="col-md-3 col-12">
            <x-card class="card-primary " label="Kategori">
                {{ $model->kategori->nama }}

            </x-card>
        </div>

    </div>

</x-backend-layout>
