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
            <h1 class="h3 mb-0 text-gray-800">Add Request Kredensial</h1>
        </div>
        <!-- Content Row -->
        {{Form::open(array('url' => 'perawat/Kredensial-masuk/store','method' => 'POST', 'id' => 'form', 'files' => 'true'))}}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Data Kredensial</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        <div class="form-group" id="div_nama">
                            {{Form::label('text', 'NIP Perawat :', ['class' => 'awesome'])}}
                            <input name="nip" id="nip" class="form-control" value="{{Auth::user()->nip}}" readonly>
                        </div>

                        <div class="form-group" id="div_nama">
                            {{Form::label('text', 'Lokasi Dinas :', ['class' => 'awesome'])}}
                            <select name="tempat_dinas_id" id="tempat_dinas_id" class="form-control">
                                @foreach($tempatdinas as $t)
                                <option value="{{$t->id_tempat_dinas}}">{{$t->lokasi}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="div_nama">
                            {{Form::label('text', 'Jenis Kredensial :', ['class' => 'awesome'])}}
                            <input type="hidden" name="jenis_kredensial_id" id="jenis_kredensial_id" value="{{$persyaratan[0]->jenis_kredensial_id}}" class="form-control">
                            <input type="text" name="nama_kredensial" id="nama_kredensial" value="{{$persyaratan[0]->jenis_kredensial->nama_jenis}}" class="form-control" readonly>
                        </div>

                        @if($persyaratan[0]->jenis_kredensial_id == 'K3')
                        <div class="form-group" id="div_pk">
                            {{Form::label('text', 'Kenaikan Pangkat :', ['class' => 'awesome'])}}
                            <select name="perawat_klinik" id="perawat_klinik" class="form-control">
                                @foreach($perawatklinik as $p)
                                <option value="{{$p->id_perawat_klinik}}">{{$p->jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Data Persyaratan</h6>
                    </div>
                    <div class="card-body border-bottom-primary">
                        @foreach($persyaratan as $key => $a)
                            <div class="form-group" id="div_nama">
                                <label>{{$key + 1}}. {{$a->nama_persyaratan}}</label>
                                <input type="hidden" name="persyaratan_id[]" class="form-control" value="{{$a->id_persyaratan}}">
                                <input type="file" name="file[]" class="form-control">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Submit">

        {{Form::close()}}
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection