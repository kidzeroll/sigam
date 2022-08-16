<x-frontend-layout>
    <x-slot name="title">Administrasi Surat</x-slot>

    <section class="skkm" id="skkm" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Surat Keterangan Kematian</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!--jenis_surat-->
                            <input type="hidden" value="SKK" name="jenis_surat" id="jenis_surat">

                            <!-- nik -->
                            <div class="form-group col-md-6 col-12">
                                <label for="nik"><span class="text-danger"><sup>*</sup></span>NIK yang
                                    meninggal</label>
                                <input type="text" class="form-control  @error('nik') is-invalid @enderror"
                                    id="nik" name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- nama -->
                            <div class="form-group col-md-6 col-12">
                                <label for="nama"><span class="text-danger"><sup>*</sup></span>Nama yang
                                    meninggal</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <!-- jenis_kelamin -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="jenis_kelamin"><span class="text-danger"><sup>*</sup></span>Jenis
                                    Kelamin</label>
                                <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror"
                                    id="jenis_kelamin" name="jenis_kelamin" style="width: 100%;">
                                    <option disabled selected>Pilih</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="tanggal_lahir"><span class="text-danger"><sup>*</sup></span>Tanggal
                                    Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="row">

                            <!-- tempat_lahir -->
                            <div class="form-group col-12 mt-3">
                                <label for="tempat_lahir"><span class="text-danger"><sup>*</sup></span>Tempat
                                    Lahir</label>
                                <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- alamat -->
                            <div class="form-group col-12 mt-3">
                                <label><span class="text-danger"><sup>*</sup></span>Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="row">
                            <!-- agama-->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="agama_id"><span class="text-danger"><sup>*</sup></span>Agama</label>
                                <select class="form-control select2 @error('agama_id') is-invalid @enderror"
                                    id="agama_id" name="agama_id" style="width: 100%;">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($agamas as $agama)
                                        <option value="{{ $agama->id }}"
                                            {{ old('agama_id') == $agama->id ? 'selected' : '' }}>
                                            {{ $agama->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agama_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!--pekerjaan-->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="pekerjaan_id"><span class="text-danger"><sup>*</sup></span>Pekerjaan</label>
                                <select class="form-control select2 @error('pekerjaan_id') is-invalid @enderror"
                                    id="pekerjaan_id" name="pekerjaan_id" style="width: 100%">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <option value="{{ $pekerjaan->id }}"
                                            {{ old('pekerjaan_id') == $pekerjaan->id ? 'selected' : '' }}>
                                            {{ $pekerjaan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pekerjaan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <div class="row">
                            <!-- no hp -->
                            <div class="form-group col-12 mt-3">
                                <label for="no_hp"><span class="text-danger"><sup>*</sup></span>No Whatsapp yang
                                    membuat</label>
                                <input id="no_hp" type="text"
                                    class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                    value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span><small class="text-secondary">Mohon masukkan nomor Whatsapp yang benar karena
                                        surat akan dikirim ke Whatsapp anda berupa pdf</small></span>
                            </div>
                        </div>

                        <div class="row">

                            <!-- penyebab -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="penyebab"><span class="text-danger"><sup>*</sup></span>Penyebab
                                    Meninggal</label>
                                <input id="penyebab" type="text"
                                    class="form-control @error('penyebab') is-invalid @enderror" name="penyebab"
                                    value="{{ old('penyebab') }}">
                                @error('penyebab')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- tanggal_meninggal -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="tanggal_meninggal"><span class="text-danger"><sup>*</sup></span>Tanggal
                                    Meninggal</label>
                                <input type="date"
                                    class="form-control  @error('tanggal_meninggal') is-invalid @enderror"
                                    id="tanggal_meninggal" name="tanggal_meninggal"
                                    value="{{ old('tanggal_meninggal') }}">
                                @error('tanggal_meninggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="row">

                            <!-- tempat_dikebumikan -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="tempat_dikebumikan"><span class="text-danger"><sup>*</sup></span>Tempat
                                    Dikebumikan</label>
                                <input id="tempat_dikebumikan" type="text"
                                    class="form-control @error('tempat_dikebumikan') is-invalid @enderror"
                                    name="tempat_dikebumikan" value="{{ old('tempat_dikebumikan') }}">
                                @error('tempat_dikebumikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- tanggal_dikebumikan -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="tanggal_dikebumikan"><span class="text-danger"><sup>*</sup></span>Tanggal
                                    Dikebumikan</label>
                                <input type="date"
                                    class="form-control  @error('tanggal_dikebumikan') is-invalid @enderror"
                                    id="tanggal_dikebumikan" name="tanggal_dikebumikan"
                                    value="{{ old('tanggal_dikebumikan') }}">
                                @error('tanggal_dikebumikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="row">

                            <!-- pukul_meninggal -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="pukul_meninggal"><span class="text-danger"><sup>*</sup></span>Pukul
                                    Meninggal</label>
                                <input id="pukul_meninggal" type="time"
                                    class="form-control @error('pukul_meninggal') is-invalid @enderror"
                                    name="pukul_meninggal" value="{{ old('pukul_meninggal') }}">
                                @error('pukul_meninggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- pukul_dikebumikan -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label for="pukul_dikebumikan"><span class="text-danger"><sup>*</sup></span>Pukul
                                    Dikebumikan</label>
                                <input type="time"
                                    class="form-control  @error('pukul_dikebumikan') is-invalid @enderror"
                                    id="pukul_dikebumikan" name="pukul_dikebumikan"
                                    value="{{ old('pukul_dikebumikan') }}">
                                @error('pukul_dikebumikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="row">
                            <!-- keperluan -->
                            <div class="form-group col-12 mt-3">
                                <label><span class="text-danger"><sup>*</sup></span>Keperluan</label>
                                <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan">{{ old('keperluan') }}</textarea>
                                @error('keperluan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- ktp_path -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label><span class="text-danger"><sup>*</sup></span>Scan KTP yang membuat (PDF)</label>
                                <input class="form-control @error('ktp_path') is-invalid @enderror" type="file"
                                    name="ktp_path" id="ktp_path">
                                @error('ktp_path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- kk_path -->
                            <div class="form-group col-md-6 col-12 mt-3">
                                <label><span class="text-danger"><sup>*</sup></span>Scan KK yang meninggal
                                    (PDF)</label>
                                <input class="form-control @error('kk_path') is-invalid @enderror" type="file"
                                    name="kk_path" id="kk_path">
                                @error('kk_path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
