{!! Form::model($model, [
    'route' => $model->exists ? ['pendatang.update', $model->id] : 'pendatang.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- no_kk -->
    <div class="form-group col-md-6 col-12">
        <label for="no_kk">No KK</label>
        <input type="text" class="form-control  @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk"
            value="{{ old('no_kk', $model->no_kk) }}">
    </div>

    <!-- nik -->
    <div class="form-group col-md-6 col-12">
        <label for="nik">NIK</label>
        <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" name="nik"
            value="{{ old('nik', $model->nik) }}">
    </div>

</div>

<div class="row">

    <!-- nama -->
    <div class="form-group col-md-6 col-12">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
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
    <!-- tanggal datang -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_datang">Tanggal Datang</label>
        <input type="date" class="form-control  @error('tanggal_datang') is-invalid @enderror" id="tanggal_datang"
            name="tanggal_datang" value="{{ old('tanggal_datang', $model->tanggal_datang?->format('Y-m-d') ?? '') }}">
    </div>

    <!-- tujuan_kedatangan -->
    <div class="form-group col-md-6 col-12">
        <label for="tujuan_kedatangan">Tujuan Kedatangan</label>
        <input type="text" class="form-control  @error('tujuan_kedatangan') is-invalid @enderror"
            id="tujuan_kedatangan" name="tujuan_kedatangan"
            value="{{ old('tujuan_kedatangan', $model->tujuan_kedatangan) }}">
    </div>

</div>

<div class="row">
    <!-- lama_kedatangan -->
    <div class="form-group col-md-6 col-12">
        <label for="lama_kedatangan">Lama Kedatangan</label>
        <input type="text" class="form-control  @error('lama_kedatangan') is-invalid @enderror" id="lama_kedatangan"
            name="lama_kedatangan" value="{{ old('lama_kedatangan', $model->lama_kedatangan) }}">
    </div>

    <!-- no_hp -->
    <div class="form-group col-md-6 col-12">
        <label for="no_hp">No HP</label>
        <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
            value="{{ old('no_hp', $model->no_hp) }}">
    </div>
</div>

<div class="row">
    <!-- alamat_asal -->
    <div class="form-group col-12">
        <label>Alamat</label>
        <textarea class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" id="alamat_asal">{{ old('alamat_asal', $model->alamat_asal) }}</textarea>
    </div>

    <!-- status -->
    <div class="form-group col-12">
        <label for="status">Status</label>
        <select class="form-control select2 @error('status') is-invalid @enderror" id="status" name="status"
            style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="proses" {{ old('status', $model->status) == 'proses' ? 'selected' : '' }}>Proses
            </option>
            <option value="selesai" {{ old('status', $model->status) == 'selesai' ? 'selected' : '' }}>Selesai
            </option>
            <option value="menetap" {{ old('status', $model->status) == 'menetap' ? 'selected' : '' }}>Menetap
            </option>
        </select>
    </div>

    <!-- photo_path -->
    <div class="form-group col-12">
        <label>Foto</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="photo_path" name="photo_path">
            <label class="custom-file-label" for="photo_path" id="label-photo_path">Choose
                file</label>
        </div>
    </div>
</div>


{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#photo_path").onchange = function() {
        document.querySelector("#label-photo_path").textContent = this.files[0].name;
    }
</script>
