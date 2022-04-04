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
            <h1 class="h3 mb-0 text-gray-800">Detail Riwayat Kredensial Perawat</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Perawat</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="col-3">
                                <div>Nama</div>
                                <div>NIP</div>
                                <div>Jabatan</div>
                                <div>Golongan</div>
                                <div>Pangkat</div>
                                <div>Tempat Lahir</div>
                                <div>Tanggal Lahir</div>
                                <div>Mulai Dinas</div>
                                <div>Email</div>
                            </div>
                            <div class="col-9">
                                <div>: {{$user->nama}}</div>
                                <div>: {{$user->nip}}</div>
                                <div>: {{$user->perawat_klinik->jabatan}}</div>
                                <div>: {{$user->golongan}}</div>
                                <div>: {{$user->pangkat}}</div>
                                <div>: {{$user->tempat_lahir}}</div>
                                <div>: {{date('d F Y', strtotime($user->tanggal_lahir))}}</div>
                                <div>: {{$user->mulai_dinas}}</div>
                                <div>: {{$user->email}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Kredensial</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Surat</th>
                                            <th>Jenis</th>
                                            <th>Tempat</th>
                                            <th>Tanggal</th>
                                            <th>SPK</th>
                                            <th>RKK</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:13px;">

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
<script>
    $(document).ready( function () {
        var table = $('#table').DataTable( {
            language: {
                "emptyTable": "Tidak Ada Data Tersimpan"
            },
            ajax: "{{ url('/admin/Kredensial-riwayat/detail/data/') }}/{{$user->nip}}",
                "columns": [
                    {
                        "data": "id_kredensial",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "id_kredensial"},
                    { "data": "jenis_kredensial.nama_jenis"},
                    { "data": "tempat_dinas.lokasi"},
                    { "data": "tgl_terbit_surat"},
                    {
                        data: 'id_kredensial',
                        sClass: 'text-center',
                        render: function(data) {
                            data_replace = data.replace(/\//g, '_');
                            return '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="spk" class="text-primary berkas-action" title="Detail Riwayat"><i class="fa fa fa-envelope"></i></a>';
                        },
                    },
                    {
                        data: 'id_kredensial',
                        sClass: 'text-center',
                        render: function(data) {
                            data_replace = data.replace(/\//g, '_');
                            return '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="rkk" class="text-primary berkas-action" title="Detail Riwayat"><i class="fa fa fa-envelope"></i></a>';
                        },
                    },
                    {
                        data: 'id_kredensial',
                        sClass: 'text-center',
                        render: function(data) {
                            data_replace = data.replace(/\//g, '_');
                            return '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="kewenangan" class="text-primary berkas-action" title="Detail Riwayat"><i class="fa fa-ellipsis-h"></i></a>';
                        },
                    },
                ],
            });

    setInterval( function () {
        table.ajax.reload( null, false ); // user paging is not reset on reload
    }, 5000 );

    $(document).on('click', '#kewenangan', function() {
        var id = $(this).data('id');
        window.location.href = "{{ url('admin/Kredensial-riwayat/detail/kewenangan') }}/"+id;
    });

    $(document).on('click', '#spk', function() {
        var id = $(this).data('id');
        window.open("{{ url('cetak/spk') }}/"+id);
    });

    $(document).on('click', '#rkk', function() {
        var id = $(this).data('id');
        window.open("{{ url('cetak/rkk') }}/"+id);
    });

    });
</script>
@endsection