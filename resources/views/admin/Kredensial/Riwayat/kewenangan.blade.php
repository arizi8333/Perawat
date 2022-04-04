@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('navbar')
    @include('admin._navbar')
@endsection

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Kredensial</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Kredensial</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="col-3">
                                <div>No Surat</div>
                                <div>Jenis Kredensial</div>
                                <div>Tanggal Terbit Surat</div>
                                <div>Tanggal Habis Berlaku</div>
                                <div>Tempat</div>
                            </div>
                            <div class="col-3">
                                <div>: {{$data[0]->request_credentials->id_kredensial}}</div>
                                <div>: {{$data[0]->request_credentials->jenis_kredensial->nama_jenis}}</div>
                                <div>: {{date('d F Y', strtotime($data[0]->request_credentials->tgl_terbit_surat))}}</div>
                                <div>: {{date('d F Y', strtotime($data[0]->request_credentials->tgl_habis_berlaku))}}</div>
                                <div>: {{$data[0]->request_credentials->tempat_dinas->lokasi}}</div>
                            </div>
                            <div class="col-3">
                                <div>Nama Perawat</div>
                                <div>NIP</div>
                                <div>Pangkat</div>
                                <div>Golongan</div>
                                <div>Tanggal Pengajuan</div>
                            </div>
                            <div class="col-3">
                                <div>: {{$data[0]->request_credentials->user->nama}}</div>
                                <div>: {{$data[0]->request_credentials->user->nip}}</div>
                                <div>: {{$data[0]->request_credentials->user->pangkat}}</div>
                                <div>: {{$data[0]->request_credentials->user->golongan}}</div>
                                <div>: {{date('d F Y', strtotime($data[0]->request_credentials->tgl_request_kredensial))}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Unit Kompetensi Yang di Ajukan</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kompetensi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:13px;">
                                    <?php 
                                        $no = 1 
                                    ?>
                                        @foreach($data as $d)
                                        <tr>
                                            <td class="text-center">{{$no++}}.</td>
                                            <td>{{$d->kewenangan_klinis->rincian_kewenangan}}</td>
                                            <td class="text-center">{{$d->kewenangan_klinis->keterangan}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection

@section('modal')

@endsection

@section('js')
<script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
@endsection