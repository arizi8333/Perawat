@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('navbar')
    @include('direktur._navbar')
@endsection

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Pembuatan Kredensial</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" id="div_nama">
                                    {{Form::label('text', 'Bulanan :', ['class' => 'awesome'])}}
                                    {{Form::month('bulan','',['class' => 'form-control', 'id' => 'bulan'])}}
                                </div>
                                <button id="search_bulan" class="btn btn-sm btn-info">Search</button>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="div_nama">
                                    {{Form::label('text', 'Tahunan :', ['class' => 'awesome'])}}
                                    {{Form::number('tahun','',['class' => 'form-control', 'id' => 'tahun'])}}
                                </div>
                                <button id="search_tahun" class="btn btn-sm btn-info">Search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4" id="data">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Kredensial</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="row" style="font-size:14px">
                            <table width="100%" border=1>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Surat</th>
                                        <th>Tanggal</th>
                                        <th>Perawat</th>
                                        <th>PK</th>
                                        <th>Tempat</th>
                                        <th>Kredensial</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel-body">

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

        $(document).on('click', '#search_bulan', function() {
            var bulan = $('#bulan').val();
            var data_replace = bulan.replace(/-/g, '/');
            $('#tabel-body').find('tr').remove().end();
            console.log(data_replace);
            $.ajax({
                url: '{{ url('dirut/Kredensial-laporan/data') }}/'+data_replace,
                dataType: "json",
                success :function (data) {
                    $.each(data, function(k, v) {
                        $('#tabel-body').append($('<tr/>', )
                            .append($('<td/>',{class:'span', html: k+1}))
                            .append($('<td/>',{class:'span', html: v.id_kredensial}))
                            .append($('<td/>',{class:'span', html: v.tgl_request_kredensial}))
                            .append($('<td/>',{class:'span', html: v.user.nama}))
                            .append($('<td/>',{class:'span', html: v.user.perawat_klinik.jabatan}))
                            .append($('<td/>',{class:'span', html: v.tempat_dinas.lokasi}))
                            .append($('<td/>',{class:'span', html: v.jenis_kredensial.nama_jenis}))
                        )
                    })
                },
            });
            
        });

        $(document).on('click', '#search_tahun', function() {
            var tahun = $('#tahun').val();
            $('#tabel-body').find('tr').remove().end();
            $.ajax({
                url: '{{ url('dirut/Kredensial-laporan/data') }}/'+tahun+'/00',
                dataType: "json",
                success :function (data) {
                    $.each(data, function(k, v) {
                        $('#tabel-body').append($('<tr/>', )
                            .append($('<td/>',{class:'span', html: k+1}))
                            .append($('<td/>',{class:'span', html: v.id_kredensial}))
                            .append($('<td/>',{class:'span', html: v.tgl_request_kredensial}))
                            .append($('<td/>',{class:'span', html: v.user.nama}))
                            .append($('<td/>',{class:'span', html: v.user.perawat_klinik.jabatan}))
                            .append($('<td/>',{class:'span', html: v.tempat_dinas.lokasi}))
                            .append($('<td/>',{class:'span', html: v.jenis_kredensial.nama_jenis}))
                        )
                    })
                },
            });
        });
    });
</script>
@endsection