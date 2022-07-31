<x-frontend-layout>
    <x-slot name="title">Pengaduan</x-slot>

    <section class="pengaduan" id="pengaduan" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="row">
                            <!-- nama-->
                            <div class="form-group col-md-6 col-12">
                                <label for="nama"><span class="text-danger"><sup>*</sup></span>Nama Anda</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--judul-->
                            <div class="form-group col-md-6 col-12">
                                <label for="judul"><span class="text-danger"><sup>*</sup></span>Judul
                                    Pengaduan</label>
                                <input type="text" class="form-control  @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <!-- isi pengaduan -->
                            <div class="form-group col-12 mt-3">
                                <label><span class="text-danger"><sup>*</sup></span>Isi Pengaduan</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- no wa -->
                            <div class="form-group col-12 mt-3">
                                <label for="no_hp"><span class="text-danger"><sup>*</sup></span>No Whatsapp</label>
                                <input type="text" class="form-control  @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                <span><small class="text-secondary">Mohon masukkan nomor Whatsapp yang benar karena
                                        tanggapan akan dikirim ke Whatsapp anda</small></span>
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- lampiran_path -->
                            <div class="form-group col-12 mt-3">
                                <label for="lampiran_path">Lampiran</label>
                                <input type="file" class="form-control  @error('lampiran_path') is-invalid @enderror"
                                    id="lampiran_path" name="lampiran_path" value="{{ old('lampiran_path') }}"
                                    placeholder="Status pengaduan akan di kirim lewat whatsapp">
                                @error('lampiran_path')
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
