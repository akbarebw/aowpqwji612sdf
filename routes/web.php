<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\VerifikasiEmail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Dashboard\AsetController;
use App\Http\Controllers\Dashboard\CetakController;
use App\Http\Controllers\Dashboard\BidangController;
use App\Http\Controllers\Dashboard\JabatanController;
use App\Http\Controllers\Dashboard\PegawaiController;
use App\Http\Controllers\Auth\KeycloakLoginController;
use App\Http\Controllers\Dashboard\KomponenController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PengajuanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Dashboard\JenisBidangController;
use App\Http\Controllers\Dashboard\BobotKomponenController;
use App\Http\Controllers\Dashboard\NilaiMahasiswaController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\DataMaster\UserController;
use App\Http\Controllers\WebsiteController\WebsiteController;
use App\Http\Controllers\Dashboard\DataMaster\AgamaController;
use App\Http\Controllers\Dashboard\DataMaster\DosenController;
use App\Http\Controllers\Dashboard\DataMaster\ProdiController;
use App\Http\Controllers\Dashboard\DataMaster\NegaraController;
use App\Http\Controllers\Dashboard\JabatanStrukturalController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodeController;
use App\Http\Controllers\Dashboard\DataMaster\WilayahController;
use App\Http\Controllers\Dashboard\PengaturanKomponenController;
use App\Http\Controllers\Dashboard\DataMaster\JenisSmsController;
use App\Http\Controllers\Dashboard\DataMaster\KrsNilaiController;
use App\Http\Controllers\Dashboard\DataMaster\ProfilPtController;
use App\Http\Controllers\Dashboard\DataMaster\SemesterController;
use App\Http\Controllers\Dashboard\DataMaster\KurikulumController;
use App\Http\Controllers\Dashboard\DataMaster\MahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\PekerjaanController;
use App\Http\Controllers\Dashboard\DataMaster\JalurMasukController;
use App\Http\Controllers\Dashboard\DataMaster\MataKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\PembiayaanController;
use App\Http\Controllers\Dashboard\DataMaster\JenisKeluarController;
use App\Http\Controllers\Dashboard\DataMaster\KelasKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\PenghasilanController;
use App\Http\Controllers\Dashboard\DataMaster\TahunAjaranController;
use App\Http\Controllers\Dashboard\PengajuanStatusPegawaiController;
use App\Http\Controllers\Dashboard\DataMaster\BiodataDosenController;
use App\Http\Controllers\Dashboard\DataMaster\DataTerhapusController;
use App\Http\Controllers\Dashboard\DataMaster\DosenPengujiController;
use App\Http\Controllers\Dashboard\DataMaster\JenisTinggalController;
use App\Http\Controllers\Dashboard\DataMaster\KrsMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\LevelWilayahController;
use App\Http\Controllers\Dashboard\DataMaster\JalurEvaluasiController;
use App\Http\Controllers\Dashboard\DataMaster\JenisEvaluasiController;
use App\Http\Controllers\Dashboard\DataMaster\JenisPrestasiController;
use App\Http\Controllers\Dashboard\PengajuanFungsionalDosenController;
use App\Http\Controllers\Dashboard\DataMaster\IkatanKerjaSDMController;
use App\Http\Controllers\Dashboard\DataMaster\JenisAktivitasController;
use App\Http\Controllers\Dashboard\DataMaster\JenisSubstansiController;
use App\Http\Controllers\Dashboard\DataMaster\ListMataKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\PenugasanDosenController;
use App\Http\Controllers\Dashboard\DataMaster\PerhitunganSKSController;
use App\Http\Controllers\Dashboard\DataMaster\DetailKurikulumController;
use App\Http\Controllers\Dashboard\DataMaster\DosenPembimbingController;
use App\Http\Controllers\Dashboard\DataMaster\KebutuhanKhususController;
use App\Http\Controllers\Dashboard\DataMaster\MatkulKurikulumController;
use App\Http\Controllers\Dashboard\DataMaster\PangkatGolonganController;
use App\Http\Controllers\Dashboard\DataMaster\StatusMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\TingkatPrestasiController;
use App\Http\Controllers\Dashboard\PengajuanFungsionalPegawaiController;
use App\Http\Controllers\Dashboard\PengajuanStrukturalPegawaiController;
use App\Http\Controllers\Dashboard\DataMaster\AlatTransportasiController;
use App\Http\Controllers\Dashboard\DataMaster\BentukPendidikanController;
use App\Http\Controllers\Dashboard\DataMaster\BiodataMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\DetailMataKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\JenisPendaftaranController;
use App\Http\Controllers\Dashboard\DataMaster\JenisSertifikasiController;
use App\Http\Controllers\Dashboard\DataMaster\KategoriKegiatanController;
use App\Http\Controllers\Dashboard\DataMaster\RekapJumlahDosenController;
use App\Http\Controllers\Dashboard\DataMaster\DetailKelasKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\JabatanFungsionalController;
use App\Http\Controllers\Dashboard\DataMaster\JenjangPendidikanController;
use App\Http\Controllers\Dashboard\DataMaster\LembagaPengangkatController;
use App\Http\Controllers\Dashboard\DataMaster\RekapKhsMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\RekapKrsMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\StatusKepegawaianController;
use App\Http\Controllers\Dashboard\DataMaster\AktivitasMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\BimbinganMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodePerkuliahanController;
use App\Http\Controllers\Dashboard\DataMaster\PesertaKelasKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\ListRencanaEvaluasiController;
use App\Http\Controllers\Dashboard\DataMaster\ListSkalaNilaiProdiController;
use App\Http\Controllers\Dashboard\DataMaster\PenugasanSemuaDosenController;
use App\Http\Controllers\Dashboard\DataMaster\RencanaPembelajaranController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatPangkatDosenController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataMatkulProdiController;
use App\Http\Controllers\Dashboard\DataMaster\NilaiPerkuliahanKelasController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatNilaiMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\AktivitasMengajarDosenController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataMahasiswaKrsController;
use App\Http\Controllers\Dashboard\DataMaster\ListAktivitasMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatFungsionalDosenController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatPendidikanDosenController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatPenelitianDosenController;
use App\Http\Controllers\Dashboard\DataMaster\StatusKeaktifanPegawaiController;
use App\Http\Controllers\Dashboard\PengajuanJabatanFungsionalPegawaiController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataNilaiTransferController;
use App\Http\Controllers\Dashboard\DataMaster\MahasiswaBimbinganDosenController;
use App\Http\Controllers\Dashboard\DataMaster\RiwayatSertifikasiDosenController;
use App\Http\Controllers\Dashboard\DataMaster\DetailPeriodePerkuliahanController;
use App\Http\Controllers\Dashboard\DataMaster\DosenPengajarKelasKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataMahasiswaLulusController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataPenugasanDosenController;
use App\Http\Controllers\Dashboard\DataMaster\ListPerkuliahanMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataAktivitasKuliahController;
use App\Http\Controllers\Dashboard\DataMaster\ListNilaiPerkuliahanKelasController;
use App\Http\Controllers\Dashboard\DataMaster\DetailPerkuliahanMahasiswaController;
use App\Http\Controllers\Dashboard\DataMaster\ExportDataKelasPerkuliahanController;
use App\Http\Controllers\Dashboard\DataMaster\DetailNilaiPerkuliahanKelasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

