{!! Form::model($model, [
    'route' => $model->exists ? ['perpindahan.update', $model->id] : 'perpindahan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">

    @if ($model->exists)
        <div class="form-group col-md-6 col-12">
            <label for="penduduk_id">Penduduk</label>
            <select class="form-control select2" id="penduduk_id" name="penduduk_id" style="width: 100%" disabled>
                <option disabled selected>Pilih</option>
                @foreach ($penduduks as $penduduk)
                    <option value="{{ $penduduk->id }}"
                        {{ old('penduduk_id', $model->penduduk_id) == $penduduk->id ? 'selected' : '' }}>
                        {{ $penduduk->nik }} - {{ $penduduk->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    @else
        <div class="form-group col-md-6 col-12">
            <label for="penduduk_id">Penduduk</label>
            <select class="form-control select2" id="penduduk_id" name="penduduk_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($penduduks as $penduduk)
                    <option value="{{ $penduduk->id }}"
                        {{ old('penduduk_id', $model->penduduk_id) == $penduduk->id ? 'selected' : '' }}>
                        {{ $penduduk->nik }} - {{ $penduduk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

    @endif



    <!-- tanggal pindah -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_pindah">Tanggal Pindah</label>
        <input type="date" class="form-control  @error('tanggal_pindah') is-invalid @enderror" id="tanggal_pindah"
            name="tanggal_pindah" value="{{ old('tanggal_pindah', $model->tanggal_pindah?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<div class="row">
    <!-- tujuan_pindah -->
    <div class="form-group col-12">
        <label for="tujuan_pindah">Tujuan Pindah</label>
        <input type="text" class="form-control  @error('tujuan_pindah') is-invalid @enderror" id="tujuan_pindah"
            name="tujuan_pindah" value="{{ old('tujuan_pindah', $model->tujuan_pindah) }}">
    </div>

</div>

<div class="row">
    <!-- keterangan -->
    <div class="form-group col-12">
        <label>Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
    </div>
</div>


{!! Form::close() !!}
