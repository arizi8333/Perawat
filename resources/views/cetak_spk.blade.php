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
    <div class="row">
        <div class="text-center">
            <table class="text-center" style="width:100%">
                <tr>
                    <td style="width:20%">
                        <img src="{{public_path('logo/logo_kementerian_kesehatan.png')}}" width="90">
                    </td>
                    <td style="width:60%">
                        <div style="font-size:18px"><b>KEMENTERIAN KESEHATAN RI</b></div>
                        <div style="font-size:16px"><b>DIREKTORAT JENDERAL PELAYAN KESEHATAN</b></div>
                        <div style="font-size:16px"><b>RSUP DR.M.DJAMIL PADANG</b></div>
                        <div style="font-size:14px">Jalan Perintis Kemerdekaan Padang - 25127</div>
                        <div style="font-size:14px">Phone : (0751) 32371, 810253, 810254 Fax : (0751) 32371</div>
                        <div style="font-size:14px">email : <u>rsupdjamil@yahoo.com</u></div>
                    </td>
                    <td style="width:20%">
                        <img src="{{public_path('logo/logo_rumah_sakit_djamil.png')}}" width="90">
                    </td>
                </tr>
            </table>
        </div>
        <hr style="border: 2px solid black;">
        <div class="text-center mt-4 mb-3">
            <div style="text-decoration: underline"><b>SURAT PENUGASAN KLINIS</b></div>
            <div><b>NOMOR : {{$datas->id_kredensial}}</b></div>
        </div>        
        <div class="ml-3" style="font-size:13px">
            Yang bertandatangan dibawah ini :
        </div>

        <div class="ml-5 mt-3" style="font-size:13px">
            <table style="width:100%">
                <tr>
                    <td style="width:20%">Nama</td>
                    <td style="width:80%">: {{$dirut->nama}}</td>
                </tr>
                <tr>
                    <td style="width:20%">NIP</td>
                    <td style="width:80%">: {{$dirut->nip}}</td>
                </tr>
                <tr>
                    <td style="width:20%">Pangkat/Gol</td>
                    <td style="width:80%">: {{$dirut->pangkat}} / {{$dirut->golongan}}</td>
                </tr>
                <tr>
                    <td style="width:20%">Jabatan</td>
                    <td style="width:80%">: {{$dirut->role->nama_role}}</td>
                </tr>
            </table>
        </div>


        <div class="ml-3 mt-3 mr-3" style="font-size:13px">
            dengan ini memberi Kewenangan Klinis sebagaimana tercantum dalam lampiran Rincian Kewenangan Klinis keperawatan, kepada :
        </div>

        <div class="ml-5 mt-3" style="font-size:13px">
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

        <div class="ml-3 mt-3 mr-3" style="font-size:13px">
            Kepada yang bersangkutan berhak dan dapat memberikan asuhan keperawatan kepada pasien sesuai Rincian Kewenangan Klinis Keperawatan.
        </div>

        <div class="ml-3 mt-3 mr-3" style="font-size:13px">
            Berlaku mulai {{date('d F Y', strtotime($datas->tgl_terbit_surat))}} sampai dengan {{date('d F Y', strtotime($datas->tgl_habis_berlaku))}} dan dapat diperbaiki kembali jika terdapat kekeliruan.
        </div>

        <div class="ml-3 mt-3 mr-3" style="font-size:13px">
            Demekian Surat Penugasan Kerja Klinis ini untuk dilaksanakan.
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
            <td style="width:70%"></td>
            <td style="width:30%"></td>
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