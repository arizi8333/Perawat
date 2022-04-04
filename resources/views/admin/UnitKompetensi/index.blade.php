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
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Kredential</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" id="add" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">Fill Data</span>
                                </a>
                            </div>
                        </div>
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
                                            <td class="text-center">{{$d->keterangan}}</td>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Persyaratan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    @foreach($data as $d)

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Kewenangan Klinis :', ['class' => 'awesome'])}}
                        <!-- {{Form::select('jenis_kredensial_id',['K1' => 'Kredensial Baru','K2' => 'Rekredensial','K3' => 'Kredensial Naik Pangkat'],null,['class' => 'form-control', 'id' => 'jenis_kredensial_id'])}} -->
                        <input class="form-control" type="text" name="kewenangan" value="{{$d->kewenangan_klinis->rincian_kewenangan}}" readonly>
                        <input class="form-control" type="hidden" name="kredensial_id" value="{{$d->credential_id}}" readonly>
                        <input class="form-control" type="hidden" name="kewenangan_id[]" value="{{$d->kewenangan_klinis->id_kewenangan}}" readonly>
                    </div>
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Nilai :', ['class' => 'awesome'])}}
                        {{Form::text('nilai[]','',['class' => 'form-control', 'id' => 'nilai'])}}
                    </div>

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
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

    $(document).on('click', '#add', function() {
        $('#modal').modal('show');  
        $('#form').attr('action', '{{ url('admin/spk-rkk/kompetensi/update') }}');     
    });

    $('#simpan').submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
            data: formData,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success :function () {
                alert(data.success);
                $('#modal').modal('hide');
                location.reload();
            },
        });
    });

    });
</script>
@endsection