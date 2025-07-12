<!DOCTYPE html>
<html>
<head>
    <title>Permohonan Validasi Data Umum</title>
</head>
<body>
<h1>Permohonan Validasi Data Umum</h1>
<p>Dear Admin,</p>
<p>{{ $details['user_name'] }} telah meminta validasi untuk Data Umum berikut : <b>"{{ $details['nama_kegiatan'] }}"</b> .</p>
<p>Detail Data Umum Kegiatan:</p>
<ul>
    <li><strong>Nama Kegiatan:</strong> {{ $details['nama_kegiatan'] }}</li>
    <li><strong>Jenis Kegiatan:</strong> {{ $details['jenis_kegiatan'] }}</li>
    <li><strong>Nama Pelaksana:</strong> {{ $details['nama_pelaksana'] }}</li>
    <li><strong>Nama Penanggung Jawab:</strong> {{ $details['nama_penanggung_jawab'] }}</li>
</ul>
<p>Harap tinjau dan validasi data umum tersebut sesegera mungkin.</p>
<p>
    <a href="{{ $details['verification_link'] }}">Validasi Data Umum</a>
</p>
<p>Best regards,</p>
<p>{{ config('app.name') }}</p>
</body>
</html>
