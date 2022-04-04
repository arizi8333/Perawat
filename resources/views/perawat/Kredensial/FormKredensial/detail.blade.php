@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('navbar')
    @include('perawat._navbar')
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
                                <!-- <div class="mt-2 text-right">
                                    <button type="button" class="btn btn-sm btn-info btn-circle kredensial-action" id="terima" data-id="{{$data->id_kredensial}}" title="Terima Request Kredensial"><i class="fa fa-check"></i></button> -->
                                    <!-- <button type="button" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></button> -->
                                    <!-- <button type="button" class="btn btn-sm btn-danger btn-circle kredensial-action" id="tolak" data-id="{{$data->id_kredensial}}" title="Tolak Request Kredensial"><i class="fa fa-times"></i></button> -->
                                <!-- </div> -->
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
                                            <th>Edit</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Upload Berkas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form', 'files' => 'true'))}}
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
                        {{Form::label('text', 'File :', ['class' => 'awesome'])}}
                        <input type="file" name="file" class="form-control">
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
            ajax: "{{ url('/perawat/Kredensial-masuk/detail/berkas') }}/"+id_kredensial,
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
                        render: function(data, type, row) {
                            var status = row.status;
                            if(status == 1){
                                return '<a style="text-decoration:none" class="text-secondary berkas-action" title="Tidak Tersedia"><i class="fa fa-ellipsis-h"></i></a>';
                            }else{
                                return '<a style="text-decoration:none" href="#" data-id="'+data+'" id="edit" class="text-primary berkas-action" title="Edit Berkas"><i class="fa fa-ellipsis-h"></i></a>';
                            }
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

    $(document).on('click', '#edit', function() {
        var id2 = $(this).data("id");
        $('#syarat_id').val(id2).change();
        $('#modal').modal('show');
        $('#form').attr('action', '{{ url('perawat/Kredensial-masuk/detail/berkas/update') }}');     
    });

});

</script>
@endsection