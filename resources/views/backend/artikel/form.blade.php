{!! Form::model($model, [
    'route' => $model->exists ? ['artikel.update', $model->id] : 'artikel.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- name -->
    <div class="form-group col-md-12 col-12">
        <label for="judul">Judul</label>
        <input type="text" class="form-control  @error('judul') is-invalid @enderror" id="judul" name="judul"
            value="{{ old('judul', $model->judul) }}">
    </div>

    <!-- kategori -->
    <div class="form-group col-md-12 col-12">
        <label for="kategori_id">Kategori</label>
        <select class="form-control select2 @error('kategori_id') is-invalid @enderror" id="kategori_id"
            name="kategori_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ old('kategori_id', $model->kategori_id == $kategori->id ? 'selected' : '') }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>


    <!-- isi -->
    <div class="form-group col-md-12 col-12">
        <label for="isi">Isi Artikel</label>
        <textarea class="summernote-simple @error('isi') is-invalid @enderror" name="isi" id="isi">{{ old('isi', $model->isi) }}</textarea>
    </div>

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
