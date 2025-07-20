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
    <p><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa ?? '-' }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim ?? '-' }}</p>
    <p><strong>Program Studi:</strong> {{$mahasiswa->prodi->nama_program_studi ?? '-' }}</p>
    <p><strong>Total SKS:</strong> {{ $totalSKS }}</p>
    <p><strong>IPK:</strong> {{ number_format($ipk, 2) }}</p>
    <p><strong>Predikat:</strong> {{ $predikat }}</p>

    <h4>Daftar Mata Kuliah:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah as $mk)
            <tr>
                <td>{{ $mk->nama_periode }}</td>
                <td>{{ $mk->list_mata_kuliah->kode_mata_kuliah ?? '-' }}</td>
                <td>{{ $mk->nama_mata_kuliah }}</td>
                <td>{{ $mk->sks_mata_kuliah }}</td>
                <td>{{ $mk->nilai_huruf }}</td>
            </tr>
            @endforeach



        </tbody>
    </table>

    <button class="btn btn-success" wire:click="cetakTranskrip">Cetak Transkrip</button>
    @endif
</div>