{!! Form::model($model, [
    'route' => $model->exists ? ['galeri.update', $model->id] : 'galeri.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}

<div class="row">
    <!-- photo_path -->
    <div class="form-group col-12">
        <label for="photo_path">Foto</label>
        <input type="file" class="form-control" id="photo_path" name="photo_path[]" multiple>
    </div>
</div>

<div class="row">

    <!-- deskripsi -->
    <div class="form-group col-12">
        <label>Deskripsi</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi', $model->deskripsi) }}</textarea>
    </div>

</div>

{!! Form::close() !!}
