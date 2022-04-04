@extends('layouts._template')

@section('css')
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('navbar')
    @include('perawat._navbar')
@endsection

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Berkas Persyaratan Kredensial</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
        @foreach($jk as $k)
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">{{$k->nama_jenis}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom-primary text-xs text-uppercase mb-1 font-weight-bold">
                    <?php $no=1?>
                        @foreach($kk as $key => $p1)
                            @if($p1->jenis_kredensial_id == $k->id_jenis_kredensial)
                            <div class="mb-2">
                                {{$no++}}. {{$p1->nama_persyaratan}}
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
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
        

    });
</script>
@endsection