<?php

use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsTagController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\PublicRegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', function () {
    $news = \App\Models\News::where('status', 'published')->latest('updated_at')->get();

    return response()
        ->view('sitemap', compact('news'))
        ->header('Content-Type', 'text/xml');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::get('/berita/{news:slug}', [PublicNewsController::class, 'show'])->name('news.show');
Route::get('/berita', [PublicNewsController::class, 'index'])
    ->name('news.index');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::get('/program', [HomeController::class, 'programs'])->name('programs.index');
Route::get('/prestasi', [HomeController::class, 'achievements'])
    ->name('achievements.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/ppdb', [PublicRegistrationController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb', [PublicRegistrationController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/success/{registration}', [PublicRegistrationController::class, 'success'])->name('ppdb.success');
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('announcements', AnnouncementController::class);
    Route::resource('agendas', AgendaController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('news', NewsController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource(
    'organizations',
    OrganizationController::class
    );
    Route::resource('registrations', RegistrationController::class)
    ->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::resource('achievements', AchievementController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('news-categories', NewsCategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('news-tags', NewsTagController::class);

});
require __DIR__.'/auth.php';
