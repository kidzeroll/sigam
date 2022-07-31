{!! Form::model($model, [
    'route' => $model->exists ? ['hubungan.update', $model->id] : 'hubungan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">

    <!-- nama -->
    <div class="form-group col-md-12 col-12">
        <label for="nama">Hubungan Dalam Keluarga</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

</div>


{!! Form::close() !!}
