<div>
    <div class="w-full px-4">
        <!-- Filter Atas -->
        <div class="d-flex flex-wrap gap-2">
            <!-- Filter Semester -->
            <div class="filter-card d-flex flex-column flex-fill border border-light p-3 rounded shadow-sm bg-white">
                <label class="mb-1 text-gray-700">Semester</label>
                <select wire:model.live="semester_terpilih" class="form-select w-100 py-2 bg-white" aria-label="Select Semester">
                    @if (empty($semester_terpilih))
                    <option value="">Pilih Semester</option>
                    @endif
                    @foreach ($daftar_semester as $semester)
                    <option value="{{ $semester->id_semester }}">{{ $semester->nama_semester }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Program Studi -->
            <div class="filter-card d-flex flex-column flex-fill border border-light p-3 rounded shadow-sm bg-white">
                <label class="mb-1 text-gray-700">Program Studi</label>
                <select wire:model.live="prodi_terpilih" class="form-select w-100 py-2 bg-white" aria-label="Select Program Studi">
                    @foreach ($daftar_prodi as $prodi)
                    <option value="{{ $prodi->id_prodi }}">{{ $prodi->nama_program_studi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Mata Kuliah -->
            <div class="filter-card d-flex flex-column flex-fill border border-light p-3 rounded shadow-sm bg-white">
                <label class="mb-1 text-gray-700">Mata Kuliah</label>
                <select wire:model.live="matkul_terpilih" class="form-select w-100 py-2 bg-white" aria-label="Select Mata Kuliah">
                    @foreach ($daftar_matkul as $matkul)
                    <option value="{{ $matkul->id_matkul }}">{{ $matkul->nama_mata_kuliah }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Kelas Kuliah -->
            <div class="filter-card d-flex flex-column flex-fill border border-light p-3 rounded shadow-sm bg-white">
                <label class="mb-1 text-gray-700">Kelas Kuliah</label>
                <select wire:model.live="kelas_terpilih" class="form-select w-100 py-2 bg-white" aria-label="Select Kelas Kuliah">
                    @foreach ($daftar_kelas as $kelas)
                    <option value="{{ $kelas->id_kelas_kuliah }}">{{ $kelas->nama_kelas_kuliah }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- Action Buttons: Import, Export, and Print -->
        <div class="d-flex justify-content-end gap-3 mt-3">
            @if (count($daftar_mahasiswa) > 0)
            <!-- Import Button -->
            <button class="btn btn-success d-flex align-items-center gap-2">
                <i class="fas fa-upload"></i>
                Import Excel
            </button>
            <!-- Export Button -->
            <button class="btn btn-primary d-flex align-items-center gap-2">
                <i class="fas fa-download"></i>
                Export Excel
            </button>

            <!-- Print Button -->
            <button class="btn btn-warning d-flex align-items-center gap-2">
                <i class="fas fa-print"></i>
                Cetak
            </button>
            @else
            <button class="btn btn-success d-flex align-items-center gap-2">
                <i class="fas fa-upload"></i>
                Import Excel
            </button>

            @endif
        </div>

        <!-- Judul & Konversi -->
        @if (count($daftar_mahasiswa) > 0)
        <h3 class="text-lg font-semibold mt-6 mb-2 text-center text-gray-900 mt-3">Daftar Mahasiswa</h3>
        <div class="text-center mt-4 text-center text-danger font-semibold mb-3">
            <strong>Konversi Nilai :</strong>
            <span>0-39.99 = E | 40-54.99 = D | 55-59.99 = D+ | 60-64.99 = C | 65-69.99 = C+ | 70-74.99 = B | 75-79.99 = B+ | 80-100 = A</span>
        </div>

        <!-- Tabel -->
        <div class="overflow-auto mt-6">
            @php
            $totalBobot = 0;
            foreach ($pengaturan_komponen->komponen ?? [] as $komponen) {
            $totalBobot += $komponen->pivot->bobot ?? $pengaturan_komponen->bobot_standar;
            }
            @endphp

            @if($totalBobot !== 100)
            <div class="alert alert-warning text-center my-2">
                Total bobot komponen saat ini <b>{{ $totalBobot }}</b>. Total bobot harus <b>100</b>!
            </div>
            @endif

            <table class="min-w-full border shadow-md rounded">
                <thead class="bg-blue-600 text-white text-sm text-center" style="background: #3b77e9;">
                    <tr>
                        <th class="py-2 px-3 border" rowspan="2">No</th>
                        <th class="py-2 px-3 border" rowspan="2">NIM</th>
                        <th class="py-2 px-3 border text-left" rowspan="2">Nama Mahasiswa</th>
                        <th class="py-2 px-3 border" colspan="{{ count($pengaturan_komponen->komponen ?? []) }}">
                            Komponen
                            <span class="text-xs font-normal">
                                (Total: {{ $totalBobot }})
                            </span>
                        </th>
                        <th class="py-2 px-3 border" rowspan="2">Ikut UAS</th>
                        <th class="py-2 px-3 border" rowspan="2">NA</th>
                        <th class="py-2 px-3 border" rowspan="2">NH</th>
                        <th class="py-2 px-3 border" rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                        @foreach ($pengaturan_komponen->komponen ?? [] as $komponen)
                        <th class="py-2 px-3 border">
                            <span class="text-xs font-normal">
                                ({{ $komponen->pivot->bobot ?? $pengaturan_komponen->bobot_standar }})
                            </span>
                            <br>
                            {{ $komponen->name }}
                            <a href="#" wire:click.prevent="showEditBobot('{{ $komponen->id }}')" class="text-white"><i class="fas fa-edit"></i></a>
                        </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody class="bg-white text-sm">
                    @foreach ($daftar_mahasiswa as $index => $mhs)
                    <tr x-data="{ ikutUas: @entangle('ikutUas.'.$mhs->nim) }"
                        :class="ikutUas == 0 ? 'bg-danger bg-opacity-20 text-white' : ''"
                        class="hover:bg-gray-100 text-center">
                        <td class="py-2 px-3 border">{{ $index + 1 }}</td>
                        <td class="py-2 px-3 border">{{ $mhs->nim }}</td>
                        <td class="py-2 px-3 border text-left">{{ $mhs->nama_mahasiswa }}</td>

                        @foreach ($pengaturan_komponen->komponen as $komponen)
                        <td class="py-2 px-3 border">

                            <input type="number"
                                wire:model.live.debounce.500ms="inputNilai.{{ $mhs->nim }}.{{ $komponen->id }}"
                                class="px-1 py-1 border rounded text-center"
                                min="0" max="100"
                                oninput="if(this.value > 100) this.value = 100;"
                                value="{{ $inputNilai[$mhs->nim][$komponen->id] ?? '' }}"
                                @if(strtolower($komponen->name) === 'uas')
                            :disabled="ikutUas == 0"
                            @endif
                            >


                        </td>
                        @endforeach

                        <!-- Ikut UAS -->
                        <td class="py-2 px-3 border">
                            <label>
                                <input type="radio"
                                    value="1"
                                    wire:model="ikutUas.{{ $mhs->nim }}"> Ya
                            </label>
                            <label class="ml-2">
                                <input type="radio"
                                    value="0"
                                    wire:model="ikutUas.{{ $mhs->nim }}"> Tidak
                            </label>
                        </td>

                        <!-- NA, NH, Keterangan -->
                        @php $nim = strtoupper($mhs->nim); @endphp
                        <td class="py-2 px-3 border">
                            {{ $nilaiAkhir[$nim] ?? '--' }}
                        </td>
                        <td class="py-2 px-3 border">
                            {{ $nilaiHuruf[$nim] ?? '--' }}
                        </td>

                        <td class="py-2 px-3 border">
                            <input type="text"
                                class="w-full px-2 py-1 border rounded text-xs"
                                wire:model.defer="keterangan.{{ $mhs->nim }}">
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end mt-4">
                <button wire:click="simpanNilai" class="btn btn-success">
                    <i class="fas fa-save me-2"></i> Simpan Nilai
                </button>
            </div>

        </div>
        @else
        <p class="text-gray-500 italic mt-6 text-center mt-5">Tidak ada peserta.</p>
        @endif
    </div>

    {{-- Modal Edit Bobot --}}
    @if($editBobotId)
    <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.3)">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="updateBobot">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Edit Komponen {{ $editBobotNama ? strtoupper($editBobotNama) : '' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeEditBobot"></button>
                    </div>
                    <div class="modal-body">
                        <label>Bobot (%)</label>
                        <input type="number" wire:model="editBobotValue" class="form-control" min="0" max="100" step="0.01" required>
                        @if($bobotError)
                        <div class="alert alert-danger mt-2">{{ $bobotError }}</div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeEditBobot">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('notifikasi', (data) => {
        Swal.fire({
            icon: data.tipe || 'success',
            title: data.judul || 'Berhasil',
            text: data.deskripsi || '',
            showConfirmButton: true,
            timer: 3000,
        });
    });
</script>

@endpush