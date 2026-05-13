<?php

use App\Livewire\Pages\Admin\ChangePassword;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Jemaat\CreateBaptis;
use App\Livewire\Pages\Admin\Jemaat\CreateJemaat;
use App\Livewire\Pages\Admin\Jemaat\CreateKehadiran;
use App\Livewire\Pages\Admin\Jemaat\CreateKematian;
use App\Livewire\Pages\Admin\Jemaat\CreatePernikahan;
use App\Livewire\Pages\Admin\Jemaat\CreateSidi;
use App\Livewire\Pages\Admin\Jemaat\CreateWilayah;
use App\Livewire\Pages\Admin\Jemaat\EditBaptis;
use App\Livewire\Pages\Admin\Jemaat\EditJemaat;
use App\Livewire\Pages\Admin\Jemaat\EditKehadiran;
use App\Livewire\Pages\Admin\Jemaat\EditKematian;
use App\Livewire\Pages\Admin\Jemaat\EditSidi;
use App\Livewire\Pages\Admin\Jemaat\EditWilayah;
use App\Livewire\Pages\Admin\Jemaat\ListBaptis;
use App\Livewire\Pages\Admin\Jemaat\ListJemaat;
use App\Livewire\Pages\Admin\Jemaat\ListKehadiran;
use App\Livewire\Pages\Admin\Jemaat\ListKematian;
use App\Livewire\Pages\Admin\Jemaat\ListPernikahan;
use App\Livewire\Pages\Admin\Jemaat\ListSidi;
use App\Livewire\Pages\Admin\Jemaat\ListWilayah;
use App\Livewire\Pages\Admin\Konten\CreateAgenda;
use App\Livewire\Pages\Admin\Konten\CreateRenungan;
use App\Livewire\Pages\Admin\Konten\CreateStaff;
use App\Livewire\Pages\Admin\Konten\CreateGallery;
use App\Livewire\Pages\Admin\Konten\CreateKegiatan;
use App\Livewire\Pages\Admin\Konten\EditAgenda;
use App\Livewire\Pages\Admin\Konten\EditRenungan;
use App\Livewire\Pages\Admin\Konten\EditStaff;
use App\Livewire\Pages\Admin\Konten\EditGallery;
use App\Livewire\Pages\Admin\Konten\EditKegiatan;
use App\Livewire\Pages\Admin\Konten\ListAgenda;
use App\Livewire\Pages\Admin\Konten\ListRenungan;
use App\Livewire\Pages\Admin\Konten\ListStaff;
use App\Livewire\Pages\Admin\Konten\ListGallery;
use App\Livewire\Pages\Admin\Konten\ListKegiatan;
use App\Livewire\Pages\Guest\Agenda;
use App\Livewire\Pages\Guest\AgendaDetail;
use App\Livewire\Pages\Guest\Galeri;
use App\Livewire\Pages\Guest\Home;
use App\Livewire\Pages\Guest\Kegiatan;
use App\Livewire\Pages\Guest\KegiatanDetail;
use App\Livewire\Pages\Guest\Renungan;
use App\Livewire\Pages\Guest\RenunganDetail;
use App\Livewire\Pages\Guest\Sejarah;
use App\Livewire\Pages\Guest\Staff;
use App\Livewire\Pages\Guest\VisiMisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class)->name('home');
Route::get('sejarah', Sejarah::class)->name('sejarah');
Route::get('visi-misi', VisiMisi::class)->name('visi-misi');
Route::get('kegiatan', Agenda::class)->name('agenda');
Route::get('renungan', Renungan::class)->name('renungan');
Route::get('staff', Staff::class)->name('staff');
Route::get('agenda', Kegiatan::class)->name('kegiatan');
Route::get('galeri', Galeri::class)->name('galeri');

Route::get('renungan/{renungan}', RenunganDetail::class)->name('renungan.detail');
Route::get('kegiatan/{agenda}', AgendaDetail::class)->name('agenda.detail');
Route::get('agenda/{kegiatan}', KegiatanDetail::class)->name('kegiatan.detail');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('change-password', ChangePassword::class)->name('admin.change-password');

    Route::get('jemaat', ListJemaat::class)->name('admin.jemaat.list');
    Route::get('jemaat/tambah', CreateJemaat::class)->name('admin.jemaat.create');
    Route::get('jemaat/edit/{jemaat}', EditJemaat::class)->name('admin.jemaat.edit');

    Route::get('baptis', ListBaptis::class)->name('admin.baptis.list');
    Route::get('baptis/tambah', CreateBaptis::class)->name('admin.baptis.create');
    Route::get('baptis/edit/{baptis}', EditBaptis::class)->name('admin.baptis.edit');

    Route::get('sidi', ListSidi::class)->name('admin.sidi.list');
    Route::get('sidi/tambah', CreateSidi::class)->name('admin.sidi.create');
    Route::get('sidi/edit/{sidi}', EditSidi::class)->name('admin.sidi.edit');

    Route::get('kematian', ListKematian::class)->name('admin.kematian.list');
    Route::get('kematian/tambah', CreateKematian::class)->name('admin.kematian.create');
    Route::get('kematian/edit/{kematian}', EditKematian::class)->name('admin.kematian.edit');

    Route::get('pernikahan', ListPernikahan::class)->name('admin.pernikahan.list');
    Route::get('pernikahan/tambah', CreatePernikahan::class)->name('admin.pernikahan.create');

    Route::get('kehadiran', ListKehadiran::class)->name('admin.kehadiran.list');
    Route::get('kehadiran/tambah', CreateKehadiran::class)->name('admin.kehadiran.create');
    Route::get('kehadiran/edit/{kehadiran}', EditKehadiran::class)->name('admin.kehadiran.edit');

    Route::get('wilayah', ListWilayah::class)->name('admin.wilayah.list');
    Route::get('wilayah/tambah', CreateWilayah::class)->name('admin.wilayah.create');
    Route::get('wilayah/edit/{wilayah}', EditWilayah::class)->name('admin.wilayah.edit');

    Route::get('renungan', ListRenungan::class)->name('admin.renungan.list');
    Route::get('renungan/tambah', CreateRenungan::class)->name('admin.renungan.create');
    Route::get('renungan/edit/{renungan}', EditRenungan::class)->name('admin.renungan.edit');

    Route::get('kegiatan', ListAgenda::class)->name('admin.agenda.list');
    Route::get('kegiatan/tambah', CreateAgenda::class)->name('admin.agenda.create');
    Route::get('kegiatan/edit/{agenda}', EditAgenda::class)->name('admin.agenda.edit');

    Route::get('staff', ListStaff::class)->name('admin.staff.list');
    Route::get('staff/tambah', CreateStaff::class)->name('admin.staff.create');
    Route::get('staff/edit/{staff}', EditStaff::class)->name('admin.staff.edit');

    Route::get('galeri', ListGallery::class)->name('admin.gallery.list');
    Route::get('galeri/tambah', CreateGallery::class)->name('admin.gallery.create');
    Route::get('galeri/edit/{gallery}', EditGallery::class)->name('admin.gallery.edit');

    Route::get('agenda', ListKegiatan::class)->name('admin.kegiatan.list');
    Route::get('agenda/tambah', CreateKegiatan::class)->name('admin.kegiatan.create');
    Route::get('agenda/edit/{kegiatan}', EditKegiatan::class)->name('admin.kegiatan.edit');
});
