{!! Form::model($model, [
    'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- name -->
    <div class="form-group col-md-6 col-12">
        <label for="name">Nama</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $model->name) }}">
    </div>

    <!-- email -->
    <div class="form-group col-md-6 col-12">
        <label for="email">Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email', $model->email) }}">
    </div>

</div>

<div class="row">

    <!-- password -->
    <div class="form-group col-md-12 col-12">
        <label for="password">password</label>
        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
            name="password" value="{{ old('password') }}">
    </div>

</div>

<div class="row">

    <!-- gender -->
    <div class="form-group col-md-6 col-12">
        <label for="gender">Jenis Kelamin</label>
        <select class="form-control select2 @error('gender') is-invalid @enderror" id="gender" name="gender"
            style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="L" {{ old('gender', $model->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('gender', $model->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <!-- role -->
    <div class="form-group col-md-6 col-12">
        <label for="role">Role</label>
        <select class="form-control select2 @error('role') is-invalid @enderror" id="role" name="role"
            style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="admin" {{ old('role', $model->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ old('role', $model->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
        </select>
    </div>

</div>

<hr class="bg-primary">

<div class="row">

    <!-- birth date -->
    <div class="form-group col-md-6 col-12">
        <label for="birth_date">Tanggal Lahir</label>
        <input type="date" class="form-control  @error('birth_date') is-invalid @enderror" id="birth_date"
            name="birth_date" value="{{ old('birth_date', $model->birth_date?->format('Y-m-d') ?? '') }}">
    </div>

    <!-- phone -->
    <div class="form-group col-md-6 col-12">
        <label for="phone">No HP</label>
        <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone"
            value="{{ old('phone', $model->phone) }}">
    </div>

</div>

<div class="row">

    <!-- address -->
    <div class="form-group col-12">
        <label>Alamat</label>
        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address">{{ old('address', $model->address) }}</textarea>
    </div>

    <!-- about -->
    <div class="form-group col-12">
        <label>About Me</label>
        <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about">{{ old('about', $model->about) }}</textarea>
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
