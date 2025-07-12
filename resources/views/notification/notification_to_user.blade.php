<!DOCTYPE html>
<html>
@if(isset($details['safeguard']))
    <head>
        <title>Validasi Penilaian Pelaksana Safeguard</title>
    </head>
    <body>
    <h1>Validasi Penilaian Pelaksana Safeguard</h1>
    <p>Dear {{ $details['user_name'] }},</p>
    <p>Data Penilaian Pelaksana Safeguard Anda  <strong>{!! $details['status'] !!}</strong> berikut detail data Penilaian Pelaksana Safeguard anda</p>
    <p>Detail Data Umum Kegiatan:</p>
    <ul>
        <li><strong>Kriteria:</strong> {{ $details['kriteria'] }}</li>
        <li><strong>Indikator:</strong> {{ $details['indikator'] }}</li>
        <li><strong>Alat Penilian Pelaksana:</strong> {{ $details['penilaian_pelaksana'] }}</li>
        <li><strong>Data Pendukung:</strong> {{ $details['data_pendukung'] }}</li>
        <li><strong>PIC:</strong> {{ $details['pic'] }}</li>
        <li><strong>Catatan:</strong> {{ $details['catatan'] }}</li>
        <li><strong>Catatan Validator:</strong> {{ $details['catatan_validator'] }}</li>
    </ul>
    <p>Login ke <a href="{{ config('app.url') }}">Aplikasi SISREDD+</a> untuk melihat data selengkapnya.</p>

    <p>Best regards,</p>
    <p>{{ config('app.name') }}</p>
    </body>
@else
    <head>
        <title>Validasi Data Umum</title>
    </head>
    <body>
    <h1>Validasi Data Umum</h1>
    <p>Dear {{ $details['user_name'] }},</p>
    <p>Data Kegiatan Anda <strong>{!! $details['status'] !!}</strong> berikut detail data kegiatan anda</p>
    <p>Detail Data Umum Kegiatan:</p>
    <ul>
        <li><strong>Nama Kegiatan:</strong> {{ $details['nama_kegiatan'] }}</li>
        <li><strong>Jenis Kegiatan:</strong> {{ $details['jenis_kegiatan'] }}</li>
        <li><strong>Nama Pelaksana:</strong> {{ $details['nama_pelaksana'] }}</li>
        <li><strong>Nama Penanggung Jawab:</strong> {{ $details['nama_penanggung_jawab'] }}</li>
        <li><strong>Catatan Validator:</strong> {{ $details['catatan'] }}</li>
    </ul>
    <p>Login ke <a href="{{ config('app.url') }}">Aplikasi SISREDD+</a> untuk melihat data.</p>

    <p>Best regards,</p>
    <p>{{ config('app.name') }}</p>
    </body>
@endif
</html>
