<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .div-class {
        position: relative;
    }

    .inner-image {
        position: absolute;
    }
</style>
</head>
<body>
<div style="font-size:13px">Lampiran Surat No. {{$datas->id_kredensial}}</div>
    <div class="row">
        <div class="text-center mt-4">
            <h5><b>RINCIAN KEWENANGAN KLINIS</b></h5>
            <h5><b>(<i>CLINICAL NURSING PRIVILEGE</i>)</b></h5>
        </div>        
        <div class="ml-3" style="font-size:13px">
            <div class="mb-2">
                I. Identitas Pribadi
            </div>
            <div class="row ml-2">
                <table style="width:100%">
                    <tr>
                        <td style="width:20%">Nama</td>
                        <td style="width:80%">: {{$datas->user->nama}}</td>
                    </tr>
                    <tr>
                        <td style="width:20%">NIP</td>
                        <td style="width:80%">: {{$datas->nip}}</td>
                    </tr>
                    <tr>
                        <td style="width:20%">Jabatan</td>
                        <td style="width:80%">: {{$datas->user->perawat_klinik->jabatan}}</td>
                    </tr>
                    <tr>
                        <td style="width:20%">Tempat Tugas</td>
                        <td style="width:80%">: {{$datas->tempat_dinas->lokasi}}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-4 mb-2">
                II. Rincian Kewenangan Klinis
            </div>
            <div class="row ml-2">
                <?php $no = 1; ?>
                @foreach($kewenangan as $k)
                <div>{{$no++}}. {{$k->kewenangan_klinis->rincian_kewenangan}}</div>
                @endforeach
            </div>
        </div>

        <table class="mt-5" style="font-size:13px;width:100%">
        <tr>
            <td style="width:50%"></td>
            <td style="width:15%">Dikeluarkan di</td>
            <td style="width:15%">: Padang</td>
            <td style="width:20%"></td>
        </tr>
        <tr>
            <td style="width:40%"></td>
            <td style="width:10%">Pada Tanggal</td>
            <td style="width:20%">: {{date('d F Y', strtotime($datas->tgl_terbit_surat))}}</td>
            <td style="width:15%"></td>
        </tr>
        <tr>
            <td style="width:50%"></td>
            <td style="width:15%">Direktur Utama</td>
            <td style="width:15%"></td>
            <td style="width:20%"></td>
        </tr>
        <tr>
            <td style="width:70%"></td>
            <td style="width:30%">
                <div class="div-class">
                    <img src="{{public_path('logo/img027-removebg-preview.png')}}" class="inner-image" width="80%">
                    <img src="{{public_path($datas->ttd_url)}}" class="ml-5 pl-3 mt-3" width="70%">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%"></td>
            <td style="width:15%">{{$dirut->nama}}</td>
            <td style="width:15%"></td>
            <td style="width:20%"></td>
        </tr>
        <tr>
            <td style="width:50%"></td>
            <td style="width:15%">{{$dirut->nip}}</td>
            <td style="width:15%"></td>
            <td style="width:20%"></td>
        </tr>
        </table>
    </div>
</body>
</html>