// Route::get('login/keycloak', [KeycloakLoginController::class, 'redirectToKeycloak'])->name('login.keycloak');
// Route::get('/callback', [KeycloakLoginController::class, 'handleKeycloakCallback']);
// Route::post('/logout', [KeycloakLoginController::class, 'logout'])->name('logout');


// // Auth::routes();

// Route::get('/', function () {
//     return redirect()->route('login');
// });


Route::get('login/keycloak', [KeycloakLoginController::class, 'redirectToKeycloak'])->name('login.keycloak');
Route::get('/login', function () {
    return redirect()->route('login.keycloak');
})->name('login');
Route::get('/callback', [KeycloakLoginController::class, 'handleKeycloakCallback']);
Route::post('/logout', [KeycloakLoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    // sia politani Do Code Here
    // Route::group(['middleware' => ['auth','verified']], function () {
    // Route::get('/', [\App\Http\Controllers\WebsiteController\WebsiteController::class,'index'])->name('beranda');

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
        Route::get('/', DashboardController::class)->name('dashboard.index');
        Route::get('/cetak', [CetakController::class, 'index'])->name('cetak.nilai.mahasiswa');
        Route::get('/transkrip', [CetakController::class, 'transkrip'])->name('cetak.transkrip.mahasiswa');
        Route::get('/cetak-khs/{id_mahasiswa}/pdf', [CetakController::class, 'cetakPdf'])->name('cetak.khs.pdf');  // Cetak PDF


        Route::get('nilai', [NilaiMahasiswaController::class, 'index'])->name('dashboard.datamaster.nilai.index');
        Route::get('/get-semester-tempuh', [NilaiMahasiswaController::class, 'getSemesterTempuh'])->name('get.semester_tempuh');
        Route::get('/get-kelas', [NilaiMahasiswaController::class, 'getKelas'])->name('get.kelas');
        Route::get('/get-jenjang-mata-kuliah', [NilaiMahasiswaController::class, 'getJenjangMataKuliah'])->name('get.jenjang.mata_kuliah');

        Route::resource('komponen', KomponenController::class, ['names' => 'dashboard.komponen']);
        Route::resource('bobot-komponen', BobotKomponenController::class, ['names' => 'dashboard.bobot.komponen']);
        Route::resource('aset', AsetController::class, ['names' => 'dashboard.aset']);
        Route::resource('bidang', BidangController::class, ['names' => 'dashboard.bidang']);
        Route::resource('jabatan', JabatanController::class, ['names' => 'dashboard.jabatan']);
        Route::resource('jenis-bidang', JenisBidangController::class, ['names' => 'dashboard.jenis.bidang']);
        Route::resource('jabatan-struktural', JabatanStrukturalController::class, ['names' => 'dashboard.jabatan.struktural']);

        // pengajuan fungsional pegawai
        Route::get('pengajuan-fungsional-pegawai/persetujuan/{id}', [PengajuanFungsionalPegawaiController::class, 'persetujuan'])->name('dashboard.pengajuan-fungsional-pegawai.persetujuan');
        Route::post('pengajuan-fungsional-pegawai/persetujuan/setujui/{id}', [PengajuanFungsionalPegawaiController::class, 'approve'])->name('dashboard.pengajuan-fungsional-pegawai.approve');
        Route::post('pengajuan-fungsional-pegawai/persetujuan/tolak/{id}', [PengajuanFungsionalPegawaiController::class, 'reject'])->name('dashboard.pengajuan-fungsional-pegawai.reject');
        Route::resource('pengajuan-fungsional-pegawai', PengajuanFungsionalPegawaiController::class, ['names' => 'dashboard.pengajuan-fungsional-pegawai']);
        // end pengajuan fungsional pegawai

        // pengajuan jabatan struktural pegawai
        Route::get('pengajuan-struktural-pegawai/persetujuan/{id}', [PengajuanStrukturalPegawaiController::class, 'persetujuan'])->name('dashboard.pengajuan-struktural-pegawai.persetujuan');
        Route::post('pengajuan-struktural-pegawai/persetujuan/setujui/{id}', [PengajuanStrukturalPegawaiController::class, 'approve'])->name('dashboard.pengajuan-struktural-pegawai.approve');
        Route::post('pengajuan-struktural-pegawai/persetujuan/tolak/{id}', [PengajuanStrukturalPegawaiController::class, 'reject'])->name('dashboard.pengajuan-struktural-pegawai.reject');
        Route::resource('pengajuan-struktural-pegawai', PengajuanStrukturalPegawaiController::class, ['names' => 'dashboard.pengajuan-struktural-pegawai']);
        // end pengajuan jabatan struktural pegawai

        // pengajuan status pegawai
        Route::get('pengajuan-status-pegawai/persetujuan/{id}', [PengajuanStatusPegawaiController::class, 'persetujuan'])->name('dashboard.pengajuan-status-pegawai.persetujuan');
        Route::post('pengajuan-status-pegawai/persetujuan/setujui/{id}', [PengajuanStatusPegawaiController::class, 'approve'])->name('dashboard.pengajuan-status-pegawai.approve');
        Route::post('pengajuan-status-pegawai/persetujuan/tolak/{id}', [PengajuanStatusPegawaiController::class, 'reject'])->name('dashboard.pengajuan-status-pegawai.reject');
        Route::resource('pengajuan-status-pegawai', PengajuanStatusPegawaiController::class, ['names' => 'dashboard.pengajuan-status-pegawai']);
        // end pengajuan status pegawai

        // pengajuan fungsional dosen
        Route::get('pengajuan-fungsional-dosen/persetujuan/{id}', [PengajuanFungsionalDosenController::class, 'persetujuan'])->name('dashboard.pengajuan-fungsional-dosen.persetujuan');
        Route::post('pengajuan-fungsional-dosen/persetujuan/setujui/{id}', [PengajuanFungsionalDosenController::class, 'approve'])->name('dashboard.pengajuan-fungsional-dosen.approve');
        Route::post('pengajuan-fungsional-dosen/persetujuan/tolak/{id}', [PengajuanFungsionalDosenController::class, 'reject'])->name('dashboard.pengajuan-fungsional-dosen.reject');
        Route::resource('pengajuan-fungsional-dosen', PengajuanFungsionalDosenController::class, ['names' => 'dashboard.pengajuan-fungsional-dosen']);
        // end pengajuan fungsional dosen


        Route::resource('pegawai', PegawaiController::class, ['names' => 'dashboard.pegawai']);
        Route::resource('pengaturan-komponen', PengaturanKomponenController::class, ['names' => 'dashboard.pengaturan.komponen']);

        Route::group(['prefix' => 'data-master'], function () {

            Route::group(['prefix' => 'referensi'], function () {
                Route::resource('agama', AgamaController::class, ['names' => 'dashboard.datamaster.agama']);
                Route::resource('bentuk-pendidikan', BentukPendidikanController::class, ['names' => 'dashboard.datamaster.bentuk.pendidikan']);
                Route::resource('ikatan-kerja-sdm', IkatanKerjaSDMController::class, ['names' => 'dashboard.datamaster.ikatan.kerja.sdm']);
                Route::resource('jabatan-fungsional', JabatanFungsionalController::class, ['names' => 'dashboard.datamaster.jabatan.fungsional']);
                Route::resource('jalur-masuk', JalurMasukController::class, ['names' => 'dashboard.datamaster.jalur.masuk']);
                Route::resource('jalur-evaluasi', JalurEvaluasiController::class, ['names' => 'dashboard.datamaster.jalur.evaluasi']);
                Route::resource('jenis-keluar', JenisKeluarController::class, ['names' => 'dashboard.datamaster.jenis.keluar']);
                Route::resource('jenis-sertifikasi', JenisSertifikasiController::class, ['names' => 'dashboard.datamaster.jenis.sertifikasi']);
                Route::resource('jenis-pendaftaran', JenisPendaftaranController::class, ['names' => 'dashboard.datamaster.jenis.pendaftaran']);
                Route::resource('jenis-sms', JenisSmsController::class, ['names' => 'dashboard.datamaster.jenis.sms']);
                Route::resource('jenis-tinggal', JenisTinggalController::class, ['names' => 'dashboard.datamaster.jenis.tinggal']);
                Route::resource('jenjang-pendidikan', JenjangPendidikanController::class, ['names' => 'dashboard.datamaster.jenjang.pendidikan']);
                Route::resource('kebutuhan-khusus', KebutuhanKhususController::class, ['names' => 'dashboard.datamaster.kebutuhan.khusus']);
                Route::resource('lembaga-pengangkat', LembagaPengangkatController::class, ['names' => 'dashboard.datamaster.lembaga.pengangkat']);
                Route::resource('negara', NegaraController::class, ['names' => 'dashboard.datamaster.negara']);
                Route::resource('level-wilayah', LevelWilayahController::class, ['names' => 'dashboard.datamaster.level.wilayah']);
                Route::resource('wilayah', WilayahController::class, ['names' => 'dashboard.datamaster.wilayah']);
                Route::resource('tahun-ajaran', TahunAjaranController::class, ['names' => 'dashboard.datamaster.tahun.ajaran']);
                Route::resource('status-mahasiswa', StatusMahasiswaController::class, ['names' => 'dashboard.datamaster.status.mahasiswa']);
                Route::resource('status-kepegawaian', StatusKepegawaianController::class, ['names' => 'dashboard.datamaster.status.kepegawaian']);
                Route::resource('status-keaktifan-pegawai', StatusKeaktifanPegawaiController::class, ['names' => 'dashboard.datamaster.status.keaktifan.pegawai']);
                Route::resource('semester', SemesterController::class, ['names' => 'dashboard.datamaster.semester']);
                Route::resource('penghasilan', PenghasilanController::class, ['names' => 'dashboard.datamaster.penghasilan']);
                Route::resource('pekerjaan', PekerjaanController::class, ['names' => 'dashboard.datamaster.pekerjaan']);
                Route::resource('pangkat-golongan', PangkatGolonganController::class, ['names' => 'dashboard.datamaster.pangkat.golongan']);
                Route::resource('alat-transportasi', AlatTransportasiController::class, ['names' => 'dashboard.datamaster.alat.transportasi']);
                Route::resource('pembiayaan', PembiayaanController::class, ['names' => 'dashboard.datamaster.pembiayaan']);
                Route::resource('jenis-prestasi', JenisPrestasiController::class, ['names' => 'dashboard.datamaster.jenis.prestasi']);
                Route::resource('tingkat-prestasi', TingkatPrestasiController::class, ['names' => 'dashboard.datamaster.tingkat.prestasi']);
                Route::resource('kategori-kegiatan', KategoriKegiatanController::class, ['names' => 'dashboard.datamaster.kategori.kegiatan']);
                Route::resource('jenis-evaluasi', JenisEvaluasiController::class, ['names' => 'dashboard.datamaster.jenis.evaluasi']);
                Route::resource('jenis-substansi', JenisSubstansiController::class, ['names' => 'dashboard.datamaster.jenis.substansi']);
                Route::resource('profil-pt', ProfilPTController::class, ['names' => 'dashboard.datamaster.profil.pt']);
                Route::resource('prodi', ProdiController::class, ['names' => 'dashboard.datamaster.prodi']);
                Route::resource('periode', PeriodeController::class, ['names' => 'dashboard.datamaster.periode']);
            });

            Route::resource('kurikulum', KurikulumController::class, ['names' => 'dashboard.datamaster.kurikulum']);
            Route::resource('list-mata-kuliah', ListMataKuliahController::class, ['names' => 'dashboard.datamaster.list.mata.kuliah']);
            Route::resource('mata-kuliah', MataKuliahController::class, ['names' => 'dashboard.datamaster.mata.kuliah']);
            Route::resource('konversi-kampus-merdeka', KonversiKampusMerdekaController::class, ['names' => 'dashboard.datamaster.konversi.kampus.merdeka']);
            Route::resource('detail-mata-kuliah', DetailMataKuliahController::class, ['names' => 'dashboard.datamaster.detail.mata.kuliah']);
            Route::resource('matkul-kurikulum', MatkulKurikulumController::class, ['names' => 'dashboard.datamaster.matkul.kurikulum']);
            Route::resource('detail-kurikulum', DetailKurikulumController::class, ['names' => 'dashboard.datamaster.detail.kurikulum']);
            Route::resource('rencana-pembelajaran', RencanaPembelajaranController::class, ['names' => 'dashboard.datamaster.rencana.pembelajaran']);
            Route::resource('mahasiswa', MahasiswaController::class, ['names' => 'dashboard.datamaster.mahasiswa']);
            Route::resource('list-perkuliahan-mahasiswa', ListPerkuliahanMahasiswaController::class, ['names' => 'dashboard.datamaster.list.perkuliahan.mahasiswa']);
            Route::resource('list-nilai-perkuliahan-mahasiswa', ListNilaiPerkuliahanMahasiswaController::class, ['names' => 'dashboard.datamaster.list.nilai.perkuliahan.mahasiswa']);
            Route::resource('biodata-mahasiswa', BiodataMahasiswaController::class, ['names' => 'dashboard.datamaster.biodata.mahasiswa']);
            Route::resource('data-lengkap-mahasiswa-prodi', DataLengkapMahasiswaProdiController::class, ['names' => 'dashboard.datamaster.data.lengkap.mahasiswa.prodi']);
            Route::resource('bimbingan-mahasiswa', BimbinganMahasiswaController::class, ['names' => 'dashboard.datamaster.bimbingan.mahasiswa']);
            Route::resource('jenis-aktivitas', JenisAktivitasController::class, ['names' => 'dashboard.datamaster.jenis.aktivitas']);
            Route::resource('aktivitas-mahasiswa', AktivitasMahasiswaController::class, ['names' => 'dashboard.datamaster.aktivitas.mahasiswa']);
            Route::resource('list-aktivitas-mahasiswa', ListAktivitasMahasiswaController::class, ['names' => 'dashboard.datamaster.list.aktivitas.mahasiswa']);
            Route::resource('detail-perkuliahan-mahasiswa', DetailPerkuliahanMahasiswaController::class, ['names' => 'dashboard.datamaster.detail.perkuliahan.mahasiswa']);
            Route::resource('data-terhapus', DataTerhapusController::class, ['names' => 'dashboard.datamaster.data.terhapus']);
            Route::resource('krs-mahasiswa', KrsMahasiswaController::class, ['names' => 'dashboard.datamaster.krs.mahasiswa']);
            Route::resource('krs-nilai', KrsNilaiController::class, ['names' => 'dashboard.datamaster.krs.nilai']);
            Route::resource('rekap-khs-mahasiswa', RekapKhsMahasiswaController::class, ['names' => 'dashboard.datamaster.rekap.khs.mahasiswa']);
            Route::resource('rekap-krs-mahasiswa', RekapKrsMahasiswaController::class, ['names' => 'dashboard.datamaster.rekap.krs.mahasiswa']);
            Route::resource('rekap-jumlah-dosen', RekapJumlahDosenController::class, ['names' => 'dashboard.datamaster.rekap.jumlah.dosen']);
            Route::resource('list-rencana-evaluasi', ListRencanaEvaluasiController::class, ['names' => 'dashboard.datamaster.list.rencana.evaluasi']);
            Route::resource('dosen', DosenController::class, ['names' => 'dashboard.datamaster.dosen']);
            Route::resource('dosen-pembimbing', DosenPembimbingController::class, ['names' => 'dashboard.datamaster.dosen.pembimbing']);
            Route::resource('dosen-penguji', DosenPengujiController::class, ['names' => 'dashboard.datamaster.dosen.penguji']);
            Route::resource('kelas-kuliah', KelasKuliahController::class, ['names' => 'dashboard.datamaster.kelas.kuliah']);
            Route::resource('peserta-kelas-kuliah', PesertaKelasKuliahController::class, ['names' => 'dashboard.datamaster.peserta.kelas.kuliah']);
            Route::resource('list-nilai-perkuliahan-kelas', ListNilaiPerkuliahanKelasController::class, ['names' => 'dashboard.datamaster.list.nilai.perkuliahan.kelas']);
            Route::resource('detail-kelas-kuliah', DetailKelasKuliahController::class, ['names' => 'dashboard.datamaster.detail.kelas.kuliah']);
            Route::resource('biodata-dosen', BiodataDosenController::class, ['names' => 'dashboard.datamaster.biodata.dosen']);
            Route::resource('penugasan-dosen', PenugasanDosenController::class, ['names' => 'dashboard.datamaster.penugasan.dosen']);
            Route::resource('riwayat-fungsional-dosen', RiwayatFungsionalDosenController::class, ['names' => 'dashboard.datamaster.riwayat.fungsional.dosen']);
            Route::resource('riwayat-pangkat-dosen', RiwayatPangkatDosenController::class, ['names' => 'dashboard.datamaster.riwayat.pangkat.dosen']);
            Route::resource('riwayat-pendidikan-dosen', RiwayatPendidikanDosenController::class, ['names' => 'dashboard.datamaster.riwayat.pendidikan.dosen']);
            Route::resource('riwayat-sertifikasi-dosen', RiwayatSertifikasiDosenController::class, ['names' => 'dashboard.datamaster.riwayat.sertifikasi.dosen']);
            Route::resource('riwayat-penelitian-dosen', RiwayatPenelitianDosenController::class, ['names' => 'dashboard.datamaster.riwayat.penelitian.dosen']);
            Route::resource('mahasiswa-bimbingan-dosen', MahasiswaBimbinganDosenController::class, ['names' => 'dashboard.datamaster.mahasiswa.bimbingan.dosen']);
            Route::resource('penugasan-semua-dosen', PenugasanSemuaDosenController::class, ['names' => 'dashboard.datamaster.penugasan.semua.dosen']);
            Route::resource('aktivitas-mengajar-dosen', AktivitasMengajarDosenController::class, ['names' => 'dashboard.datamaster.aktivitas.mengajar.dosen']);
            Route::resource('dosen-pengajar-kelas-kuliah', DosenPengajarKelasKuliahController::class, ['names' => 'dashboard.datamaster.dosen.pengajar.kelas.kuliah']);
            Route::resource('perhitungan-sks', PerhitunganSKSController::class, ['names' => 'dashboard.datamaster.perhitungan.sks']);
            Route::resource('detail-nilai-perkuliahan', DetailNilaiPerkuliahanController::class, ['names' => 'dashboard.datamaster.detail.nilai.perkuliahan']);
            Route::resource('detail-nilai-perkuliahan-kelas', DetailNilaiPerkuliahanKelasController::class, ['names' => 'dashboard.datamaster.detail.nilai.perkuliahan.kelas']);
            Route::resource('list-skala-nilai-prodi', ListSkalaNilaiProdiController::class, ['names' => 'dashboard.datamaster.list.skala.nilai.prodi']);
            Route::resource('nilai-perkuliahan-kelas', NilaiPerkuliahanKelasController::class, ['names' => 'dashboard.datamaster.nilai.perkuliahan.kelas']);
            Route::resource('riwayat-nilai-mahasiswa', RiwayatNilaiMahasiswaController::class, ['names' => 'dashboard.datamaster.riwayat.nilai.mahasiswa']);
            Route::resource('periode-perkuliahan', PeriodePerkuliahanController::class, ['names' => 'dashboard.datamaster.periode.perkuliahan']);
            // Route::resource('nilai-transfer-pendidikan-mahasiswa', NilaiTransferPendidikanMahasiswa::class, ['names' => 'dashboard.datamaster.nilai.transfer.pendidikan.mahasiswa']);
            Route::resource('detail-periode-perkuliahan', DetailPeriodePerkuliahanController::class, ['names' => 'dashboard.datamaster.detail.periode.perkuliahan']);
            Route::resource('export-data-mahasiswa', ExportDataMahasiswaController::class, ['names' => 'dashboard.datamaster.export.data.mahasiswa']);
            Route::resource('export-data-nilai-transfer', ExportDataNilaiTransferController::class, ['names' => 'dashboard.datamaster.export.data.nilai.transfer']);
            Route::resource('export-data-penugasan-dosen', ExportDataPenugasanDosenController::class, ['names' => 'dashboard.datamaster.export.data.penugasan.dosen']);
            // Route::resource('export-data-penugasan-dosen-prodi', ExportDataPenugasanDosenProdiController::class, ['names' => 'dashboard.datamaster.export.data.penugasan.dosen.prodi']);
            Route::resource('export-data-matkul-prodi', ExportDataMatkulProdiController::class, ['names' => 'dashboard.datamaster.export.data.matkul.prodi']);
            Route::resource('export-data-aktivitas-kuliah', ExportDataAktivitasKuliahController::class, ['names' => 'dashboard.datamaster.export.data.aktivitas.kuliah']);
            Route::resource('export-data-kelas-perkuliahan', ExportDataKelasPerkuliahanController::class, ['names' => 'dashboard.datamaster.export.data.kelas.perkuliahan']);
            Route::resource('export-data-mahasiswa-krs', ExportDataMahasiswaKrsController::class, ['names' => 'dashboard.datamaster.export.data.mahasiswa.krs']);
            Route::resource('export-data-mahasiswa-lulus', ExportDataMahasiswaLulusController::class, ['names' => 'dashboard.datamaster.export.data.mahasiswa.lulus']);
        });


        Route::resource('user', UserController::class, ['names' => 'dashboard.datamaster.user']);
        Route::post('/users', [UserController::class, 'store'])->name('dashboard.datamaster.user.store');

        Route::group(['prefix' => 'pengaturan'], function () {
            Route::resource('permission', PermissionController::class, ['names' => 'dashboard.pengaturan.permission']);
        });

        Route::group(['prefix' => 'datas'], function () {
            // Julia & Anis
            Route::get('komponen', [KomponenController::class, 'data_table'])->name('komponen.data_table');
            Route::get('aset', [AsetController::class, 'data_table'])->name('aset.data_table');
            Route::get('bidang', [BidangController::class, 'data_table'])->name('bidang.data_table');
            Route::get('jabatan', [JabatanController::class, 'data_table'])->name('jabatan.data_table');
            Route::get('jenis-bidang', [JenisBidangController::class, 'data_table'])->name('jenis.bidang.data_table');
            Route::get('jabatan-struktural', [JabatanStrukturalController::class, 'data_table'])->name('jabatan.struktural.data_table');
            Route::get('bobot-komponen', [BobotKomponenController::class, 'data_table'])->name('bobot.komponen.data_table');
            Route::get('pengajuan-fungsional-pegawai', [PengajuanFungsionalPegawaiController::class, 'data_table'])->name('pengajuan-fungsional-pegawai.data_table');
            Route::get('pengajuan-struktural-pegawai', [PengajuanStrukturalPegawaiController::class, 'data_table'])->name('pengajuan-struktural-pegawai.data_table');
            Route::get('pengajuan-status-pegawai', [PengajuanStatusPegawaiController::class, 'data_table'])->name('pengajuan-status-pegawai.data_table');
            Route::get('pengajuan-fungsional-dosen', [PengajuanFungsionalDosenController::class, 'data_table'])->name('pengajuan-fungsional-dosen.data_table');
            Route::get('pegawai', [PegawaiController::class, 'data_table'])->name('pegawai.data_table');
            Route::get('pengaturan-komponen', [PengaturanKomponenController::class, 'data_table'])->name('pengaturan.komponen.data_table');


            Route::get('user', [UserController::class, 'data_table'])->name('user.data_table');

            Route::get('agama', [AgamaController::class, 'data_table'])->name('agama.data_table');
            Route::get('bentuk-pendidikan', [BentukPendidikanController::class, 'data_table'])->name('bentuk-pendidikan.data_table');
            Route::get('ikatan-kerja-sdm', [IkatanKerjaSDMController::class, 'data_table'])->name('ikatan-kerja-sdm.data_table');
            Route::get('jabatan-fungsional', [JabatanFungsionalController::class, 'data_table'])->name('jabatan.fungsional.data_table');
            Route::get('jalur-masuk', [JalurMasukController::class, 'data_table'])->name('jalur.masuk.data_table');
            Route::get('jalur-evaluasi', [JalurEvaluasiController::class, 'data_table'])->name('jalur-evaluasi.data_table');
            Route::get('jenis-keluar', [JenisKeluarController::class, 'data_table'])->name('jenis.keluar.data_table');
            Route::get('jenis-sertifikasi', [JenisSertifikasiController::class, 'data_table'])->name('jenis.sertifikasi.data_table');
            Route::get('jenis-pendaftaran', [JenisPendaftaranController::class, 'data_table'])->name('jenis-pendaftaran.data_table');
            Route::get('jenis-sms', [JenisSmsController::class, 'data_table'])->name('jenis-sms.data_table');
            Route::get('jenis-tinggal', [JenisTinggalController::class, 'data_table'])->name('jenis-tinggal.data_table');
            Route::get('jenjang-pendidikan', [JenjangPendidikanController::class, 'data_table'])->name('jenjang-pendidikan.data_table');
            Route::get('kebutuhan-khusus', [KebutuhanKhususController::class, 'data_table'])->name('kebutuhan.khusus.data_table');
            Route::get('lembaga-pengangkat', [LembagaPengangkatController::class, 'data_table'])->name('lembaga.pengangkat.data_table');
            Route::get('negara', [NegaraController::class, 'data_table'])->name('negara.data_table');
            Route::get('level-wilayah', [LevelWilayahController::class, 'data_table'])->name('level-wilayah.data_table');
            Route::get('wilayah', [WilayahController::class, 'data_table'])->name('wilayah.data_table');
            Route::get('tahun-ajaran', [TahunAjaranController::class, 'data_table'])->name('tahun.ajaran.data_table');
            Route::get('status-mahasiswa', [StatusMahasiswaController::class, 'data_table'])->name('status.mahasiswa.data_table');
            Route::get('status-kepegawaian', [StatusKepegawaianController::class, 'data_table'])->name('status-kepegawaian.data_table');
            Route::get('status-keaktifan-pegawai', [StatusKeaktifanPegawaiController::class, 'data_table'])->name('status-keaktifan-pegawai.data_table');
            Route::get('semester', [SemesterController::class, 'data_table'])->name('semester.data_table');
            Route::get('penghasilan', [PenghasilanController::class, 'data_table'])->name('penghasilan.data_table');
            Route::get('pekerjaan', [PekerjaanController::class, 'data_table'])->name('pekerjaan.data_table');
            Route::get('pangkat-golongan', [PangkatGolonganController::class, 'data_table'])->name('pangkat.golongan.data_table');
            Route::get('alat-transportasi', [AlatTransportasiController::class, 'data_table'])->name('alat-transportasi.data_table');
            Route::get('pembiayaan', [PembiayaanController::class, 'data_table'])->name('pembiayaan.data_table');
            Route::get('jenis-prestasi', [JenisPrestasiController::class, 'data_table'])->name('jenis-prestasi.data_table');
            Route::get('tingkat-prestasi', [TingkatPrestasiController::class, 'data_table'])->name('tingkat-prestasi.data_table');
            Route::get('kategori-kegiatan', [KategoriKegiatanController::class, 'data_table'])->name('kategori-kegiatan.data_table');
            Route::get('jenis-evaluasi', [JenisEvaluasiController::class, 'data_table'])->name('jenis-evaluasi.data_table');
            Route::get('jenis-substansi', [JenisSubstansiController::class, 'data_table'])->name('jenis.substansi.data_table');
            Route::get('profil-pt', [ProfilPtController::class, 'data_table'])->name('profil.pt.data_table');
            Route::get('prodi', [ProdiController::class, 'data_table'])->name('prodi.data_table');
            Route::get('periode', [PeriodeController::class, 'data_table'])->name('periode.data_table');
            Route::get('kurikulum', [KurikulumController::class, 'data_table'])->name('kurikulum.data_table');
            Route::get('list-mata-kuliah', [ListMataKuliahController::class, 'data_table'])->name('list-mata-kuliah.data_table');
            Route::get('mata-kuliah', [MataKuliahController::class, 'data_table'])->name('mata-kuliah.data_table');
            Route::get('konversi-kampus-merdeka', [KonversiKampusMerdekaController::class, 'data_table'])->name('konversi-kampus-merdeka.data_table');
            Route::get('detail-mata-kuliah', [DetailMataKuliahController::class, 'data_table'])->name('detail-mata-kuliah.data_table');
            Route::get('matkul-kurikulum', [MatkulKurikulumController::class, 'data_table'])->name('matkul.kurikulum.data_table');
            Route::get('detail-kurikulum', [DetailKurikulumController::class, 'data_table'])->name('detail.kurikulum.data_table');
            Route::get('rencana-pembelajaran', [RencanaPembelajaranController::class, 'data_table'])->name('rencana.pembelajaran.data_table');
            Route::get('mahasiswa', [MahasiswaController::class, 'data_table'])->name('mahasiswa.data_table');
            Route::get('list-perkuliahan-mahasiswa', [ListPerkuliahanMahasiswaController::class, 'data_table'])->name('list.perkuliahan.mahasiswa.data_table');
            Route::get('list-nilai-perkuliahan-mahasiswa', [ListNilaiPerkuliahanMahasiswaController::class, 'data_table'])->name('list-nilai-perkuliahan-mahasiswa.data_table');
            Route::get('biodata-mahasiswa', [BiodataMahasiswaController::class, 'data_table'])->name('biodata-mahasiswa.data_table');
            Route::get('data-lengkap-mahasiswa-prodi', [DataLengkapMahasiswaProdiController::class, 'data_table'])->name('data-lengkap-mahasiswa-prodi.data_table');
            Route::get('bimbingan-mahasiswa', [BimbinganMahasiswaController::class, 'data_table'])->name('bimbingan.mahasiswa.data_table');
            Route::get('jenis-aktivitas', [JenisAktivitasController::class, 'data_table'])->name('jenis-aktivitas.data_table');
            Route::get('aktivitas-mahasiswa', [AktivitasMahasiswaController::class, 'data_table'])->name('aktivitas.mahasiswa.data_table');
            Route::get('list-aktivitas-mahasiswa', [ListAktivitasMahasiswaController::class, 'data_table'])->name('list-aktivitas-mahasiswa.data_table');
            Route::get('detail-perkuliahan-mahasiswa', [DetailPerkuliahanMahasiswaController::class, 'data_table'])->name('detail-perkuliahan-mahasiswa.data_table');
            Route::get('data-terhapus', [DataTerhapusController::class, 'data_table'])->name('data-terhapus.data_table');
            Route::get('krs-mahasiswa', [KrsMahasiswaController::class, 'data_table'])->name('krs.mahasiswa.data_table');
            Route::get('krs-nilai', [KrsNilaiController::class, 'data_table'])->name('krs.nilai.data_table');
            Route::get('rekap-khs-mahasiswa', [RekapKhsMahasiswaController::class, 'data_table'])->name('rekap.khs.mahasiswa.data_table');
            Route::get('rekap-krs-mahasiswa', [RekapKrsMahasiswaController::class, 'data_table'])->name('rekap.krs.mahasiswa.data_table');
            Route::get('rekap-jumlah-dosen', [RekapJumlahDosenController::class, 'data_table'])->name('rekap.jumlah.dosen.data_table');
            Route::get('list-rencana-evaluasi', [ListRencanaEvaluasiController::class, 'data_table'])->name('list-rencana-evaluasi.data_table');
            Route::get('dosen', [DosenController::class, 'data_table'])->name('dosen.data_table');
            Route::get('dosen-pembimbing', [DosenPembimbingController::class, 'data_table'])->name('dosen-pembimbing.data_table');
            Route::get('dosen-penguji', [DosenPengujiController::class, 'data_table'])->name('dosen-penguji.data_table');
            Route::get('kelas-kuliah', [KelasKuliahController::class, 'data_table'])->name('kelas-kuliah.data_table');
            Route::get('peserta-kelas-kuliah', [PesertaKelasKuliahController::class, 'data_table'])->name('peserta-kelas-kuliah.data_table');
            Route::get('list-nilai-perkuliahan-kelas', [ListNilaiPerkuliahanKelasController::class, 'data_table'])->name('list-nilai-perkuliahan-kelas.data_table');
            Route::get('detail-kelas-kuliah', [DetailKelasKuliahController::class, 'data_table'])->name('detail-kelas-kuliah.data_table');
            Route::get('biodata-dosen', [BiodataDosenController::class, 'data_table'])->name('biodata-dosen.data_table');
            Route::get('penugasan-dosen', [PenugasanDosenController::class, 'data_table'])->name('penugasan-dosen.data_table');
            Route::get('riwayat-fungsional-dosen', [RiwayatFungsionalDosenController::class, 'data_table'])->name('riwayat-fungsional-dosen.data_table');
            Route::get('riwayat-pangkat-dosen', [RiwayatPangkatDosenController::class, 'data_table'])->name('riwayat-pangkat-dosen.data_table');
            Route::get('riwayat-pendidikan-dosen', [RiwayatPendidikanDosenController::class, 'data_table'])->name('riwayat-pendidikan-dosen.data_table');
            Route::get('riwayat-sertifikasi-dosen', [RiwayatSertifikasiDosenController::class, 'data_table'])->name('riwayat-sertifikasi-dosen.data_table');
            Route::get('riwayat-penelitian-dosen', [RiwayatPenelitianDosenController::class, 'data_table'])->name('riwayat-penelitian-dosen.data_table');
            Route::get('mahasiswa-bimbingan-dosen', [MahasiswaBimbinganDosenController::class, 'data_table'])->name('mahasiswa-bimbingan-dosen.data_table');
            Route::get('penugasan-semua-dosen', [PenugasanSemuaDosenController::class, 'data_table'])->name('penugasan-semua-dosen.data_table');
            Route::get('aktivitas-mengajar-dosen', [AktivitasMengajarDosenController::class, 'data_table'])->name('aktivitas-mengajar-dosen.data_table');
            Route::get('dosen-pengajar-kelas-kuliah', [DosenPengajarKelasKuliahController::class, 'data_table'])->name('dosen-pengajar-kelas-kuliah.data_table');
            Route::get('perhitungan-sks', [PerhitunganSKSController::class, 'data_table'])->name('perhitungan-sks.data_table');
            Route::get('detail-nilai-perkuliahan', [DetailNilaiPerkuliahanController::class, 'data_table'])->name('detail-nilai-perkuliahan.data_table');
            Route::get('detail-nilai-perkuliahan-kelas', [DetailNilaiPerkuliahanController::class, 'data_table'])->name('detail.nilai.perkuliahan.kelas.data_table');
            Route::get('list-skala-nilai-prodi', [ListSkalaNilaiProdiController::class, 'data_table'])->name('list-skala-nilai-prodi.data_table');
            Route::get('nilai-perkuliahan-kelas', [NilaiPerkuliahanKelasController::class, 'data_table'])->name('nilai-perkuliahan-kelas.data_table');
            Route::get('riwayat-nilai-mahasiswa', [RiwayatNilaiMahasiswaController::class, 'data_table'])->name('riwayat-nilai-mahasiswa.data_table');
            Route::get('periode-perkuliahan', [PeriodePerkuliahanController::class, 'data_table'])->name('periode-perkuliahan.data_table');
            // Route::get('nilai-transfer-pendidikan-mahasiswa', [NilaiTransferPendidikanMahasiswaController::class, 'data_table'])->name('nilai.transfer.pendidikan.mahasiswa.data_table');
            Route::get('detail-periode-perkuliahan', [DetailPeriodePerkuliahanController::class, 'data_table'])->name('detail-periode-perkuliahan.data_table');
            Route::get('export-data-mahasiswa', [ExportDataMahasiswaController::class, 'data_table'])->name('export-data-mahasiswa.data_table');
            Route::get('export-data-nilai-transfer', [ExportDataNilaiTransferController::class, 'data_table'])->name('export-data-nilai-transfer.data_table');
            Route::get('export-data-penugasan-dosen', [ExportDataPenugasanDosenController::class, 'data_table'])->name('export-data-penugasan-dosen.data_table');
            // Route::get('export-data-penugasan-dosen-prodi', [ExportDataPenugasanDosenProdiController::class, 'data_table'])->name('export-data-penugasan-dosen-prodi.data_table');
            Route::get('export-data-matkul-prodi', [ExportDataMatkulProdiController::class, 'data_table'])->name('export-data-matkul-prodi.data_table');
            Route::get('export-data-aktivitas-kuliah', [ExportDataAktivitasKuliahController::class, 'data_table'])->name('export-data-aktivitas-kuliah.data_table');
            Route::get('export-data-kelas-perkuliahan', [ExportDataKelasPerkuliahanController::class, 'data_table'])->name('export-data-kelas-perkuliahan.data_table');
            Route::get('export-data-mahasiswa-krs', [ExportDataMahasiswaKrsController::class, 'data_table'])->name('export-data-mahasiswa-krs.data_table');
            Route::get('export-data-mahasiswa-lulus', [ExportDataMahasiswaLulusController::class, 'data_table'])->name('export-data-mahasiswa-lulus.data_table');
        });
    });
});

