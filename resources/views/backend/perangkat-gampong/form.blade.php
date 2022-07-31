{!! Form::model($model, [
    'route' => $model->exists ? ['perangkat-gampong.update', $model->id] : 'perangkat-gampong.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- nik -->
    <div class="form-group col-md-6 col-12">
        <label for="nik">NIK</label>
        <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" name="nik"
            value="{{ old('nik', $model->nik) }}">
    </div>

    <!-- nama -->
    <div class="form-group col-md-6 col-12">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

</div>

<div class="row">

    <!-- jabatan -->
    <div class="form-group col-md-6 col-12">
        <label for="jabatan">Jabatan</label>
        <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
            value="{{ old('jabatan', $model->jabatan) }}">
    </div>

    <!-- jenis_kelamin -->
    <div class="form-group col-md-6 col-12">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
            name="jenis_kelamin" style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="L" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
            </option>
            <option value="P" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
            </option>
        </select>
    </div>

</div>

<div class="row">

    <!-- no_hp -->
    <div class="form-group col-md-6 col-12">
        <label for="no_hp">No HP</label>
        <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
            value="{{ old('no_hp', $model->no_hp) }}">
    </div>

    <!-- alamat -->
    <div class="form-group col-md-6 col-12">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
            value="{{ old('alamat', $model->alamat) }}">
    </div>

</div>



<div class="row">
    <!-- thubmnail -->
    <div class="form-group col-md-12 col-12">
        <label>Gambar/Thubmnail</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="photo_path" name="photo_path">
            <label class="custom-file-label" for="photo_path" id="label-photo_path">Choose
                file</label>
        </div>
    </div>

    <div class="form-group col-md-12 col-12">
        <center>
            <div class="image-preview">
                <img src="{{ asset('storage/' . $model->photo_path) }}" id="logo-preview" width="100%" height="100%">
            </div>
        </center>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#photo_path").onchange = function() {
        document.querySelector("#label-photo_path").textContent = this.files[0].name;
    }
</script>

<script>
    $(document).ready(function(e) {

        $('#photo_path').change(function() {
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#logo-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
