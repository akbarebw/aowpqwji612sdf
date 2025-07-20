<!DOCTYPE html>
<html>

<head>
    <title>Transkrip Akademik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .student-info {
            margin-bottom: 15px;
        }

        .student-info p {
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-left {
            text-align: left;
        }

        .footer {
            margin-top: 30px;
        }

        .signature {
            float: right;
            text-align: center;
            width: 50%;
        }

        .references {
            margin-top: 20px;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>TRANSKRIP AKADEMIK</h1>
        <p>NO. : {{ $nomorTranskrip ?? '/' }}</p>
    </div>

    <div class="student-info">
        <p><strong>Nama</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mahasiswa->nama_mahasiswa ?? '-' }}</p>
        <p><strong>Tempat, Tanggal Lahir</strong>: {{ ($mahasiswa->tempat_lahir ?? '-') . ', ' . ($mahasiswa->tanggal_lahir ? \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d F Y') : '-') }}</p>
        <p><strong>NIM</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mahasiswa->nim ?? '-' }}</p>
        <p><strong>Jurusan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mahasiswa->jurusan ?? '-' }}</p>
        <p><strong>Program Studi</strong>&nbsp;:{{ $mahasiswa->prodi->nama_program_studi }}</p>
        <p><strong>Jenjang</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $mahasiswa->jenjang ?? '-' }}</p>
        <p><strong>Tanggal Masuk</strong>: {{ $mahasiswa->tanggal_masuk ? \Carbon\Carbon::parse($mahasiswa->tanggal_masuk)->format('d F Y') : '-' }}</p>
        <p><strong>Tanggal Lulus</strong>&nbsp;: {{ $mahasiswa->tanggal_lulus ? \Carbon\Carbon::parse($mahasiswa->tanggal_lulus)->format('d F Y') : '-' }}</p>
    </div>

    <p>Matakuliah yang ditempuh dan nilai yang diperoleh sebagai berikut:</p>

    <table>
        <thead>
            <tr>
                <th>Semester</th>
                <th>No</th>
                <th>Kode Matakuliah</th>
                <th>Matakuliah</th>
                <th>SKS</th>
                <th>Huruf Mutu</th>
            </tr>
        </thead>
        <tbody>
            @php
            // Group courses by semester
            $groupedCourses = [];
            foreach ($mataKuliah as $mk) {
            $semester = $mk->nama_periode;
            if (!isset($groupedCourses[$semester])) {
            $groupedCourses[$semester] = [];
            }
            $groupedCourses[$semester][] = $mk;
            }

            // Convert semester numbers to Roman numerals
            $romanNumerals = [
            '1' => 'I',
            '2' => 'II',
            '3' => 'III',
            '4' => 'IV',
            '5' => 'V',
            '6' => 'VI',
            '7' => 'VII',
            '8' => 'VIII',
            '9' => 'IX',
            '10' => 'X'
            ];
            @endphp

            @foreach($groupedCourses as $semester => $courses)
            @php
            $romanSemester = $romanNumerals[$semester] ?? $semester;
            @endphp
            @foreach($courses as $index => $course)
            <tr>
                @if($loop->first)
                <td rowspan="{{ count($courses) }}">{{ $romanSemester }}</td>
                @endif
                <td>{{ $index + 1 }}</td>
                <td>{{ $course->list_mata_kuliah->kode_mata_kuliah?? '-' }}</td>
                <td class="text-left">{{ $course->nama_mata_kuliah }}</td>
                <td>{{ $course->sks_mata_kuliah }}</td>
                <td>{{ $course->nilai_huruf }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>

    <p>Jumlah sks: {{ $totalSKS ?? 0 }}</p>
    <p>Indexs Prestasi Kumulatif (IPK) : {{ number_format($ipk, 2) }}</p>
    <p>Predikat kelulusan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $predikat ?? '-' }}</p>

    <div class="footer">
        <div class="signature">
            <p>Samarinda, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p>Wakil Direktur I,</p>
            <br><br><br>
            <p><strong>Dr. Heriad Daud Salusu, S. Hut., MP</strong></p>
            <p>NIP. 19700830 199703 1 001</p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="references">
        <p><strong>Referangan:</strong></p>
        <p>1. Harkat Nilai HM</p>
        <p>&nbsp;&nbsp;&nbsp;A = 4, B+ = 3.5, B = 3, C+ = 2.5, C = 2, D+ = 1.5, D = 1, E = 0</p>
        <p>2. Index Prestasi</p>
        <p>&nbsp;&nbsp;&nbsp;∑(Harkat Nilai HM × SKS) / ∑SKS</p>
    </div>
</body>

</html>