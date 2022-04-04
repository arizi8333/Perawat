@extends('layouts._template')

@section('navbar')
    @include('admin._navbar')
@endsection

@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Kredensial Pending</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{$pending}} Permohonan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-info fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kredensial On Progress</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{$progress}} Permohonan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-spinner fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Kredensial Finished</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{$finished}} Permohonan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<div class="d-sm-flex align-items-center justify-content-between mt-5 mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persyaratan Kredensial</h1>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow border-bottom-info h-100 py-2">
            <div class="card-header bg-info">
                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                    {{$persyaratan[0]->jenis_kredensial->nama_jenis}}
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        @foreach($persyaratan as $p)
                        <div style="font-size:15px;"> - {{ $p->nama_persyaratan }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow border-bottom-info h-100 py-2">
            <div class="card-header bg-info">
                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                    {{$persyaratan1[0]->jenis_kredensial->nama_jenis}}
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        @foreach($persyaratan1 as $p1)
                        <div style="font-size:15px;"> - {{ $p1->nama_persyaratan }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow border-bottom-info h-100 py-2">
            <div class="card-header bg-info">
                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                    {{$persyaratan2[0]->jenis_kredensial->nama_jenis}}
                </div>
            </div>
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        @foreach($persyaratan2 as $p2)
                        <div style="font-size:15px;"> - {{ $p2->nama_persyaratan }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
 <!-- Bootstrap core JavaScript-->
    
 <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('template/js/demo/chart-pie-demo.js')}}"></script>
@endsection