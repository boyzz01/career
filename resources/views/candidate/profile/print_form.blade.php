<html>
    <head>
         <base href="{{ url('/') }}"> 
       
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
      
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
      
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}"> --}}
      
    </head>

{{-- <script src="{{ asset('js/third-party.js') }}"></script>
<script src="{{  asset('js/pages.js') }}"></script> --}}


    <body class="overflow-x-hidden">

    <div class="card" id="formTemplate">
        <div class="card-body">
    
            <table>
                <h2 style="font-weight: bold;">Data Pribadi</h2>
                <tr>
                    <td>

                    </td>
                </tr>
            </table>
    
                <div class="mt-5">
                  
                   
    
                    <h2 style="font-weight: bold;">Data Pribadi</h2>
                    <hr />

                    <table id="" class="table table-bordered table-checkable">
    
                        
                        <tbody>
                            <tr>
                                <td> <label class="form-label">Nama lengkap (sesuai KTP)</label></td>
                                <td> <label class="form-label">Jenis Kelamin</label></td>
                            </tr>
                            <tr>
                                <td>{{ $user->datadiri->nama ?? '' }}</td>
                                <td>{{ Form::select('jk', ['Laki-Laki', 'Perempuan'], $user->datadiri->jk ?? '', ['id' => 'myselect', 'class' => 'form-select', 'placeholder' => 'Jenis Kelamin']) }}
                                </td>
                            </tr>
                            <tr>
                                <td> <label class="form-label">Tempat Lahir</label></td>
                                <td> <label class="form-label">Tanggal Lahir</label></td>
                            </tr>
                            <tr>
                                <td>{{ $user->datadiri->tempat_lahir ?? '' }}</td>
                                <td>{{ $user->datadiri->tanggal_lahir ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>

                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Kewarganegaraan</label>
                            <input class="form-control" type="text" value="{{ $user->datadiri->kewarganegaraan ?? '' }}"
                                name="kewarganegaraan">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Agama</label>
                            {{ Form::select('agama', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha'], $user->datadiri->agama ?? '', ['id' => 'agama', 'class' => 'form-select', 'placeholder' => 'Agama']) }}
    
                        </div>
                        <hr />
                        <h5 style="font-weight: bold;">Alamat domisili</h5>
                        <div class="row">
                            @php
                            $temp = explode('^', $user->datadiri->alamat_domisili ?? '');
                        @endphp
                            <table id="" class="table table-bordered table-checkable">
    
                        
                                <tbody>
                                    <tr>
                                        <td> <label class="form-label">Alamat</label></td>
                                        <td colspan="7"> <label class="form-label">{{ $temp[0] ?? '' }}</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">RT</label></td>
                                        <td>{{ $temp[1] ?? '' }}</td>
                                        <td><label class="form-label">RW</label></td>
                                        <td>{{ $temp[2] ?? '' }}</td>
                                        <td><label class="form-label">Kelurahan</label></td>
                                        <td>{{ $temp[3] ?? '' }}</td>
                                        <td><label class="form-label">Kecamatan</label></td>
                                        <td>{{ $temp[4] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Kota</label></td>
                                        <td colspan="3">{{ $temp[5] ?? '' }}</td>
                                        <td><label class="form-label">Kode Pos</label></td>
                                        <td colspan="3">{{ $temp[6] ?? '' }}</td>
                                      
                                    </tr>
                                   
                                </tbody>
                            </table>
                        
                         
                        </div>
                        <hr />
                        <h5 style="font-weight: bold;">Alamat KTP</h5>
                        <div class="row">
                            @php
                                $temp2 = explode('^', $user->datadiri->alamat_ktp ?? '');
                            @endphp
                             <table id="" class="table table-bordered table-checkable">
    
                        
                                <tbody>
                                    <tr>
                                        <td> <label class="form-label">Alamat</label></td>
                                        <td colspan="7"> <label class="form-label">{{ $temp2[0] ?? '' }}</label></td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">RT</label></td>
                                        <td>{{ $temp2[1] ?? '' }}</td>
                                        <td><label class="form-label">RW</label></td>
                                        <td>{{ $temp2[2] ?? '' }}</td>
                                        <td><label class="form-label">Kelurahan</label></td>
                                        <td>{{ $temp2[3] ?? '' }}</td>
                                        <td><label class="form-label">Kecamatan</label></td>
                                        <td>{{ $temp2[4] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Kota</label></td>
                                        <td colspan="3">{{ $temp2[5] ?? '' }}</td>
                                        <td><label class="form-label">Kode Pos</label></td>
                                        <td colspan="3">{{ $temp2[6] ?? '' }}</td>
                                      
                                    </tr>
                                   
                                </tbody>
                            </table>
                            {{-- <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" name="alamat_ktp" value="{{ $temp2[0] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-5">
                                <label class="form-label">RT</label>
                                <input class="form-control" type="text" name="rt_ktp"
                                    value="{{ $temp2[1] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-5">
                                <label class="form-label">RW</label>
                                <input class="form-control" type="text" name="rw_ktp"
                                    value="{{ $temp2[2] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kelurahan</label>
                                <input class="form-control" type="text" name="kelurahan_ktp"
                                    value="{{ $temp2[3] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kecamatan</label>
                                <input class="form-control" type="text" name="kecamatan_ktp"
                                    value="{{ $temp2[4] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kota</label>
                                <input class="form-control" type="text" name="kota_ktp"
                                    value="{{ $temp2[5] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kode Pos</label>
                                <input class="form-control" type="text" name="pos_ktp"
                                    value="{{ $temp2[6] ?? '' }}">
    
                            </div> --}}
                        </div>
                        <hr />
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">No. Telepon</label>
                            <input class="form-control" type="text" value="{{ $user->datadiri->hp ?? '' }}"
                                name="">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" value="{{ $user->datadiri->email ?? '' }}"
                                name="email">
                        </div>
    
                        <div class="col-xl-4 col-md-4 col-sm-12 mb-5">
                            <label class="form-label">KTP</label>
                            <input class="form-control" type="text" value="{{ $user->datadiri->ktp ?? '' }}"
                                name="ktp">
                        </div>
    
                        <div class="col-xl-4 col-md-4 col-sm-12 mb-5">
                            <label class="form-label">NPWP</label>
                            <input class="form-control" type="text" value="{{ $user->datadiri->npwp ?? '' }}"
                                name="npwp">
                        </div>
    
                        <div class="col-xl-4 col-md-4 col-sm-12 mb-5">
                            <label class="form-label">Status Perkawinan</label>
                            {{ Form::select('perkawinan', ['Lajang', 'Menikah', 'Bercerai'], $user->datadiri->perkawinan ?? '', ['id' => 'perkawinan', 'class' => 'form-select', 'placeholder' => 'Status Perkawinan']) }}
    
    
                        </div>
                        <br>
                        <hr style="margin-top: 20px" />
                        <h2 style="font-weight: bold;">Latar Belakang Pendidikan</h2>
                        <hr />
                        <h5>Pendidikan Formal</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th rowspan="2" style="vertical-align:middle;">Tingkat</th>
                                        <th rowspan="2" style="vertical-align:middle;">Jurusan</th>
                                        <th rowspan="2" style="vertical-align:middle;">Nama Sekolah</th>
                                        <th rowspan="2" style="vertical-align:middle;">Tempat/Kota</th>
                                        <th colspan="2" style="vertical-align:middle;">Tahun</th>
                                       
                                    </tr>
                                    <tr>
                                        <th>Masuk</th>
                                        <th>Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="tr1">
                                        <td>SLTA / High School</td>
                                        <td>{{ $user->tingkat1->jurusan ?? '' }}</td>
                                        <td>{{ $user->tingkat1->sekolah ?? '' }}</td>
                                        <td>{{ $user->tingkat1->kota ?? '' }}</td>
                                        <td>{{ $user->tingkat1->masuk ?? '' }}</td>
                                        <td>{{ $user->tingkat1->lulus ?? '' }}</td>
                                     
                                    </tr>
                                    <tr id="tr2">
                                        <td>AKADEMI / Academy
                                            (D1/D2/D3)
                                        </td>
                                        <td>{{ $user->tingkat2->jurusan ?? '' }}</td>
                                        <td>{{ $user->tingkat2->sekolah ?? '' }}</td>
                                        <td>{{ $user->tingkat2->kota ?? '' }}</td>
                                        <td>{{ $user->tingkat2->masuk ?? '' }}</td>
                                        <td>{{ $user->tingkat2->lulus ?? '' }}</td>
                                 
                                    </tr>
                                    <tr id="tr3">
                                        <td>UNIV. / University
                                            (S1)
                                        </td>
                                        <td>{{ $user->tingkat3->jurusan ?? '' }}</td>
                                        <td>{{ $user->tingkat3->sekolah ?? '' }}</td>
                                        <td>{{ $user->tingkat3->kota ?? '' }}</td>
                                        <td>{{ $user->tingkat3->masuk ?? '' }}</td>
                                        <td>{{ $user->tingkat3->lulus ?? '' }}</td>
                                   
                                    </tr>
                                    <tr id="tr4">
                                        <td>UNIV. / University
                                            (S2)
                                        </td>
                                        <td>{{ $user->tingkat4->jurusan ?? '' }}</td>
                                        <td>{{ $user->tingkat4->sekolah ?? '' }}</td>
                                        <td>{{ $user->tingkat4->kota ?? '' }}</td>
                                        <td>{{ $user->tingkat4->masuk ?? '' }}</td>
                                        <td>{{ $user->tingkat4->lulus ?? '' }}</td>
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5>Pendidikan Non-Formal</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th rowspan="2" style="vertical-align:middle;">No</th>
                                        <th rowspan="2" style="vertical-align:middle;">Nama Kursus/Pelatihan </th>
                                        <th rowspan="2" style="vertical-align:middle;">Penyelenggara</th>
                                        <th rowspan="2" style="vertical-align:middle;">Nama Sekolah</th>
                                        <th colspan="2" style="vertical-align:middle;">Lama Kursus</th>
                                       
                                    </tr>
                                    <tr>
                                        <th>Mulai</th>
                                        <th>Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($user->pendidikan as $p)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->penyelenggara }}</td>
                                            <td>{{ $p->sekolah }}</td>
                                            <td>{{ $p->mulai }}</td>
                                            <td>{{ $p->akhir }}</td>
                                           
    
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
    
                                </tbody>
    
                            </table>
                      
                        </div>
                        <hr style="margin-top: 20px" />
                        <h2 style="font-weight: bold;">Riwayat Pekerjaan</h2>
                        <hr />
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th rowspan="2" style="vertical-align:middle;">No</th>
                                        <th rowspan="2" style="vertical-align:middle;">Nama Perusahaan </th>
                                        <th rowspan="2" style="vertical-align:middle;">Industri</th>
                                        <th colspan="1" style="vertical-align:middle;">Masuk</th>
                                        <th colspan="1" style="vertical-align:middle;">Keluar</th>
                                        <th rowspan="2" style="vertical-align:middle;">Gaji Terakhir</th>
                                        <th rowspan="2" style="vertical-align:middle;">Jabatan Terakhir</th>
                                        <th rowspan="2" style="vertical-align:middle;">Alasan Keluar</th>
                                     
                                    </tr>
                                    <tr>
                                        <th>Bln / Thn</th>
                                        <th>Bln / Thn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach ($user->pekerjaan as $p)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->industri }}</td>
                                        <td>{{ $p->masuk }}</td>
                                        <td>{{ $p->keluar }}</td>
                                        <td>{{ $p->gaji }}</td>
                                        <td>{{ $p->jabatan }}</td>
                                        <td>{{ $p->alasan }}</td>
                                     
                            
                                        
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                        </div>
    
    
                        <div class="form-group">
                            <label class="form-label">URAIKAN TUGAS & TANGGUNG JAWAB PADA JABATAN TERAKHIR</label>
                            <textarea class="form-control" style="height: 200px" name="tugas">{{ $user->datadiri->tugas ?? ''}}</textarea>
                        </div>
                        <br>
                        <hr style="margin-top: 20px" />
                        <h2 style="font-weight: bold;">Data Keluarga</h2>
                        <hr />
                        <h5>1. Istri / Suami
    
    
                        </h5>
    
                        <div class="col-xl-12 col-md-12 col-sm-6 mb-5">
                            {{ Form::label('Nama lengkap', '', ['class' => 'form-label']) }}
                            <input class="form-control" type="text" name="namaK" value="{{ $user->datadiri->namaK ?? '' }}">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempatK" value="{{ $user->datadiri->tempatK ?? '' }}">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tanggalK" value="{{ $user->datadiri->tanggalK ?? '' }}"  >
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Agama</label>
                            {{ Form::select('agamaK', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha'], $user->datadiri->agamaK ?? '', ['id' => 'agamaK', 'class' => 'form-select', 'placeholder' => 'Agama']) }}
    
                        </div>
    
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Pendidikan</label>
                            <input class="form-control" type="text" name="pendidikanK" value="{{ $user->datadiri->pendidikanK ?? '' }}" >
                        </div>
    
    
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Pekerjaan</label>
                            <input class="form-control" type="text" name="pekerjaanK" value="{{ $user->datadiri->pekerjaanK ?? '' }}" >
                        </div>
    
    
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatanK" value="{{ $user->datadiri->jabatanK ?? '' }}">
                        </div>
    
                        <h5>2. Anak</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>L/P</th>
                                        <th>Tgl Lahir</th>
                                        <th>Kondisi Kesehatan</th>
                                     
                                    </tr>
    
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach ($user->anak as $p)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->jk }}</td>
                                        <td>{{ $p->lahir }}</td>
                                        <td>{{ $p->kesehatan }}</td>
                                      
                                    
                                     
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                         
                        </div>
    
                        <h5>3. Susunan keluarga sekandung (termasuk diri sendiri)</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Nama Lengkap</th>
                                        <th>L/P</th>
                                        <th>Usia</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan (Jabatan & Perusahaan)</th>
                                       
                                    </tr>
    
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach ($user->keluarga as $p)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        @if ($p->status==0)
                                        <td>Ayah</td>
                                        @elseif ($p->status==1)
                                        <td>Ibu</td>
                                        @else
                                        <td>Saudara Kandung</td>
                                        @endif
                                        <td>{{ $p->nama }}</td>
                            
                                        <td>{{ $p->jk }}</td>
                                        <td>{{ $p->usia }}</td>
                                        <td>{{ $p->pendidikan }}</td>
                                        <td>{{ $p->pekerjaan }}</td>
                            
                            
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                     
                        </div>
    
                        <hr style="margin-top: 20px" />
                        <h2 style="font-weight: bold;">Keterangan Lainnya</h2>
                        <hr />
                        <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                            <label class="form-label">1.	Apakah anda pernah dirawat di rumah sakit dalam 1 (satu) tahun terakhir?</label>
                            {{ Form::select('sakit', ['Tidak Pernah', 'Pernah'], $user->datadiri->sakit ?? '', ['id' => 'sakit', 'class' => 'form-select', 'placeholder' => 'Apakah anda pernah dirawat di rumah sakit dalam 1 (satu) tahun terakhir']) }}
                        </div>
                        <label class="form-label">Jika Pernah</label>
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Tahun</label>
                            <input class="form-control" type="text" name="tahun_sakit" value="{{ $user->datadiri->tahun_sakit ?? '' }}">
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Lama Sakit</label>
                            <input class="form-control" type="text" name="lama_sakit" value="{{ $user->datadiri->lama_sakit ?? '' }}">
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Penyakit</label>
                            <input class="form-control" type="text" name="penyakit" value="{{ $user->datadiri->penyakit ?? '' }}">
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-12 mb-5">
                            <label class="form-label">Dirawat di</label>
                            <input class="form-control" type="text" name="rawat" value="{{ $user->datadiri->rawat ?? '' }}">
                        </div>
                        <h5>2. Referensi</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. Telp & No. HP</th>
                                        <th>Pekerjaan</th>
                                        <th>Lama Kenal</th>
                                        <th>Hubungan</th>
                                       
                                    </tr>
    
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach ($user->referensi as $p)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->hp }}</td>
                                        <td>{{ $p->pekerjaan }}</td>
                                        <td>{{ $p->kenal }}</td>
                                        <td>{{ $p->hubungan }}</td>
                                        
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                      
                        </div>
    
                        <h5>3. Keluarga yang dapat di hubungi dalam keadaan darurat</h5>
                        <div class="form-group">
                            <table id="variabel" class="table table-bordered table-checkable">
    
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. Telp & No. HP</th>
                                        <th>Hubungan</th>
                                  
                                    </tr>
    
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                @endphp
                                    @foreach ($user->darurat as $p)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->hp }}</td>
                                        <td>{{ $p->hubungan }}</td>
                                      
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    

                            <div class="form-group">
                                <table id="variabel" class="table table-bordered table-checkable">
        
                                    
                             
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th  rowspan="2">No</th>
                                            <th  rowspan="2">Pertanyaan</th>
                                          
                                            <th colspan="3">Jawaban</th>
                                           
                                        </tr>
                                        <tr>
                                            <th>Ya</th>
                                            <th>Tidak</th>
                                            <th>Penjelasan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Apakah Anda mempunyai pekerjaan sampingan?</td>
                                            @if ($user->datadiri->sampingan==0)
                                            <td>Ya</td>
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td>Tidak</td>
                                            @endif
                                           
                                            <td>{{ $user->datadiri->penjelasan_s ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <td>2.</td>
                                            <td>Dimana dan sebagai apa?</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $user->datadiri->dimana_s ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <td>3.</td>
                                            <td>Bersediakan Anda berTUGAS ke luar kota?</td>
                                            @if ($user->datadiri->luar_kota==0)
                                            <td>Ya</td>
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td>Tidak</td>
                                            @endif
                                           
                                            <td>{{ $user->datadiri->penjelasan_tugas ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <td>4.</td>
                                            <td>Bersediakan Anda berTEMPATkan di luar kota?</td>
                                            @if ($user->datadiri->tempat_luar==0)
                                            <td>Ya</td>
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td>Tidak</td>
                                            @endif
                                           
                                            <td>{{ $user->datadiri->penjelasan_tempat ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <td>5.</td>
                                            <td>Sebutkan nama kota / daerahnya?</td>
                                         
                                            <td></td>
                                            <td></td>

                                            <td>{{ $user->datadiri->nama_daerah ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <td>1.</td>
                                            <td>Berapa penghasilan dan fasilitas yang Anda peroleh saat ini?</td>
                                            <td colspan="3">{{ $user->datadiri->p_sekarang ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Berapa penghasilan yang Anda harapkan?</td>
                                            <td colspan="3">{{ $user->datadiri->p_harapkan ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Bila diterima, kapankah Anda dapat mulai bekerja?</td>
                                            <td colspan="3">{{ $user->datadiri->mulai_kerja ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Adakah kenalan / referensi Anda di Perusahaan kami?</td>
                                            <td colspan="3">{{ $user->datadiri->referensi ?? '' }}</td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
        
                         
                            </div>
                       
    
                
    
                        
                        <hr>
                   
                            <br>
                            <br>
                        </div>
    
                        <!-- Submit Field -->
                      
                  
                </div>
           
        </div>
    </div>
    </body>

  


    </html>
