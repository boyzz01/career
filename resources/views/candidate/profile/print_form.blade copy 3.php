<html>
    <head>
        <base href="../">
        <title>@yield('title') | {{ getAppName() }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
        @if(getLoggedInUser()->theme_mode)
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom-dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.dark.css') }}">
        @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
        @endif
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
        @livewireStyles
        @routes
        @livewireScripts
    </head>
    
    <body class="overflow-x-hidden">

    <div class="card">
        <div class="card-body">
    
    
    
                <div class="mt-5">
                    <div class="alert alert-danger d-none" id="validationErrors">
                        <i class='fa-solid fa-face-frown me-4'></i>
                    </div>
    
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
    
                    <h2 style="font-weight: bold;">Data Pribadi</h2>
                    <hr />
                    <div class="row mb-5">
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Nama lengkap (sesuai KTP)</label>
                            <input class="form-control" name="nama" type="text"
                                value="{{ $user->datadiri->nama ?? '' }}" placeholder="Nama lengkap (sesuai KTP)">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Jenis Kelamin</label>
                            {{ Form::select('jk', ['Laki-Laki', 'Perempuan'], $user->datadiri->jk ?? '', ['id' => 'myselect', 'class' => 'form-select', 'placeholder' => 'Jenis Kelamin']) }}
    
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Tempat Lahir</label>
                            <input class="form-control" type="text" value="{{ $user->datadiri->tempat_lahir ?? '' }}"
                                placeholder="Tempat Lahir" name="tempat_lahir">
                        </div>
    
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                            <label class="form-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" value="{{ $user->datadiri->tanggal_lahir ?? '' }}"
                                placeholder="Tanggal Lahir" name="tanggal_lahir">
                        </div>
    
    
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
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" name="alamat_dom" value="{{ $temp[0] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-5">
                                <label class="form-label">RT</label>
                                <input class="form-control" type="text" name="rt_dom" value="{{ $temp[1] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-5">
                                <label class="form-label">RW</label>
                                <input class="form-control" type="text" name="rw_dom" value="{{ $temp[2] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kelurahan</label>
                                <input class="form-control" type="text" name="kelurahan_dom"
                                    value="{{ $temp[3] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kecamatan</label>
                                <input class="form-control" type="text" name="kecamatan_dom"
                                    value="{{ $temp[4] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kota</label>
                                <input class="form-control" type="text" name="kota_dom" value="{{ $temp[5] ?? '' }}">
    
                            </div>
    
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
                                <label class="form-label">Kode Pos</label>
                                <input class="form-control" type="text" name="pos_dom" value="{{ $temp[6] ?? '' }}">
    
                            </div>
                        </div>
                        <hr />
                        <h5 style="font-weight: bold;">Alamat KTP</h5>
                        <div class="row">
                            @php
                                $temp2 = explode('^', $user->datadiri->alamat_ktp ?? '');
                            @endphp
                            <div class="col-xl-6 col-md-6 col-sm-12 mb-5">
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
    
                            </div>
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
                                        <th rowspan="2" style="vertical-align:middle;">Aksi</th>
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
                                        <td><a class="btn btn-info btn-sm aksi edit_pendidikan" id="1"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></td>
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
                                        <td><a class="btn btn-info btn-sm aksi edit_pendidikan" id="2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></td>
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
                                        <td><a class="btn btn-info btn-sm aksi edit_pendidikan" id="3"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></td>
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
                                        <td><a class="btn btn-info btn-sm aksi edit_pendidikan" id="4"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></td>
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
                                        <th rowspan="2" style="vertical-align:middle;">Aksi</th>
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
                                            <td>
    
                                                <a class="delete-pendidikan btn px-2 text-danger fs-3 pe-0"
                                                    title="{{ __('messages.common.delete') }}"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                        class="fas fa-trash"></i></a>
    
                                            </td>
    
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
    
                                </tbody>
    
                            </table>
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addExperienceModal" data-bs-toggle="modal"
                                    data-bs-target="#addPendidikanNonModal">Tambah Pendidikan
                                </a>
                            </div>
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
                                        <th rowspan="2" style="vertical-align:middle;">Aksi</th>
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
                                     
                            
                                        <td>
    
                                            <a class=" btn px-2 text-danger fs-3 pe-0"
                                                title="{{ __('messages.common.delete') }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                    class="fas fa-trash"></i></a>
    
                                        </td>
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addPekerjaanModal" data-bs-toggle="modal"
                                    data-bs-target="#addPekerjaanModal">Tambah Pekerjaan
                                </a>
                            </div>
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
                                        <th>Aksi</th>
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
                                      
                                    
                                        <td>
    
                                            <a class=" btn px-2 text-danger fs-3 pe-0"
                                                title="{{ __('messages.common.delete') }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                    class="fas fa-trash"></i></a>
    
                                        </td>
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addPekerjaanModal" data-bs-toggle="modal"
                                    data-bs-target="#addAnak">Tambah Data Anak
                                </a>
                            </div>
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
                                        <th>Aksi</th>
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
                            
                            
                                        <td>
    
                                            <a class=" btn px-2 text-danger fs-3 pe-0"
                                                title="{{ __('messages.common.delete') }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                    class="fas fa-trash"></i></a>
    
                                        </td>
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addPekerjaanModal" data-bs-toggle="modal"
                                    data-bs-target="#addKeluarga">Tambah Data Keluarga
                                </a>
                            </div>
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
                                        <th>Aksi</th>
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
                                        <td>
    
                                            <a class=" btn px-2 text-danger fs-3 pe-0"
                                                title="{{ __('messages.common.delete') }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                    class="fas fa-trash"></i></a>
    
                                        </td>
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addExperienceModal" data-bs-toggle="modal"
                                    data-bs-target="#addReferensi">Tambah Referensi
                                </a>
                            </div>
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
                                        <th>Aksi</th>
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
                                        <td>
    
                                            <a class=" btn px-2 text-danger fs-3 pe-0"
                                                title="{{ __('messages.common.delete') }}"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                data-id="{{ $p->id }}" data-bs-toggle="tooltip"><i
                                                    class="fas fa-trash"></i></a>
    
                                        </td>
    
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                                  
                                </tbody>
                            </table>
    
                            <div class="text-end mt-4 mt-md-0">
                                <a class="btn btn-primary form-btn addExperienceModal" data-bs-toggle="modal"
                                    data-bs-target="#addDarurat">Tambah Data
                                </a>
                            </div>
    
                            <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 mb-5">
                                <label class="form-label">Apakah Anda mempunyai pekerjaan sampingan?</label>
                                {{ Form::select('sampingan', ['Ya', 'Tidak'], $user->datadiri->sampingan ?? '', ['id' => 'sampingan', 'class' => 'form-select', 'placeholder' => 'Apakah Anda mempunyai pekerjaan sampingan?']) }}
                            </div>
                      
                            <div class="col-xl-6 col-md-3 col-sm-6 mb-5">
                                <label class="form-label">Penjelasan</label>
                                <input class="form-control" type="text" name="penjelasan_s" value="{{ $user->datadiri->penjelasan_s ?? '' }}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">Jika Ya</label>   
                            <div class="col-xl-6 col-md-6 col-sm-6 mb-5">
                                <label class="form-label">Dimana dan sebagai apa?</label>
                                <input class="form-control" type="text" name="dimana_s" value="{{ $user->datadiri->dimana_s ?? '' }}">
                              </div>
    
                              <div class="col-xl-6 col-md-3 col-sm-6 mb-5">
                                <label class="form-label">Penjelasan</label>
                                <input class="form-control" type="text" name="penjelasan_dimana" value="{{ $user->datadiri->penjelasan_dimana ?? '' }}">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 mb-5">
                                <label class="form-label">Bersediakan Anda berTUGAS ke luar kota?</label>
                                {{ Form::select('luar_kota', ['Ya', 'Tidak'], $user->datadiri->luar_kota ?? '', ['id' => 'luar_kota', 'class' => 'form-select', 'placeholder' => 'Bersediakan Anda berTUGAS ke luar kota']) }}
                            </div>
                      
                            <div class="col-xl-6 col-md-3 col-sm-6 mb-5">
                                <label class="form-label">Penjelasan</label>
                                <input class="form-control" type="text" name="penjelasan_tugas" value="{{ $user->datadiri->penjelasan_tugas ?? '' }}">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 mb-5">
                                <label class="form-label">Bersediakan Anda berTEMPATkan di luar kota?</label>
                                {{ Form::select('tempat_luar', ['Ya', 'Tidak'], $user->datadiri->tempat_luar ?? '', ['id' => 'tempat_luar', 'class' => 'form-select', 'placeholder' => 'Bersediakan Anda berTEMPATkan di luar kota?']) }}
                            </div>
                      
                            <div class="col-xl-6 col-md-3 col-sm-6 mb-5">
                                <label class="form-label">Penjelasan</label>
                                <input class="form-control" type="text" name="penjelasan_tempat" value="{{ $user->datadiri->penjelasan_tempat ?? '' }}">
                            </div>
                            <label class="form-label">Jika Ya</label>   
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                                <label class="form-label">Sebutkan nama kota / daerahnya?</label>
                                <input class="form-control" type="text" name="nama_daerah" value="{{ $user->datadiri->nama_daerah ?? '' }}">
                              </div>
    
    
                            </div>
                        </div>
    
                        
                        <hr>
                        <div class="row">
                          
                             
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                                <label class="form-label">Berapa penghasilan dan fasilitas yang Anda peroleh saat ini? </label>
                                <input class="form-control" type="text" name="p_sekarang" value="{{ $user->datadiri->p_sekarang ?? '' }}">
                              </div>
    
                              <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                                <label class="form-label">Berapa penghasilan yang Anda harapkan?</label>
                                <input class="form-control" type="text" name="p_harapkan" value="{{ $user->datadiri->p_harapkan ?? '' }}">
                              </div>
    
                              <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                                <label class="form-label">Bila diterima, kapankah Anda dapat mulai bekerja? </label>
                                <input class="form-control" type="text" name="mulai_kerja" value="{{ $user->datadiri->mulai_kerja ?? '' }}">
                              </div>
    
                              <div class="col-xl-12 col-md-12 col-sm-12 mb-5">
                                <label class="form-label">Adakah kenalan / referensi Anda di Perusahaan kami?</label>
                                <input class="form-control" type="text" name="referensi" value="{{ $user->datadiri->referensi ?? '' }}">
                              </div>
    
    
                            </div>
                        </div>
                            <br>
                            <br>
                        </div>
    
                        <!-- Submit Field -->
                        <div class="d-flex justify-content-end">
                            <button type="Submit" name="Submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
    </body>

    </html>
