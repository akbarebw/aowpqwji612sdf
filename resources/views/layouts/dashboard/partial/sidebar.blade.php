<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            @role('dosen')
            <li class="nav-label first">Menu Dosen</li>
            <!-- <li>
                <a class="" href="{{ route('dosen.penilaian') }}">
                    <i class="la la-check-square"></i>
                    <span class="nav-text">Dashboard Penilaian</span>
                </a>
            </li> -->
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-clipboard"></i>
                    <span class="nav-text">Penilaian</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dosen.penilaian') }}">List Nilai</a></li>
                </ul>
            </li>
            @endrole
            @unlessrole('dosen')
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="" href="{{ route('dashboard.index') }}">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>



            <li class="nav-label">Data Master</li>

            <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-database-1"></i>
                    <span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            {{-- <i class="flaticon-381-database-1"></i> --}}
                            <span class="nav-text"> Refrensi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('dashboard.datamaster.agama.index') }}">Agama</a></li>
                            <li><a href="{{ route('dashboard.datamaster.bentuk.pendidikan.index') }}">Bentuk Pendidikan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.ikatan.kerja.sdm.index') }}">Ikatan Kerja SDM</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jabatan.fungsional.index') }}">Jabatan Fungsional</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jalur.masuk.index') }}">Jalur Masuk</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jalur.evaluasi.index') }}">Jalur Evaluasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.keluar.index') }}">Jenis Keluar</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.sertifikasi.index') }}">Jenis Sertifikasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.pendaftaran.index') }}">Jenis Pendaftaran</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.sms.index') }}">Jenis SMS</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.tinggal.index') }}">Jenis Tinggal</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.prestasi.index') }}">Jenis Prestasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.evaluasi.index') }}">Jenis Evaluasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.substansi.index') }}">Jenis Substansi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenis.aktivitas.index') }}">Jenis Aktivitas</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jenjang.pendidikan.index') }}">Jenjang Pendidikan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.kebutuhan.khusus.index') }}">Kebutuhan Khusus</a></li>
                            <li><a href="{{ route('dashboard.datamaster.lembaga.pengangkat.index') }}">Lembaga Pengangkat</a></li>
                            <li><a href="{{ route('dashboard.datamaster.negara.index') }}">Negara</a></li>
                            <li><a href="{{ route('dashboard.datamaster.level.wilayah.index') }}">Level Wilayah</a></li>
                            <li><a href="{{ route('dashboard.datamaster.wilayah.index') }}">Wilayah</a></li>
                            <li><a href="{{ route('dashboard.datamaster.tahun.ajaran.index') }}">Tahun Ajaran</a></li>
                            <li><a href="{{ route('dashboard.datamaster.status.mahasiswa.index') }}">Status Mahasiswa</a></li>
                            <li><a href="{{ route('dashboard.datamaster.status.kepegawaian.index') }}">Status Kepegawaian</a></li>
                            <li><a href="{{ route('dashboard.datamaster.status.keaktifan.pegawai.index') }}">Status Keaktifan Pegawai</a></li>
                            <li><a href="{{ route('dashboard.datamaster.semester.index') }}">Semester</a></li>
                            <li><a href="{{ route('dashboard.datamaster.penghasilan.index') }}">Penghasilan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.pekerjaan.index') }}">Pekerjaan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.pangkat.golongan.index') }}">Pangkat Golongan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.alat.transportasi.index') }}">Alat Transportasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.pembiayaan.index') }}">Pembiayaan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.tingkat.prestasi.index') }}">Tingkat Prestasi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.kategori.kegiatan.index') }}">Kategori Kegiatan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.profil.pt.index') }}">Profil PT</a></li>
                            <li><a href="{{ route('dashboard.datamaster.prodi.index') }}">Prodi</a></li>
                            <li><a href="{{ route('dashboard.datamaster.periode.index') }}">Periode</a></li>
                        </ul>
                        <hr>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            {{-- <i class="flaticon-381-database-1"></i> --}}
                            <span class="nav-text">Pengaturan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('dashboard.pengaturan.permission.index') }}">Permission</a></li>
                            <li><a href="{{ route('dashboard.datamaster.bentuk.pendidikan.index') }}">Bentuk Pendidikan</a></li>
                            <li><a href="{{ route('dashboard.datamaster.ikatan.kerja.sdm.index') }}">Ikatan Kerja SDM</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jabatan.fungsional.index') }}">Jabatan Fungsional</a></li>
                            <li><a href="{{ route('dashboard.datamaster.jalur.masuk.index') }}">Jalur Masuk</a></li>
                        </ul>
                        <hr>
                    </li>


                    <li><a href="{{ route('dashboard.datamaster.kurikulum.index') }}">Kurikulum</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.mata.kuliah.index') }}">List Mata Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.mata.kuliah.index') }}">Mata Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.konversi.kampus.merdeka.index') }}">Konversi Kampus Merdeka</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.mata.kuliah.index') }}">Detail Mata Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.matkul.kurikulum.index') }}">Matkul Kurikulum</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.kurikulum.index') }}">Detail Kurikulum</a></li>
                    <li><a href="{{ route('dashboard.datamaster.rencana.pembelajaran.index') }}">Rencana Pembelajaran</a></li>
                    <li><a href="{{ route('dashboard.datamaster.mahasiswa.index') }}">Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.perkuliahan.mahasiswa.index') }}">List Perkuliahan Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.nilai.perkuliahan.mahasiswa.index') }}">List Nilai Perkuliahan Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.biodata.mahasiswa.index') }}">Biodata Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.data.lengkap.mahasiswa.prodi.index') }}">Data Lengkap Mahasiswa Prodi</a></li>
                    <li><a href="{{ route('dashboard.datamaster.bimbingan.mahasiswa.index') }}">Bimbingan Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.aktivitas.mahasiswa.index') }}">Aktivitas Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.aktivitas.mahasiswa.index') }}">List Aktivitas Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.perkuliahan.mahasiswa.index') }}">Detail Perkuliahan Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.data.terhapus.index') }}">Data Terhapus</a></li>
                    <li><a href="{{ route('dashboard.datamaster.krs.mahasiswa.index') }}">KRS Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.krs.nilai.index') }}">KRS Nilai</a></li>
                    <li><a href="{{ route('dashboard.datamaster.rekap.khs.mahasiswa.index') }}">Rekap KHS Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.rekap.krs.mahasiswa.index') }}">Rekap KRS Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.rekap.jumlah.dosen.index') }}">Rekap Jumlah Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.rencana.evaluasi.index') }}">List Rencana Evaluasi</a></li>
                    <li><a href="{{ route('dashboard.datamaster.dosen.index') }}">Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.dosen.pembimbing.index') }}">Dosen Pembimbing</a></li>
                    <li><a href="{{ route('dashboard.datamaster.dosen.penguji.index') }}">Dosen Penguji</a></li>
                    <li><a href="{{ route('dashboard.datamaster.kelas.kuliah.index') }}">Kelas Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.peserta.kelas.kuliah.index') }}">Peserta Kelas Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.nilai.perkuliahan.kelas.index') }}">List Nilai Perkuliahan Kelas</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.kelas.kuliah.index') }}">Detail Kelas Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.biodata.dosen.index') }}">Biodata Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.penugasan.dosen.index') }}">Penugasan Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.fungsional.dosen.index') }}">Riwayat Fungsional Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.pangkat.dosen.index') }}">Riwayat Pangkat Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.pendidikan.dosen.index') }}">Riwayat Pendidikan Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.sertifikasi.dosen.index') }}">Riwayat Sertifikasi Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.penelitian.dosen.index') }}">Riwayat Penelitian Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.mahasiswa.bimbingan.dosen.index') }}">Mahasiswa Bimbingan Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.penugasan.semua.dosen.index') }}">Penugasan Semua Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.aktivitas.mengajar.dosen.index') }}">Aktivitas Mengajar Dosen</a></li>
                    <li><a href="{{ route('dashboard.datamaster.dosen.pengajar.kelas.kuliah.index') }}">Dosen Pengajar Kelas Kuliah</a></li>
                    <li><a href="{{ route('dashboard.datamaster.perhitungan.sks.index') }}">Perhitungan SKS</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.nilai.perkuliahan.index') }}">Detail Nilai Perkuliahan</a></li>
                    <li><a href="{{ route('dashboard.datamaster.detail.nilai.perkuliahan.kelas.index') }}">Detail Nilai Perkuliahan Kelas</a></li>
                    <li><a href="{{ route('dashboard.datamaster.list.skala.nilai.prodi.index') }}">List Skala Nilai Prodi</a></li>
                    <li><a href="{{ route('dashboard.datamaster.nilai.perkuliahan.kelas.index') }}">Nilai Perkuliahan Kelas</a></li>
                    <li><a href="{{ route('dashboard.datamaster.riwayat.nilai.mahasiswa.index') }}">Riwayat Nilai Mahasiswa</a></li>
                    <li><a href="{{ route('dashboard.datamaster.periode.perkuliahan.index') }}">Periode Perkuliahan</a></li>
                    {{-- <li><a href="{{ route('dashboard.datamaster.nilai.transfer.pendidikan.mahasiswa.index') }}">Nilai Transfer Pendidikan Mahasiswa</a>
            </li> --}}
            <li><a href="{{ route('dashboard.datamaster.detail.periode.perkuliahan.index') }}">Detail Periode Perkuliahan</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.mahasiswa.index') }}">Export Data Mahasiswa</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.nilai.transfer.index') }}">Export Data Nilai Transfer</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.penugasan.dosen.index') }}">Export Data Penugasan Dosen</a></li>
            {{-- <li><a href="{{ route('dashboard.datamaster.export.data.penugasan.dosen.prodi.index') }}">Export Data Penugasan Dosen Prodi</a></li> --}}
            <li><a href="{{ route('dashboard.datamaster.export.data.matkul.prodi.index') }}">Export Data Matkul Prodi</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.aktivitas.kuliah.index') }}">Export Data Aktivitas Kuliah</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.kelas.perkuliahan.index') }}">Export Data Kelas Perkuliahan</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.mahasiswa.krs.index') }}">Export Data Mahasiswa KRS</a></li>
            <li><a href="{{ route('dashboard.datamaster.export.data.mahasiswa.lulus.index') }}">Export Data Mahasiswa Lulus</a></li>

        </ul>
        </li>
        {{-- <li><a class="ai-icon" href="{{ url('event-management') }}" aria-expanded="false">
        <i class="la la-calendar"></i>
        <span class="nav-text">Event Management</span>
        </a>
        </li> --}}
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-user"></i>
                <span class="nav-text">Dosen</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="#">All Dosen</a></li>
                <li><a href="#">Add Dosen</a></li>
                <li><a href="#">Edit Dosen</a></li>
                <li><a href="#">Dosen Profile</a></li>
                <li><a href="{{ route('dashboard.pengajuan-fungsional-dosen.index') }}">Pengajuan Jabatan Fungsional</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Mahasiswa</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.datamaster.status.mahasiswa.index') }}">Status Mahasiswa</a></li>
                <li><a href="#">Add Mahasiswa</a></li>
                <li><a href="#">Edit Mahasiswa</a></li>
                <li><a href="#">About Mahasiswa</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-graduation-cap"></i>
                <span class="nav-text">Mata Kuliah</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="#">All Matakuliah</a></li>
                <li><a href="#">Add MataKuliah</a></li>
                <li><a href="#">Edit MataKuliah</a></li>
                <li><a href="#">About Matakuliah</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-clipboard"></i>
                <span class="nav-text">Penilaian</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.komponen.index') }}">Komponen</a></li>
                <li><a href="{{ route('dashboard.bobot.komponen.index') }}">Bobot Komponen</a></li>
                <li><a href="{{ route('dashboard.pengaturan.komponen.index') }}">Pengaturan Komponen</a></li>
                <li><a href="{{ route('cetak.nilai.mahasiswa') }}">Cetak</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-id-badge"></i>
                <span class="nav-text">Kepegawaian</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.pegawai.index') }}">Pegawai</a></li>
                <li><a href="{{ route('dashboard.aset.index') }}">Aset</a></li>
                <li><a href="{{ route('dashboard.jabatan.index') }}">Jabatan</a></li>
                <li><a href="{{ route('dashboard.jabatan.struktural.index') }}">Jabatan Struktural</a></li>
                <li><a href="{{ route('dashboard.bidang.index') }}">Bidang</a></li>
                <li><a href="{{ route('dashboard.jenis.bidang.index') }}">Jenis Bidang</a></li>
                <li><a href="{{ route('dashboard.pengajuan-fungsional-pegawai.index') }}">Pengajuan Jabatan Fungsional</a></li>
                <li><a href="{{ route('dashboard.pengajuan-struktural-pegawai.index') }}">Pengajuan Jabatan Struktural</a></li>
                <li><a href="{{ route('dashboard.pengajuan-status-pegawai.index') }}">Pengajuan Status Pegawai</a></li>
            </ul>
        </li>
        @endunlessrole
        {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Library</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('all-library') }}">All Library</a></li>
        <li><a href="{{ url('add-library') }}">Add Library</a></li>
        <li><a href="{{ url('edit-library') }}">Edit Library</a></li>
        </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-building"></i>
                <span class="nav-text">Departments</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('all-departments') }}">All Departments</a></li>
                <li><a href="{{ url('add-departments') }}">Add Departments</a></li>
                <li><a href="{{ url('edit-departments') }}">Edit Departments</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Staff</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('all-staff') }}">All Staff</a></li>
                <li><a href="{{ url('add-staff') }}">Add Staff</a></li>
                <li><a href="{{ url('edit-staff') }}">Edit Staff</a></li>
                <li><a href="{{ url('staff-profile') }}">Staff Profile</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-gift"></i>
                <span class="nav-text">Holiday</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('all-holiday') }}">All Holiday</a></li>
                <li><a href="{{ url('add-holiday') }}">Add Holiday</a></li>
                <li><a href="{{ url('edit-holiday') }}">Edit Holiday</a></li>
                <li><a href="{{ url('holiday-calendar') }}">Holiday Calendar</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-dollar"></i>
                <span class="nav-text">Fees</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('fees-collection') }}">Fees Collection</a></li>
                <li><a href="{{ url('add-fees') }}">Add Fees</a></li>
                <li><a href="{{ url('fees-receipt') }}">Fees Receipt</a></li>
            </ul>
        </li>
        <li class="nav-label">Apps</li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Apps</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('app-profile') }}">Profile</a></li>
                <li><a href="{{ url('post-details') }}">Post Details</a></li>
                <li><a href="{{ url('edit-profile') }}">Edit Profile</a></li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('email-compose') }}">Compose</a></li>
                        <li><a href="{{ url('email-inbox') }}">Inbox</a></li>
                        <li><a href="{{ url('email-read') }}">Read</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('app-calender') }}">Calendar</a></li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('ecom-product-grid') }}">Product Grid</a></li>
                        <li><a href="{{ url('ecom-product-list') }}">Product List</a></li>
                        <li><a href="{{ url('ecom-product-detail') }}">Product Details</a></li>
                        <li><a href="{{ url('ecom-product-order') }}">Order</a></li>
                        <li><a href="{{ url('ecom-checkout') }}">Checkout</a></li>
                        <li><a href="{{ url('ecom-invoice') }}">Invoice</a></li>
                        <li><a href="{{ url('ecom-customers') }}">Customers</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                <i class="flaticon-381-database-1"></i>
                <span class="nav-text">CMS</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('content') }}">Content</a></li>
                <li><a href="{{ url('menu') }}">Menus</a></li>
                <li><a href="{{ url('email-template') }}">Email Template</a></li>
                <li><a href="{{ url('blog') }}">Blog</a></li>
                <li><a href="{{ url('content-add') }}">Add Content</a></li>
                <li><a href="{{ url('add-email') }}">Add Email</a></li>
                <li><a href="{{ url('add-blog') }}">Add Blog</a></li>
                <li><a href="{{ url('blog-category') }}">Blog Category</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="la la-signal"></i>
                <span class="nav-text">Charts</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('chart-flot') }}">Flot</a></li>
                <li><a href="{{ url('chart-morris') }}">Morris</a></li>
                <li><a href="{{ url('chart-chartjs') }}">Chartjs</a></li>
                <li><a href="{{ url('chart-chartist') }}">Chartist</a></li>
                <li><a href="{{ url('chart-sparkline') }}">Sparkline</a></li>
                <li><a href="{{ url('chart-peity') }}">Peity</a></li>
            </ul>
        </li>
        <li class="nav-label">Components</li>
        <li class="ui-menu"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="la la-globe"></i>
                <span class="nav-text">Bootstrap</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('ui-accordion') }}">Accordion</a></li>
                <li><a href="{{ url('ui-alert') }}">Alert</a></li>
                <li><a href="{{ url('ui-badge') }}">Badge</a></li>
                <li><a href="{{ url('ui-button') }}">Button</a></li>
                <li><a href="{{ url('ui-modal') }}">Modal</a></li>
                <li><a href="{{ url('ui-button-group') }}">Button Group</a></li>
                <li><a href="{{ url('ui-list-group') }}">List Group</a></li>
                <li><a href="{{ url('ui-media-object') }}">Media Object</a></li>
                <li><a href="{{ url('ui-card') }}">Cards</a></li>
                <li><a href="{{ url('ui-carousel') }}">Carousel</a></li>
                <li><a href="{{ url('ui-dropdown') }}">Dropdown</a></li>
                <li><a href="{{ url('ui-popover') }}">Popover</a></li>
                <li><a href="{{ url('ui-progressbar') }}">Progressbar</a></li>
                <li><a href="{{ url('ui-tab') }}">Tab</a></li>
                <li><a href="{{ url('ui-typography') }}">Typography</a></li>
                <li><a href="{{ url('ui-pagination') }}">Pagination</a></li>
                <li><a href="{{ url('ui-grid') }}">Grid</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-plus-square-o"></i>
                <span class="nav-text">Plugins</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('uc-select2') }}">Select 2</a></li>
                <li><a href="{{ url('uc-nestable') }}">Nestedable</a></li>
                <li><a href="{{ url('uc-noui-slider') }}">Noui Slider</a></li>
                <li><a href="{{ url('uc-sweetalert') }}">Sweet Alert</a></li>
                <li><a href="{{ url('uc-toastr') }}">Toastr</a></li>
                <li><a href="{{ url('map-jqvmap') }}">Jqv Map</a></li>
                <li><a href="{{ url('uc-lightgallery') }}">Light Gallery</a></li>
            </ul>
        </li>
        <li><a href="{{ url('widget-basic') }}" aria-expanded="false">
                <i class="la la-desktop"></i>
                <span class="nav-text">Widget</span>
            </a></li>
        <li class="nav-label">Forms</li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-file-text"></i>
                <span class="nav-text">Forms</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('form-element') }}">Form Elements</a></li>
                <li><a href="{{ url('form-wizard') }}">Wizard</a></li>
                <li><a href="{{ url('form-ckeditor') }}">CkEditor</a></li>
                <li><a href="{{ url('form-pickers') }}">Pickers</a></li>
                <li><a href="{{ url('form-validation') }}">Form Validate</a></li>
            </ul>
        </li>
        <li class="nav-label">Table</li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-table"></i>
                <span class="nav-text">Table</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('table-bootstrap-basic') }}">Bootstrap</a></li>
                <li><a href="{{ url('table-datatable-basic') }}">Datatable</a></li>
            </ul>
        </li>
        <li class="nav-label">Extra</li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-th-list"></i>
                <span class="nav-text">Pages</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('page-login') }}">Login</a></li>
                <li><a href="{{ url('page-register') }}">Register</a></li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('page-error-400') }}">Error 400</a></li>
                        <li><a href="{{ url('page-error-403') }}">Error 403</a></li>
                        <li><a href="{{ url('page-error-404') }}">Error 404</a></li>
                        <li><a href="{{ url('page-error-500') }}">Error 500</a></li>
                        <li><a href="{{ url('page-error-503') }}">Error 503</a></li>
                    </ul>
                </li>
                <li><a href="{{url('page-lock-screen')}}">Lock Screen</a></li>
            </ul>
        </li> --}}
        </ul>
        <div class="copyright">
            <p>SIA Politani © 2024 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by PBL Trpl</p>
        </div>
    </div>
</div>