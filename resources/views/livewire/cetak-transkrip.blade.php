<div>
    <h2>Cetak Transkrip Mahasiswa</h2>

    <form wire:submit.prevent="cariMahasiswa">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" wire:model="nim" placeholder="Masukkan NIM">
        </div>
        <button type="submit" class="btn btn-primary">Cari Mahasiswa</button>
    </form>

    @if ($showPreview)
    <hr>
    <h3>Preview Transkrip</h3>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Program Studi:</strong> {{ $mahasiswa->program_studi }}</p>
    <p><strong>Semester:</strong> {{ $mahasiswa->semester }}</p>
    <p><strong>Tahun Akademik:</strong> {{ $mahasiswa->tahun_akademik }}</p>

    <h4>Daftar Mata Kuliah:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Indeks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah as $index => $mk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mk->nama_mata_kuliah }}</td>
                <td>{{ $mk->sks_mata_kuliah }}</td>
                <td>{{ $mk->nilai_angka }}</td>
                <td>{{ $mk->nilai_huruf }}</td>
                <td>{{ $mk->nilai_indeks }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-success" wire:click="cetakTranskrip">Cetak Transkrip</button>
    @endif
</div>