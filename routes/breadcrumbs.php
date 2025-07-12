<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});


// Dashboard > Mahasiswa
Breadcrumbs::for('mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Mahasiswa', route('dashboard.datamaster.mahasiswa.index'));
});

Breadcrumbs::for('biodata-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Biodata Mahasiswa', route('dashboard.datamaster.biodata.mahasiswa.index'));
});

Breadcrumbs::for('prodi', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Prodi', route('dashboard.datamaster.prodi.index'));
});

Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('user', route('dashboard.datamaster.user.index'));
});

Breadcrumbs::for('dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dosen', route('dashboard.datamaster.dosen.index'));
});

Breadcrumbs::for('biodata-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Biodata Dosen', route('dashboard.datamaster.biodata.dosen.index'));
});

Breadcrumbs::for('aktivitas-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Aktivitas Mahasiswa', route('dashboard.datamaster.aktivitas.mahasiswa.index'));
});

Breadcrumbs::for('bimbingan-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Bimbingan Mahasiswa', route('dashboard.datamaster.bimbingan.mahasiswa.index'));
});

Breadcrumbs::for('detail-kelas-kuliah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Detail Kelas Kuliah', route('dashboard.datamaster.detail.kelas.kuliah.index'));
});

Breadcrumbs::for('dosen-pengajar-kelas-kuliah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dosen Pengajar Kelas Kuliah', route('dashboard.datamaster.dosen.pengajar.kelas.kuliah.index'));
});

Breadcrumbs::for('komponen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Komponen', route('dashboard.komponen.index'));
});
Breadcrumbs::for('aset', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('aset', route('dashboard.aset.index'));
});
Breadcrumbs::for('pengajuan-fungsional-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengajuan Jabatan Fungsional Dosen', route('dashboard.pengajuan-fungsional-dosen.index'));
});
Breadcrumbs::for('pengajuan-fungsional-pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengajuan Jabatan Fungsional Pegawai', route('dashboard.pengajuan-fungsional-pegawai.index'));
});
Breadcrumbs::for('pengajuan-struktural-pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengajuan Jabatan Struktural Pegawai', route('dashboard.pengajuan-struktural-pegawai.index'));
});
Breadcrumbs::for('pengajuan-status-pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengajuan Jabatan Status Pegawai', route('dashboard.pengajuan-status-pegawai.index'));
});

Breadcrumbs::for('bobot-komponen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('bobot-Komponen', route('dashboard.bobot.komponen.index'));
});

Breadcrumbs::for('pengaturan-komponen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('pengaturan-Komponen', route('dashboard.pengaturan.komponen.index'));
});

Breadcrumbs::for('jabatan-struktural', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('jabatan-struktural', route('dashboard.jabatan.struktural.index'));
});

Breadcrumbs::for('agama', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Agama', route('dashboard.datamaster.agama.index'));
});

Breadcrumbs::for('bentuk-pendidikan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Bentuk Pendidikan', route('dashboard.datamaster.bentuk.pendidikan.index'));
});

Breadcrumbs::for('ikatan-kerja-sdm', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Ikatan Kerja SDM', route('dashboard.datamaster.ikatan.kerja.sdm.index'));
});
Breadcrumbs::for('jalur-masuk', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Jalur Masuk', route('dashboard.datamaster.jalur.masuk.index'));
});

Breadcrumbs::for('nilai-perkuliahan-kelas', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Nilai Perkuliahan Kelas', route('dashboard.datamaster.nilai.perkuliahan.kelas.index'));
});

Breadcrumbs::for('detail nilai perkuliahan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Detail Nilai Perkuliahan', route('dashboard.datamaster.detail.nilai.perkuliahan.kelas.index'));
});

Breadcrumbs::for('riwayat-penelitian-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Penelitian Dosen', route('dashboard.datamaster.riwayat.penelitian.dosen.index'));
});

Breadcrumbs::for('wilayah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Wilayah', route('dashboard.datamaster.wilayah.index'));
});

Breadcrumbs::for('riwayat-sertifikasi-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Sertifikasi Dosen', route('dashboard.datamaster.riwayat.sertifikasi.dosen.index'));
});

