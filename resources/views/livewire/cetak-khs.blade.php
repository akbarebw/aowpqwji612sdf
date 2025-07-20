<div>
    <!-- Form Pencarian NIM -->
    <div class="mb-4 d-flex gap-2 align-items-center">
        <input type="text" wire:model="nim" placeholder="Masukkan NIM" class="form-control d-inline w-auto" />
        <select wire:model="semester" class="form-control d-inline w-auto">
            <option value="">Pilih Semester</option>
            @foreach($daftarSemester as $smt)
            <option value="{{ $smt }}">{{ $smt }}</option>
            @endforeach
        </select>
        <button wire:click="cariMahasiswa" class="btn btn-primary">Cari Mahasiswa</button>
    </div>

    @if($showPreview && $mahasiswa)
    <div class="khs-preview shadow p-4 mb-4" style="background:#fff;">
        <table width="100%">
            <tr>
                <td style="width:90px;vertical-align:top;">
                    <img src="{{ asset('logo-poltek (2).png') }}" style="width:80px; margin-top:5px;" alt="Logo" />
                </td>
                <td style="text-align:center;">
                    <div class="kop">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
                        POLITEKNIK PERTANIAN NEGERI SAMARINDA<br>
                        {{ $mahasiswa->nama_program_studi ?? '-' }}
                    </div>
                    <div class="alamat">
                        Jl. Samratulangi Samarinda, Kode Pos 75131 Telp. 0541-260421, Faximile. 0541-260680
                    </div>
                </td>
            </tr>
        </table>
        <div class="garis"></div>
        <div class="judul">KARTU HASIL STUDI MAHASISWA</div>
        <div style="text-align:center; margin-bottom:10px;">No : {{ date('d/m/Y') }}</div>
        <table class="info-table">
            <tr>
                <td>Nama</td>
                <td>: {{ $mahasiswa->nama_mahasiswa ?? '-' }}</td>
                <td>Program Studi</td>
                <td>: {{ $mahasiswa->nama_program_studi ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nomor Induk Mahasiswa</td>
                <td>: {{ $mahasiswa->nim ?? '-' }}</td>
                <td>Semester</td>
                <td>: {{ $mahasiswa->nama_periode ?? '-' }}</td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>: {{ $mahasiswa->nama_program_studi ?? '-' }}</td>
                <td>Tahun Akademik</td>
                <td>: {{ $mahasiswa->angkatan ?? '-' }}</td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered khs-table text-center align-middle" style="width:100%;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mata Kuliah</th>
                        <th>SKS (S)</th>
                        <th>Nilai Angka</th>
                        <th>Nilai Huruf</th>
                        <th>Bobot (B)</th>
                        <th>N.Mutu (S x B)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mataKuliah as $i => $mk)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td class="text-start">{{ $mk->nama_mata_kuliah }}</td>
                        <td>{{ $mk->sks_mata_kuliah }}</td>
                        <td>{{ $mk->nilai_angka }}</td>
                        <td>{{ $mk->nilai_huruf }}</td>
                        <td>{{ $mk->nilai_indeks }}</td>
                        <td>{{ $mk->sks_x_indeks }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="2">Total</th>
                        <th>{{ $mataKuliah->sum('sks_mata_kuliah') }}</th>
                        <th colspan="3"></th>
                        <th>{{ $mataKuliah->sum('sks_x_indeks') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="footer-table" style="width:100%;margin-top:16px;">
            <tr>
                <td>
                    Indeks Prestasi : {{ $mataKuliah->sum('sks_mata_kuliah') > 0 ? number_format($mataKuliah->sum('sks_x_indeks') / $mataKuliah->sum('sks_mata_kuliah'), 2) : '0.00' }}<br>
                    Tanggal Kelulusan : <br>
                    Status Kelulusan : <br>
                </td>
                <td>
                    Keterangan Absensi<br>
                    Sakit : 0 Jam<br>
                    Izin : 0 Jam<br>
                    Alpa : 0 Jam<br>
                    Total : 0 Jam
                </td>
            </tr>
        </table>
        <div class="ttd" style="text-align:right;margin-top:30px;">
            <div class="jabatan" style="margin-bottom:60px;">Ketua Jurusan<br>Rekayasa dan Komputer,</div>
            <div>Dr. Suswanto, M.Pd<br>NIP. 196805251995121001</div>
        </div>
        <div class="text-end mt-3">
            <button wire:click="cetakKHS" class="btn btn-success">
                <i class="fas fa-print"></i> Cetak PDF
            </button>
        </div>
    </div>
    @elseif($showPreview)
    <div class="alert alert-warning">Mahasiswa tidak ditemukan.</div>
    @endif

    <style>
        .kop {
            font-size: 14px;
            font-weight: bold;
        }

        .alamat {
            font-size: 11px;
        }

        .garis {
            border-bottom: 2px solid #000;
            margin: 8px 0 16px 0;
        }

        .judul {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 8px;
        }

        .info-table {
            margin-bottom: 10px;
        }

        .info-table td {
            padding: 2px 8px 2px 0;
            vertical-align: top;
        }

        .khs-table th,
        .khs-table td {
            border: 1px solid #a00;
            padding: 4px;
        }

        .khs-table th {
            background: #f8f8f8;
        }

        .khs-table td.text-start {
            text-align: left;
        }

        .footer-table td {
            vertical-align: top;
        }

        .ttd .jabatan {
            margin-bottom: 60px;
        }
    </style>
</div>