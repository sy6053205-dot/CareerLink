<?php

use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\EmployerApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PublicJobController;
use App\Http\Controllers\UiController;



// member4
Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::get('/categories/{category}/jobs', [CategoryController::class, 'jobs'])->name('categories.jobs');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// member5
Route::get('/jobs', [PublicJobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [PublicJobController::class, 'show'])->name('jobs.show');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');

Route::get('/ui/companies', [UiController::class, 'companies'])->name('ui.companies');
Route::get('/ui/posts', [UiController::class, 'posts'])->name('ui.posts');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    // member5
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'apply'])->name('jobs.apply');

    // member3
    Route::get('/my-applications', [ApplicationController::class, 'myApplications'])->name('applications.my');


    // member2
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/my-jobs', [JobController::class, 'myJobs'])->name('jobs.my');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

    // member2
    Route::get('/jobs/{job}/applications', [EmployerApplicationController::class, 'jobApplications'])->name('jobs.applications');
    Route::post('/applications/{application}/accept', [EmployerApplicationController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{application}/reject', [EmployerApplicationController::class, 'reject'])->name('applications.reject');


    // member4
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/like', [PostController::class, 'unlike'])->name('posts.unlike');

    Route::get('/about',function(){
        return view('about');
    })->name('about');


    // member1
    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

        Route::get('/jobs', [AdminController::class, 'jobs'])->name('admin.jobs');
        Route::delete('/jobs/{job}', [AdminController::class, 'deleteJob'])->name('admin.jobs.delete');

        Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');

        Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');

        
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

        
        Route::get('/companies', [AdminController::class, 'companies'])->name('admin.companies');
        Route::post('/companies', [AdminCompanyController::class, 'store'])->name('admin.companies.store');
        Route::put('/companies/{company}', [AdminCompanyController::class, 'update'])->name('admin.companies.update');
        Route::delete('/companies/{company}', [AdminCompanyController::class, 'destroy'])->name('admin.companies.delete');

    });
});



























































