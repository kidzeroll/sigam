{!! Form::model($model, [
    'route' => $model->exists ? ['dusun.update', $model->id] : 'dusun.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">

    <!-- nama -->
    <div class="form-group col-md-12 col-12">
        <label for="nama">Dusun</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

</div>

<div class="row">

    <!-- rt -->
    <div class="form-group col-md-6 col-12">
        <label for="rt">RT</label>
        <input type="text" class="form-control  @error('rt') is-invalid @enderror" id="rt" name="rt"
            value="{{ old('rt', $model->rt) }}">
    </div>

    <!-- rw -->
    <div class="form-group col-md-6 col-12">
        <label for="rw">RW</label>
        <input type="text" class="form-control  @error('rw') is-invalid @enderror" id="rw" name="rw"
            value="{{ old('rw', $model->rw) }}">
    </div>

</div>




{!! Form::close() !!}
