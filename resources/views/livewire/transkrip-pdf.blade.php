<!DOCTYPE html>
<html>

<head>
    <title>Transkrip Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #a00;
            padding: 4px;
        }

        th {
            background: #f8f8f8;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <h3 style="text-align:center;">Transkrip Nilai</h3>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa ?? '-' }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim ?? '-' }}</p>
    <p><strong>Program Studi:</strong> {{ $mahasiswa->nama_program_studi ?? '-' }}</p>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>SKS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Bobot</th>
                <th>Mutu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah as $i => $mk)
            <tr>
                <td>{{ $i+1 }}</td>
                <td class="text-left">{{ $mk->nama_mata_kuliah }}</td>
                <td>{{ $mk->nama_periode }}</td>
                <td>{{ $mk->sks_mata_kuliah }}</td>
                <td>{{ $mk->nilai_angka }}</td>
                <td>{{ $mk->nilai_huruf }}</td>
                <td>{{ $mk->nilai_indeks }}</td>
                <td>{{ $mk->sks_x_indeks }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>