// });

Route::get('/agenda', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'agenda'])->name('agenda');
Route::get('/about/{slug}', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'contact'])->name('contact');
Route::get('/faq', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'faq'])->name('faq');
Route::get('post/{slug}', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'postDetail'])->name('post.detail');
Route::get('post', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'post'])->name('post');
Route::get('page/{slug}', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'pageDetail'])->name('page.detail');
Route::get('page-category/{slug}', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'pageCategoryDetail'])->name('pageCategory.detail');
Route::get('resource', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'resource'])->name('resource');
Route::get('panduan', [\App\Http\Controllers\WebsiteController\WebsiteController::class, 'panduan'])->name('panduan');



//Route::get('/email/verify', [\App\Http\Controllers\Auth\VerificationController::class,'verify'])->middleware('auth')->name('verification.notice');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('profil', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');
    Route::get('editProfil/{id}', [App\Http\Controllers\UserController::class, 'editProfiles']);
    Route::patch('updateProfile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);
});

// });

// Route::group(['middleware' => ['auth','verified','check.userverified']], function () {
// Route::group(['middleware' => ['auth','verified']], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('roles', App\Http\Controllers\RoleController::class);

// Route::resource('permissions', App\Http\Controllers\PermissionController::class);

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('pageCategories', App\Http\Controllers\PageCategoryController::class);
Route::post('pageCategoriesIncrease/{id}', 'App\Http\Controllers\PageCategoryController@increase')->name('pageCategoriesIncrease');
Route::post('pageCategoriesDecrease/{id}', 'App\Http\Controllers\PageCategoryController@decrease')->name('pageCategoriesDecrease');
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('pages', App\Http\Controllers\PageController::class);
Route::resource('postCategories', App\Http\Controllers\PostCategoryController::class);
Route::resource('agendaCategories', App\Http\Controllers\AgendaCategoryController::class);
Route::resource('agendas', App\Http\Controllers\AgendaController::class);
Route::resource('galeris', App\Http\Controllers\GaleriController::class);
Route::resource('pendidikans', App\Http\Controllers\PendidikanController::class);

Route::resource('faqs', App\Http\Controllers\FaqController::class);
Route::resource('faqCategories', App\Http\Controllers\FaqCategoryController::class);

Route::resource('fileCategories', App\Http\Controllers\FileCategoryController::class);
Route::resource('files', App\Http\Controllers\FileController::class);
Route::resource('panduans', App\Http\Controllers\PanduanController::class);


// });



// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
