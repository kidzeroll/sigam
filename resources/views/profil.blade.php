<x-backend-layout>
    <x-slot name="title">Profil</x-slot>

    <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-4">

            <div class="card author-box card-primary">

                <div class="card-body">
                    <div class="author-box-center">

                        @if (auth()->user()->photo_path)
                            <img alt="image" src="{{ asset('storage/' . auth()->user()->photo_path) }}"
                                class="rounded-circle author-box-picture">
                        @endif
                        @if (!auth()->user()->photo_path)
                            <img alt="image" src="{{ asset('backend/assets/img/users/user-1.png') }}"
                                class="rounded-circle author-box-picture">
                        @endif

                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <span>{{ $user->name }}</span>
                        </div>
                        <div class="author-box-job">
                            @if ($user->role == 'admin')
                                <span class="badge badge-primary">{{ $user->role }}</span>
                            @endif
                            @if ($user->role == 'petugas')
                                <span class="badge badge-warning">{{ $user->role }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="author-box-description">
                            <p>
                                {!! $user->about !!}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>


        <div class="col-12 col-md-12 col-lg-8">
            <div class="card card-primary">

                <div class="padding-20">
                    <ul class="nav nav-tabs" id="tablist" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#settings" role="tab"
                                aria-selected="false">Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                                aria-selected="false">Password</a>
                        </li>
                    </ul>

                    <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="tab-content tab-bordered" id="myTab3Content">

                            <!-- about -->
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                aria-labelledby="about-tab">

                                <table cellpadding="10">

                                    <tr>
                                        <td>Nama</td>
                                        <td>: {{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>: {{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <td>Role</td>
                                        <td>:
                                            <span
                                                class="badge badge-{{ $user->role == 'admin' ? 'primary' : 'warning' }}">{{ $user->role }}
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: {{ $user->gender }}</td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:
                                            @if ($user->birth_date)
                                                {{ $user->birth_date->format('d-m-Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Alamat</td>
                                        <td>: {{ $user->address }}</td>
                                    </tr>

                                    <tr>
                                        <td>No HP</td>
                                        <td>: {{ $user->phone }}</td>
                                    </tr>

                                </table>

                            </div>


                            <!-- setting -->
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="setting-tab">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <!-- name -->
                                        <div class="form-group col-md-6 col-12">
                                            <label for="name">Nama</label>
                                            <input type="text"
                                                class="form-control  @error('name') is-invalid @enderror" id="name"
                                                name="name" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- email -->
                                        <div class="form-group col-md-6 col-12">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control  @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <!-- gender -->
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control select2" id="gender" name="gender"
                                                style="width: 100%">
                                                <option disabled selected>Pilih</option>
                                                <option value="L"
                                                    {{ old('gender', $user->gender) == 'L' ? 'selected' : '' }}>
                                                    Laki-Laki</option>
                                                <option value="P"
                                                    {{ old('gender', $user->gender) == 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- phone -->
                                        <div class="form-group col-md-6 col-12">
                                            <label for="phone">No HP</label>
                                            <input type="text"
                                                class="form-control  @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">

                                        <!-- birth date -->
                                        <div class="form-group col-12">
                                            <label for="birth_date">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control  @error('birth_date') is-invalid @enderror"
                                                id="birth_date" name="birth_date"
                                                value="{{ old('birth_date', $user->birth_date?->format('Y-m-d') ?? '') }}">
                                            @error('birth_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- address -->
                                        <div class="form-group col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address">{{ old('address', $user->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- about -->
                                        <div class="form-group col-12">
                                            <label>About Me</label>
                                            <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about">{{ old('about', $user->about) }}</textarea>
                                            @error('about')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- photo_path -->
                                        <div class="form-group col-12">
                                            <label>Foto</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo_path"
                                                    name="photo_path">
                                                <label class="custom-file-label" for="photo_path"
                                                    id="label-photo_path">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-block btn-primary">Update</button>

                                </div>
                            </div>

                            <!-- password -->
                            <div class="tab-pane fade show" id="password" role="tabpanel"
                                aria-labelledby="password-tab">

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="old_password">Password Lama</label>
                                        <input id="old_password" type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" value="{{ old('old_password') }}">
                                        @error('old_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="new_password">Password Baru</label>
                                        <input id="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" value="{{ old('new_password') }}">
                                        @error('new_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                        <input id="new_password_confirmation" type="password"
                                            class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                            name="new_password_confirmation"
                                            value="{{ old('new_password_confirmation') }}">
                                        @error('new_password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Ganti Password</button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript">
            document.querySelector("#photo_path").onchange = function() {
                document.querySelector("#label-photo_path").textContent = this.files[0].name;
            }
        </script>
    @endpush


</x-backend-layout>
