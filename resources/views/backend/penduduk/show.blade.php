       <ul class="nav nav-tabs" id="myTab" role="tablist">
           <li class="nav-item">
               <a class="nav-link active" id="data-diri-tab" data-toggle="tab" href="#data-diri" role="tab"
                   aria-controls="home" aria-selected="true">Data Diri</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="data-orang-tua-tab" data-toggle="tab" href="#data-orang-tua" role="tab"
                   aria-controls="profile" aria-selected="false">Data Orang Tua</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab"
                   aria-controls="contact" aria-selected="false">Status</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="pekerjaan-tab" data-toggle="tab" href="#pekerjaan" role="tab"
                   aria-controls="contact" aria-selected="false">Data Pendidikan & Pekerjaan</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="identitas-lain-tab" data-toggle="tab" href="#lainnya" role="tab"
                   aria-controls="contact" aria-selected="false">Lainnya</a>
           </li>
       </ul>

       <div class="tab-content" id="myTabContent">

           <!-- data diri -->
           <div class="tab-pane fade show active" id="data-diri" role="tabpanel" aria-labelledby="data-diri-tab">

               <table cellpadding="10">
                   <tr>
                       <td>No KK</td>
                       <td>: {{ $model->no_kk }}</td>
                   </tr>

                   <tr>
                       <td>NIK</td>
                       <td>: {{ $model->nik }}</td>
                   </tr>

                   <tr>
                       <td>Nama</td>
                       <td>: {{ $model->nama }}</td>
                   </tr>

                   <tr>
                       <td>Jenis Kelamin</td>
                       <td>: {{ $model->jenis_kelamin }}</td>
                   </tr>

                   <tr>
                       <td>Agama</td>
                       <td>: {{ $model->agama->nama }}</td>
                   </tr>

                   <tr>
                       <td>Alamat</td>
                       <td>: {{ $model->alamat }}</td>
                   </tr>

                   <tr>
                       <td>Dusun</td>
                       <td>: {{ $model->dusun->nama }}</td>
                   </tr>

                   <tr>
                       <td>RT</td>
                       <td>: {{ $model->dusun->rt }}</td>
                   </tr>

                   <tr>
                       <td>RW</td>
                       <td>: {{ $model->dusun->rw }}</td>
                   </tr>

                   <tr>
                       <td>Tempat Lahir</td>
                       <td>: {{ $model->tempat_lahir }}</td>
                   </tr>

                   <tr>
                       <td>Tanggal Lahir</td>
                       <td>: {{ $model->tanggal_lahir?->format('d M Y') ?? '-' }}</td>
                   </tr>

                   <tr>
                       <td>Golongan Darah</td>
                       <td>: {{ $model->golongan_darah }}</td>
                   </tr>

                   <tr>
                       <td>Kewarganegaraan</td>
                       <td>: {{ $model->kewarganegaraan }}</td>
                   </tr>

                   <tr>
                       <td>No HP</td>
                       <td>: {{ $model->no_hp }}</td>
                   </tr>

                   <tr>
                       <td>Status</td>
                       <td>:
                           @if ($model->status == 'ada')
                               <span class="badge badge-primary">{{ $model->status }}</span>
                           @endif
                           @if ($model->status == 'meninggal')
                               <span class="badge badge-danger">{{ $model->status }}</span>
                           @endif
                           @if ($model->status == 'pindah')
                               <span class="badge badge-warning">{{ $model->status }}</span>
                           @endif
                       </td>
                   </tr>
               </table>
           </div>

           <!-- data orang tua -->
           <div class="tab-pane fade" id="data-orang-tua" role="tabpanel" aria-labelledby="data-orang-tua-tab">
               <table cellpadding="10">
                   <tr>
                       <td>Nama Ayah</td>
                       <td>: {{ $model->nama_ayah }}</td>
                   </tr>

                   <tr>
                       <td>Nama Ibu</td>
                       <td>: {{ $model->nama_ibu }}</td>
                   </tr>
               </table>
           </div>

           <!-- status -->
           <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">

               <table cellpadding="10">
                   <tr>
                       <td>Status Perkawinan</td>
                       <td>: {{ $model->perkawinan->nama }}</td>
                   </tr>

                   <tr>
                       <td>Hubungan Dalam Keluarga</td>
                       <td>: {{ $model->hubungan->nama }}</td>
                   </tr>
               </table>

           </div>

           <!-- data pendidikan & pekerjaan -->
           <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
               <table cellpadding="10">
                   <tr>
                       <td>Pendidikan</td>
                       <td>: {{ $model->pendidikan->nama }}</td>
                   </tr>

                   <tr>
                       <td>Pekerjaan</td>
                       <td>: {{ $model->pekerjaan->nama }}</td>
                   </tr>

                   <tr>
                       <td>Penghasilan</td>
                       <td>: {{ $model->penghasilan }}</td>
                   </tr>
               </table>
           </div>

           <!-- Lainnya -->
           <div class="tab-pane fade" id="lainnya" role="tabpanel" aria-labelledby="lainnya-tab">
               <table cellpadding="10">
                   <tr>
                       <td>KTP</td>
                       <td>: @if ($model->ktp_path)
                               <a href="{{ asset('storage/' . $model->ktp_path) }}" target="_blank">KTP
                                   {{ $model->nama }}</a>
                           @else
                               -
                           @endif
                       </td>
                   </tr>
               </table>
           </div>

       </div>
