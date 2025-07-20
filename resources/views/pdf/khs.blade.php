<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KHS Mahasiswa</title>
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
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Kartu Hasil Studi (KHS)</h1>
    <p>Nama: {{ $mahasiswa->nama_mahasiswa }}</p>
    <p>NIM: {{ $mahasiswa->nim }}</p>
    <p>Program Studi: {{ $mahasiswa->prodi->nama_program_studi }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Bobot</th>
                <th>Mutu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $i => $n)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $n->mataKuliah->nama_mk }}</td>
                <td>{{ $n->mataKuliah->sks }}</td>
                <td>{{ $n->nilai_angka }}</td>
                <td>{{ $n->nilai_huruf }}</td>
                <td>{{ $n->bobot_komponen->persentase_bobot ?? 'N/A' }}</td>
                <td>{{ $n->mutu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Indeks Prestasi: </strong> {{ $mahasiswa->ipk }}</p>

</body>

</html>