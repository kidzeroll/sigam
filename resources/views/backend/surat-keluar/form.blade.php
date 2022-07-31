{!! Form::model($model, [
    'route' => $model->exists ? ['surat-keluar.update', $model->id] : 'surat-keluar.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- no Agenda -->
    <div class="form-group col-md-6 col-12">
        <label for="no_agenda">No Agenda</label>
        <input type="text" class="form-control  @error('no_agenda') is-invalid @enderror" id="no_agenda" name="no_agenda"
            value="{{ old('no_agenda', $model->no_agenda) }}">
    </div>

    <!-- no Surat -->
    <div class="form-group col-md-6 col-12">
        <label for="no_surat">No Surat</label>
        <input type="text" class="form-control  @error('no_surat') is-invalid @enderror" id="no_surat"
            name="no_surat" value="{{ old('no_surat', $model->no_surat) }}">
    </div>

</div>

<div class="row">

    <!-- tanggal surat -->
    <div class="form-group col-md-12 col-12">
        <label for="tanggal_surat">Tanggal Surat</label>
        <input type="date" class="form-control  @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat"
            name="tanggal_surat" value="{{ old('tanggal_surat', $model->tanggal_surat?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<div class="row">

    <!-- perihal -->
    <div class="form-group col-md-6 col-12">
        <label for="perihal_surat">Perihal Surat</label>
        <input type="text" class="form-control  @error('perihal_surat') is-invalid @enderror" id="perihal_surat"
            name="perihal_surat" value="{{ old('perihal_surat', $model->perihal_surat) }}">
    </div>

    <!-- Tembusan -->
    <div class="form-group col-md-6 col-12">
        <label for="tembusan">Tembusan</label>
        <input type="text" class="form-control  @error('tembusan') is-invalid @enderror" id="tembusan"
            name="tembusan" value="{{ old('tembusan', $model->tembusan) }}">
    </div>

</div>

<div class="row">

    <!-- penerima -->
    <div class="form-group col-md-12 col-12">
        <label for="penerima">Penerima</label>
        <input type="text" class="form-control  @error('penerima') is-invalid @enderror" id="penerima"
            name="penerima" value="{{ old('penerima', $model->penerima) }}">
    </div>

    <!-- keterangan -->
    <div class="form-group col-12">
        <label>Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
    </div>

    <!-- lampiran_path -->
    <div class="form-group col-md-12 col-12">
        <label>Scan Surat</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="lampiran_path" name="lampiran_path">
            <label class="custom-file-label" for="lampiran_path" id="label-lampiran_path">Choose
                file</label>
        </div>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#lampiran_path").onchange = function() {
        document.querySelector("#label-lampiran_path").textContent = this.files[0].name;
    }
</script>
