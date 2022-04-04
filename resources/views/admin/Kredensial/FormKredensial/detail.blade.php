@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('navbar')
    @include('admin._navbar')
@endsection

@section('main')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Kredensial Masuk</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Request Kredensial</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <h6 class="m-0 font-weight-bold text-primary">Informasi Perawat</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="col-md-2">
                                <div>No Kredensial</div>
                                <div>Jenis Request</div>
                                <div>Lokasi</div>
                                <div>Tanggal Request</div>
                                <div>Status Request</div>
                            </div>
                            <div class="col-md-4">
                                <div>: {{$data->id_kredensial}}</div>
                                <div>: {{$data->jenis_kredensial->nama_jenis}}</div>
                                <div>: {{$data->tempat_dinas->lokasi}}</div>
                                <div>: {{$data->tgl_request_kredensial}}</div>
                                <div>
                                    @if($data->status == 0)
                                        : <span class="badge badge-secondary"> Diajukan</span>
                                    @elseif($data->status == 1)
                                        : <span class="badge badge-warning"> Diprogress</span>
                                    @elseif($data->status == 2)
                                        : <span class="badge badge-success"> Diterima</span>
                                    @elseif($data->status == 3)
                                        : <span class="badge badge-danger"> Ditolak</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div>NIP Perawat</div>
                                <div>Nama Perawat</div>
                                <div>Golongan</div>
                                <div>Pangkat</div>
                            </div>
                            <div class="col-md-4">
                                <div>: {{$data->user->nip}}</div>
                                <div>: {{$data->user->nama}}</div>
                                <div>: {{$data->user->golongan}}</div>
                                <div>: {{$data->user->pangkat}}</div>
                                <div class="mt-2 text-right">
                                    <button type="button" class="btn btn-sm btn-info btn-circle kredensial-action" id="terima" data-id="{{$data->id_kredensial}}" title="Terima Request Kredensial"><i class="fa fa-check"></i></button>
                                    <!-- <button type="button" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></button> -->
                                    <button type="button" class="btn btn-sm btn-danger btn-circle kredensial-action" id="tolak" data-id="{{$data->id_kredensial}}" title="Tolak Request Kredensial"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Berkas Persyaratan</h6>
                        </div>
                    </div>

                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Persyaratan</th>
                                            <th>File</th>
                                            <th>Status</th>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Take Action</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'No Kredensial :', ['class' => 'awesome'])}}
                        <input type="text" class="form-control" name="id_kredensial" value="{{$data->id_kredensial}}" readonly>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'No Persyaratan :', ['class' => 'awesome'])}}
                        <input type="text" class="form-control" id="syarat_id" name="syarat_id" value="" readonly>
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Status Berkas :', ['class' => 'awesome'])}}
                        {{Form::select('status',['1' => 'Terima Berkas','2' => 'Tolak Berkas'],null,['class' => 'form-control', 'id' => 'status'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Note :', ['class' => 'awesome'])}}
                        {{Form::text('note','',['class' => 'form-control', 'id' => 'note', 'placeholder' => 'Note ...'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" id="berkas-submit" class="btn btn-primary" value="Save">
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
        var id1 = '{{$data->id_kredensial}}';
        var id_kredensial = id1.replace(/\//g, '_');
        var status = '{{$data->status}}';
        var table = $('#table').DataTable( {
            language: {
                "emptyTable": "Tidak Ada Data Tersimpan"
            },
            ajax: "{{ url('/admin/Kredensial-masuk/detail/berkas') }}/"+id_kredensial,
                "columns": [
                    {
                        "data": "credential_id",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "persyaratan.nama_persyaratan"},
                    {
                        data: 'persyaratan_id',
                        sClass: 'text-center',
                        render: function(data) {
                            return '<a style="text-decoration:none" href="#" data-id="'+data+'" id="check" class="text-primary" title="Check Request"><i class="fa fa-file"></i></a>';
                        },
                    },
                    { 
                        data: "status",
                        class: "text-center",
                        render: function(data) {
                            if(data == 0){
                                return '<span class="badge badge-secondary">Diajukan</span>';
                            }else if(data == 1){
                                return '<span class="badge badge-success">Diterima</span>';
                            }else{
                                return '<span class="badge badge-danger">Ditolak</span>';
                            }
                        },
                    },
                    {
                        data: 'persyaratan_id',
                        sClass: 'text-center',
                        render: function(data) {
                            return '<a style="text-decoration:none" href="#" data-id="'+data+'" id="proses" class="text-primary berkas-action" title="Take Action"><i class="fa fa-ellipsis-h"></i></a>';
                        },
                    }
                ],
            });

    setInterval( function () {
        table.ajax.reload( null, false ); // user paging is not reset on reload
    }, 5000 );

    $(document).on('click', '#check', function() {
        var id2 = $(this).data("id")
        window.open("{{ url('/berkas') }}"+'/'+id_kredensial+'/'+id2);
    });

    $(document).on('click', '#proses', function() {
        var id2 = $(this).data("id");
        $('#syarat_id').val(id2).change();
        $('#modal').modal('show');
        $('#form').attr('action', '{{ url('admin/Kredensial-masuk/detail/berkas/action') }}');     
    });

    $(document).on('click', '#terima', function() {
        var id = '{{$data->id_kredensial}}';
        var data_replace = id.replace(/\//g, '_');
        var status = 1;
        if (confirm("Setujui Request Kredensial ?")){
                $.ajax({
                    url : "{{ url('admin/Kredensial-masuk/detail/action') }}/"+data_replace+"/"+status,
                    success :function () {
                        window.location.href = "{{ url('admin/Kredensial-masuk') }}";
                    }
                })
            }
    });

    $(document).on('click', '#tolak', function() {
        var id = '{{$data->id_kredensial}}';
        var data_replace = id.replace(/\//g, '_');
        var status = 3;
        if (confirm("Tolak Request Kredensial ?")){
                $.ajax({
                    url : "{{ url('admin/Kredensial-masuk/detail/action') }}/"+data_replace+"/"+status,
                    success :function () {
                        window.location.href = "{{ url('admin/Kredensial-masuk') }}";
                    }
                })
            }
    });

    $('#simpan').submit(function(e) {
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

    function checkStatus(status){
        if(status == 1){
            $('#note').attr('readonly',true);
            $('#status').attr('readonly',true).attr('disabled', true);
            $('#berkas-submit').hide();
            $('.kredensial-action').prop('disabled', true).addClass('disabled').removeClass('btn-danger').removeClass('btn-info').addClass('btn-secondary');
        }
    }

    checkStatus(status);
});

</script>
@endsection