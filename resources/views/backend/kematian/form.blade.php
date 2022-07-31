{!! Form::model($model, [
    'route' => $model->exists ? ['kematian.update', $model->id] : 'kematian.store',
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



    <!-- tanggal meniinggal -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_meninggal">Tanggal Meninggal</label>
        <input type="date" class="form-control  @error('tanggal_meninggal') is-invalid @enderror"
            id="tanggal_meninggal" name="tanggal_meninggal"
            value="{{ old('tanggal_meninggal', $model->tanggal_meninggal?->format('Y-m-d') ?? '') }}">
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
