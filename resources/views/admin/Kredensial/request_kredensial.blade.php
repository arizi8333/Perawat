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
            <h1 class="h3 mb-0 text-gray-800">Kredensial Masuk</h1>
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
                                        <th>Nama Perawat</th>
                                        <th>Tanggal Request</th>
                                        <th>Jenis Kredensial</th>
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
<!-- /.container-fluid -->
@endsection

@section('modal')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Jenis Kredensial</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Jenis Kredensial :', ['class' => 'awesome'])}}
                        <select id="jenis_kredensial" name="jenis_kredensial" class="form-control">
                            @foreach($persyaratan as $a)
                                <option value="{{$a->id_jenis_kredensial}}">{{$a->nama_jenis}}</option>
                            @endforeach
                        </select>
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
            ajax: "{{ url('/admin/Kredensial-masuk/data') }}",
                "columns": [
                    {
                        "data": "id_kredensial",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "user.nama"},
                    { "data": "tgl_request_kredensial"},
                    { "data": "jenis_kredensial.nama_jenis"},
                    { 
                        data: "status",
                        class: "text-center",
                        render: function(data) {
                            if(data == 0){
                                return '<span class="badge badge-secondary">Diajukan</span>';
                            }else if(data == 1){
                                return '<span class="badge badge-warning">Diproses</span>';
                            }else if(data == 2){
                                return '<span class="badge badge-success">Diterima</span>';
                            }else{
                                return '<span class="badge badge-danger">Ditolak</span>';
                            }
                        },
                    },
                    {
                        data: 'id_kredensial',
                        sClass: 'text-center',
                        render: function(data, row) {
                            var status = row.status;
                            data_replace = data.replace(/\//g, '_');
                            if(status == 1){
                                return '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="check" class="text-primary" title="Check Request"><i class="fa fa-info-circle"></i></a>&nbsp;'+
                                '<a style="text-decoration:none" class="text-secondary" title="Tidak Tersedia"><i class="fas fa-trash"></i> </a>';
                            }else{
                                return '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="check" class="text-primary" title="Check Request"><i class="fa fa-info-circle"></i></a>&nbsp;'+
                                '<a style="text-decoration:none" href="#" data-id="'+data_replace+'" id="delete" class="text-primary" title="hapus"><i class="fas fa-trash"></i> </a>';
                            }
                        },
                    }
                ],
            });

    setInterval( function () {
        table.ajax.reload( null, false ); // user paging is not reset on reload
    }, 5000 );

    $(document).on('click', '#add', function() {
        $('#modal').modal('show');  
        $('#jenis_kredensial').val("");
        $('#form').attr('action', '{{ url('admin/Kredensial-masuk/create') }}');     
    });

    $(document).on('click', '#check', function() {
        var id = $(this).data('id');
        
        window.location.href = "{{ url('admin/Kredensial-masuk/detail/') }}/"+id;
    });

    // $(document).on('click', '#edit', function() {
    //     $('#modal').modal('show');
    //     var id = $(this).data('id');
    //     $.ajax({   
    //         type: "get",
    //         url: "{{ url('/admin/Kredensial-masuk/edit') }}/"+id,
    //         dataType: "json",
    //         success: function(data) {
    //             console.log(data[0].id);
    //             event.preventDefault();
    //             var nama_jenis=data[0].nama_jenis

    //             $('#nama_jenis').val(nama_jenis).change();
    //             $('#form').attr('action', '{{ url('admin/Kredensial-masuk/update') }}/'+id);
    //         }
    //     });        
    // });

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

    $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Anda Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('admin/Kredensial-masuk/delete') }}/"+id,
                    success :function () {
                        location.reload();
                    }
                })
            }
    });

    });
</script>
@endsection