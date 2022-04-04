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
            <h1 class="h3 mb-0 text-gray-800">Master User</h1>
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
                                        <th>Nip</th>
                                        <th>PK</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Gol</th>
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
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('method' => 'POST', 'id' => 'form'))}}
                    {{ csrf_field() }}
                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Nip Perawat :', ['class' => 'awesome'])}}
                        {{Form::text('nip','',['class' => 'form-control', 'id' => 'nip', 'placeholder' => 'Nip Perawat...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Role User :', ['class' => 'awesome'])}}
                        <select name="role" id="role" class="form-control">
                            @foreach($role as $r)
                                <option value="{{$r->id}}">{{$r->nama_role}}</option>
                            @endforeach
                        </select>
                        <!-- {{Form::select('role',['R1' => 'Direktur Utama','R2' => 'Komite','R3' => 'Perawat'],null,['class' => 'form-control', 'id' => 'role'])}} -->
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Jenis Perawat Klinik :', ['class' => 'awesome'])}}
                        <select name="perawat_klinik" id="perawat_klinik" class="form-control">
                            @foreach($pk as $p)
                                <option value="{{$p->id_perawat_klinik}}">{{$p->jabatan}}</option>
                            @endforeach
                        </select>
                        <!-- {{Form::select('perawat_klinik',['PK0' => '-','PK1' => 'Perawat Klinik I','PK2' => 'Perawat Klinik II','PK3' => 'Perawat Klinik III','PK4' => 'Perawat Klinik IV',],null,['class' => 'form-control', 'id' => 'perawat_klinik'])}} -->
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Nama Perawat :', ['class' => 'awesome'])}}
                        {{Form::text('nama','',['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Tempat Lahir :', ['class' => 'awesome'])}}
                        {{Form::text('tempat_lahir','',['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir Perawat...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Pendidikan :', ['class' => 'awesome'])}}
                        {{Form::text('pendidikan','',['class' => 'form-control', 'id' => 'pendidikan', 'placeholder' => 'Pendidikan ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Tanggal Lahir :', ['class' => 'awesome'])}}
                        {{Form::date('tanggal_lahir','',['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Nip Perawat...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Pangkat :', ['class' => 'awesome'])}}
                        {{Form::text('pangkat','',['class' => 'form-control', 'id' => 'pangkat', 'placeholder' => 'Pangkat Perawat...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Golongan :', ['class' => 'awesome'])}}
                        {{Form::text('golongan','',['class' => 'form-control', 'id' => 'golongan', 'placeholder' => 'Golongan Perawat...'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('text', 'Tahun Mulai Dinas :', ['class' => 'awesome'])}}
                        {{Form::text('mulai_dinas','',['class' => 'form-control', 'id' => 'mulai_dinas', 'placeholder' => 'Ex : 1999'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Email :', ['class' => 'awesome'])}}
                        {{Form::email('email','',['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email ...'])}}
                    </div>

                    <div class="form-group" id="div_nama">
                        {{Form::label('text', 'Password :', ['class' => 'awesome'])}}
                        {{Form::password('password',['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password ...'])}}
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
            ajax: "{{ url('/admin/users/data') }}",
                "columns": [
                    {
                        "data": "nip",
                        class: "text-center",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "nip"},
                    { "data": "perawat_klinik.jabatan"},
                    { "data": "nama"},
                    { "data": "email",},
                    {
                        data: 'golongan',
                        sClass: 'text-center',
                    },
                    {
                        data: 'nip',
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
        $('#nip').val("");
        $('#nama').val("");
        $('#tempat_lahir').val("");
        $('#tanggal_lahir').val("");
        $('#pendidikan').val("");
        $('#email').val("");
        $('#golongan').val("");
        $('#pangkat').val("");
        $('#mulai_dinas').val("");
        $('#password').val("");
        $('#form').attr('action', '{{ url('admin/users/create') }}');     
    });

    $(document).on('click', '#edit', function() {
        $('#modal').modal('show');
        var id = $(this).data('id');
        $.ajax({   
            type: "get",
            url: "{{ url('/admin/users/edit') }}/"+id,
            dataType: "json",
            success: function(data) {
                console.log(data[0].id);
                event.preventDefault();
                var nip=data[0].nip
                var nama=data[0].nama
                var tempat_lahir=data[0].tempat_lahir
                var tanggal_lahir=data[0].tanggal_lahir
                var pendidikan=data[0].pendidikan
                var golongan=data[0].golongan
                var pangkat=data[0].pangkat
                var mulai_dinas=data[0].mulai_dinas
                var email=data[0].email

                $('#nip').val(nip).change();
                $('#nama').val(nama).change();
                $('#tempat_lahir').val(tempat_lahir).change();
                $('#tanggal_lahir').val(tanggal_lahir).change();
                $('#pendidikan').val(pendidikan).change();
                $('#golongan').val(golongan).change();
                $('#pangkat').val(pangkat).change();
                $('#mulai_dinas').val(mulai_dinas).change();
                $('#email').val(email).change();
                $('#form').attr('action', '{{ url('admin/users/update') }}/'+id);
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
                    url : "{{ url('admin/users/delete') }}/"+id,
                    success :function () {
                        location.reload();
                    }
                })
            }
    });

    });
</script>
@endsection