Breadcrumbs::for('export-data-mahasiswa-lulus', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Mahasiswa Lulus', route('dashboard.datamaster.export.data.mahasiswa.lulus.index'));
});

Breadcrumbs::for('dosen-pembimbing', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dosen Pembimbing', route('dashboard.datamaster.dosen.pembimbing.index'));
});

Breadcrumbs::for('riwayat-pangkat-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Pangkat Dosen', route('dashboard.datamaster.riwayat.pangkat.dosen.index'));
});

Breadcrumbs::for('riwayat-nilai-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Riwayat Nilai Mahasiswa', route('dashboard.datamaster.riwayat.nilai.mahasiswa.index'));
});

Breadcrumbs::for('data-terhapus', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Data Terhapus', route('dashboard.datamaster.data.terhapus.index'));
});

Breadcrumbs::for('status-kepegawaian', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Status Kepegawaian', route('dashboard.datamaster.status.kepegawaian.index'));
});

Breadcrumbs::for('rekap-krs-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Rekap Krs Mahasiswa', route('dashboard.datamaster.rekap.krs.mahasiswa.index'));
});

Breadcrumbs::for('rekap-jumlah-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Rekap Jumlah Dosen', route('dashboard.datamaster.rekap.jumlah.dosen.index'));
});

Breadcrumbs::for('status-keaktifan-pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Status Keaktifan Pegawlai', route('dashboard.datamaster.status.keaktifan.pegawai.index'));
});

Breadcrumbs::for('list-mata-kuliah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('List Mata Kuliah', route('dashboard.datamaster.status.keaktifan.pegawai.index'));
});

Breadcrumbs::for('detail-periode-perkuliahan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Detail Periode Perkuliahan', route('dashboard.datamaster.detail.periode.perkuliahan.index'));
});

Breadcrumbs::for('export-data-mahasiswa-krs', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Mahasiswa Krs', route('dashboard.datamaster.export.data.mahasiswa.index'));
});

Breadcrumbs::for('export-data-kelas-perkuliahan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Kelas Perkuliahan', route('dashboard.datamaster.export.data.kelas.perkuliahan.index'));
});

Breadcrumbs::for('export-data-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Mahasiswa', route('dashboard.datamaster.export.data.mahasiswa.index'));
});

Breadcrumbs::for('export-data-nilai-transfer', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Nilai Transfer', route('dashboard.datamaster.export.data.nilai.transfer.index'));
});

Breadcrumbs::for('periode-perkuliahan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Periode Perkuliahan', route('dashboard.datamaster.periode.perkuliahan.index'));
});

Breadcrumbs::for('pangkat-golongan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pangkat Golongan', route('dashboard.datamaster.pangkat.golongan.index'));
});

Breadcrumbs::for('pekerjaan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pekerjaan', route('dashboard.datamaster.pekerjaan.index'));
});

Breadcrumbs::for('alat-transportasi', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Alat Transportasi', route('dashboard.datamaster.alat.transportasi.index'));
});

Breadcrumbs::for('periode', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Periode', route('dashboard.datamaster.periode.index'));
});

Breadcrumbs::for('export-data-penugasan-dosen', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Penugasan Dosen', route('dashboard.datamaster.export.data.penugasan.dosen.index'));
});

Breadcrumbs::for('export-data-matkul-prodi', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Matkul Prodi', route('dashboard.datamaster.export.data.matkul.prodi.index'));
});

Breadcrumbs::for('export-data-aktivitas-kuliah', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export Data Aktivitas Kuliah', route('dashboard.datamaster.export.data.aktivitas.kuliah.index'));
});

Breadcrumbs::for('krs-mahasiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Krs Mahasiswa', route('dashboard.datamaster.krs.mahasiswa.index'));
});

Breadcrumbs::for('nilai-transfer-pemhas', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Nilai Transfer Pendidikan Mahasiswa', route('dashboard.datamaster.nilai.transfer.pemhas.index'));
});

Breadcrumbs::for('konversi-kampus-merdeka', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Konversi Kampus Merdeka', route('dashboard.datamaster.konversi.kampus.merdeka.index'));
});

//
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Role', route('roles.index'));
});


// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
