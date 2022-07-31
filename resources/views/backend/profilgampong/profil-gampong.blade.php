<x-backend-layout>
    <x-slot name="title">Profil Gampong</x-slot>

    <x-card class="card-primary" label="Profil Gampong">

        <ul class="nav nav-tabs" id="tab-list" role="tablist">

            <!-- preview -->
            <li class="nav-item">
                <a class="nav-link active" id="preview-tab" data-toggle="tab" href="#preview" role="tab"
                    aria-controls="preview" aria-selected="true">Logo</a>
            </li>

            <!-- data gampong -->
            <li class="nav-item">
                <a class="nav-link" id="data-gampong-tab" data-toggle="tab" href="#data-gampong" role="tab"
                    aria-controls="data-gampong" aria-selected="true">Data Gampong</a>
            </li>

            <!-- data keuchik -->
            <li class="nav-item">
                <a class="nav-link" id="data-keuchik-tab" data-toggle="tab" href="#data-keuchik" role="tab"
                    aria-controls="data-keuchik" aria-selected="true">Data Keuchik</a>
            </li>

            <!-- sosial media -->
            <li class="nav-item">
                <a class="nav-link" id="sosial-media-tab" data-toggle="tab" href="#sosial-media" role="tab"
                    aria-controls="sosial-media" aria-selected="true">Sosial Media</a>
            </li>

        </ul>

        <form action="{{ route('profil-gampong.update', $gampong->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="tab-content tab-bordered" id="tab-content">

                <!-- preview -->
                <div class="tab-pane fade show active" id="preview" role="tabpanel" aria-labelledby="preview-tab">

                    <center>
                        <div class="form-group">
                            <div class="image-preview">
                                <img src="{{ asset('storage/' . $gampong->logo_path) }}" id="logo-preview"
                                    width="100%" height="100%">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <!-- logo_path -->
                            <div class="form-group">
                                <label>Logo Gampong</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo_path" name="logo_path">
                                    <label class="custom-file-label" for="logo_path" id="label-logo_path">Choose
                                        file</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">Ganti Logo</button>

                        </div>
                    </center>

                </div>

                <!-- data gampong -->
                <div class="tab-pane fade show" id="data-gampong" role="tabpanel" aria-labelledby="data-gampong-tab">

                    <div class="row">
                        <div class="col-md-6 col-12">

                            <!-- nama gampong -->
                            <div class="form-group">
                                <label for="nama_gampong">Nama Gampong</label>
                                <input type="text" class="form-control  @error('nama_gampong') is-invalid @enderror"
                                    id="nama_gampong" name="nama_gampong"
                                    value="{{ old('nama_gampong', $gampong->nama_gampong) }}">
                                @error('nama_gampong')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- nama kabupaten -->
                            <div class="form-group">
                                <label for="nama_kabupaten">Nama Kabupaten</label>
                                <input type="text"
                                    class="form-control  @error('nama_kabupaten') is-invalid @enderror"
                                    id="nama_kabupaten" name="nama_kabupaten"
                                    value="{{ old('nama_kabupaten', $gampong->nama_kabupaten) }}">
                                @error('nama_kabupaten')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- kode gampong -->
                            <div class="form-group">
                                <label for="kode_gampong">Kode Gampong</label>
                                <input type="text" class="form-control  @error('kode_gampong') is-invalid @enderror"
                                    id="kode_gampong" name="kode_gampong"
                                    value="{{ old('kode_gampong', $gampong->kode_gampong) }}">
                                @error('kode_gampong')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="col-md-6 col-12">

                            <!-- nama kecamatan -->
                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text"
                                    class="form-control  @error('nama_kecamatan') is-invalid @enderror"
                                    id="nama_kecamatan" name="nama_kecamatan"
                                    value="{{ old('nama_kecamatan', $gampong->nama_kecamatan) }}">
                                @error('nama_kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- nama provinsi -->
                            <div class="form-group">
                                <label for="nama_provinsi">Nama Provinsi</label>
                                <input type="text"
                                    class="form-control  @error('nama_provinsi') is-invalid @enderror"
                                    id="nama_provinsi" name="nama_provinsi"
                                    value="{{ old('nama_provinsi', $gampong->nama_provinsi) }}">
                                @error('nama_provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- kode pos -->
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" class="form-control  @error('kode_pos') is-invalid @enderror"
                                    id="kode_pos" name="kode_pos"
                                    value="{{ old('kode_pos', $gampong->kode_pos) }}">
                                @error('kode_pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- alamat gampong -->
                    <div class="form-group">
                        <label for="alamat_gampong">Alamat Gampong</label>
                        <textarea class="form-control @error('alamat_gampong') is-invalid @enderror" id="alamat_gampong"
                            name="alamat_gampong">{{ old('alamat_gampong', $gampong->alamat_gampong) }}</textarea>
                        @error('alamat_gampong')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update</button>


                </div>

                <!-- data keuchik -->
                <div class="tab-pane fade show" id="data-keuchik" role="tabpanel"
                    aria-labelledby="data-keuchik-tab">

                    <!-- nama kecuhik -->
                    <div class="form-group">
                        <label for="nama_keuchik">Nama Keuchik</label>
                        <input type="text" class="form-control  @error('nama_keuchik') is-invalid @enderror"
                            id="nama_keuchik" name="nama_keuchik"
                            value="{{ old('nama_keuchik', $gampong->nama_keuchik) }}">
                        @error('nama_keuchik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- alamat keuchik -->
                    <div class="form-group">
                        <label for="alamat_keuchik">Alamat Keuchik</label>
                        <textarea class="form-control @error('alamat_keuchik') is-invalid @enderror" id="alamat_keuchik"
                            name="alamat_keuchik">{{ old('alamat_keuchik', $gampong->alamat_keuchik) }}</textarea>
                        @error('alamat_keuchik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- ttd_path -->
                    <div class="form-group">
                        <label>Tanda Tangan Keuchik</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ttd_path" name="ttd_path">
                            <label class="custom-file-label" for="ttd_path" id="label-ttd_path">Choose
                                file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="image-preview">
                            <img src="{{ asset('storage/' . $gampong->ttd_path) }}" id="ttd_preview" width="100%"
                                height="100%">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                </div>

                <!-- sosial media -->
                <div class="tab-pane fade show" id="sosial-media" role="tabpanel"
                    aria-labelledby="sosial-media-tab">

                    <div class="row">

                        <div class="col-md-6 col-12">

                            <!-- twitter -->
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control  @error('twitter') is-invalid @enderror"
                                    id="twitter" name="twitter" value="{{ old('twitter', $gampong->twitter) }}">
                                @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- instagram -->
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control  @error('instagram') is-invalid @enderror"
                                    id="instagram" name="instagram"
                                    value="{{ old('instagram', $gampong->instagram) }}">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6 col-12">

                            <!-- facebook -->
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control  @error('facebook') is-invalid @enderror"
                                    id="facebook" name="facebook"
                                    value="{{ old('facebook', $gampong->facebook) }}">
                                @error('facebook')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- whatsapp -->
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp</label>
                                <input type="text" class="form-control  @error('whatsapp') is-invalid @enderror"
                                    id="whatsapp" name="whatsapp"
                                    value="{{ old('whatsapp', $gampong->whatsapp) }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- map -->
                    <div class="form-group">
                        <label for="map">Map</label>
                        <textarea class="form-control @error('map') is-invalid @enderror" id="map" name="map">{{ old('map', $gampong->map) }}</textarea>
                        @error('map')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update</button>

                </div>

            </div>

        </form>

    </x-card>

    @push('script')
        <script type="text/javascript">
            document.querySelector("#logo_path").onchange = function() {
                document.querySelector("#label-logo_path").textContent = this.files[0].name;
            }

            document.querySelector("#ttd_path").onchange = function() {
                document.querySelector("#label-ttd_path").textContent = this.files[0].name;
            }
        </script>

        <script>
            $(document).ready(function(e) {

                $('#logo_path').change(function() {
                    let reader = new FileReader();

                    reader.onload = (e) => {
                        $('#logo-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>

        <script>
            $(document).ready(function(e) {

                $('#ttd_path').change(function() {
                    let reader = new FileReader();

                    reader.onload = (e) => {
                        $('#ttd_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endpush

</x-backend-layout>
