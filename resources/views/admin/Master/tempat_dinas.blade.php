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
            <h1 class="h3 mb-0 text-gray-800">Master Tempat Dinas</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Table Data</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" id="add" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">Add New</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi Dinas</th>
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
<!-- /.container-fluid -->
@endsection

@section('modal')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Lokasi Dinas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Lokasi Tempat Dinas :', ['class' => 'awesome'])}}
                        {{Form::text('lokasi','',['class' => 'form-control', 'id' => 'lokasi', 'placeholder' => 'Tempat Dinas...'])}}
                    </div>
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
        var table = $('#table').DataTable( {
            language: {
                "emptyTable": "Tidak Ada Data Tersimpan"
            },
            ajax: "{{ url('/admin/tempat-dinas/data') }}",
                "columns": [
                    {
                        "data": "id_tempat_dinas",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "lokasi"},
                    {
                        data: 'id_tempat_dinas',
                        sClass: 'text-center',
                        render: function(data) {
                            return '<a style="text-decoration:none" href="#" data-id="'+data+'" id="edit" class="text-primary" title="edit"><i class="fas fa-edit"></i></a> &nbsp;'+
                                '<a style="text-decoration:none" href="#" data-id="'+data+'" id="delete" class="text-primary" title="hapus"><i class="fas fa-trash"></i> </a>';
                        },
                    }
                ],
            });

    setInterval( function () {
        table.ajax.reload( null, false ); // user paging is not reset on reload
    }, 5000 );

    $(document).on('click', '#add', function() {
        $('#modal').modal('show');  
        $('#lokasi').val("");
        $('#form').attr('action', '{{ url('admin/tempat-dinas/create') }}');     
    });

    $(document).on('click', '#edit', function() {
        $('#modal').modal('show');
        var id = $(this).data('id');
        $.ajax({   
            type: "get",
            url: "{{ url('/admin/tempat-dinas/edit') }}/"+id,
            dataType: "json",
            success: function(data) {
                console.log(data[0].id);
                event.preventDefault();
                var lokasi=data[0].lokasi

                $('#lokasi').val(lokasi).change();
                $('#form').attr('action', '{{ url('admin/tempat-dinas/update') }}/'+id);
            }
        });        
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

    $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Anda Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('admin/tempat-dinas/delete') }}/"+id,
                    success :function () {
                        location.reload();
                    }
                })
            }
    });

    });
</script>
@endsection