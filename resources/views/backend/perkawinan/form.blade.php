{!! Form::model($model, [
    'route' => $model->exists ? ['perkawinan.update', $model->id] : 'perkawinan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">

    <!-- nama -->
    <div class="form-group col-md-12 col-12">
        <label for="nama">Status Perkawinan</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

</div>


{!! Form::close() !!}
