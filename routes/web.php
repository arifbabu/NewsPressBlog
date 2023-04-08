<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indexTest', [TestController::class, 'index']);

// Home Route Starts

Route::get('/website/home', [HomeController::class, 'index'])->name('website.home');

// Home Route Ends 

// Tag Route Starts
Route::get('/indexPage', [TagController::class, 'index'])->name('tag.index');
Route::get('/indexCreate', [TagController::class, 'create'])->name('tag.create');
Route::post('/indexStore', [TagController::class, 'store'])->name('tag.store');
Route::get('/indexEdit/{id}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('/indexUpdate/{id}', [TagController::class, 'update'])->name('tag.update');
Route::get('/indexDestroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

// Tag Route Not Implement into Blade File Starts
Route::get('/indexTagRestorePage', [TagController::class, 'trashFolder'])->name('tag.trash.file');
Route::get('/indexTagRestore/{id}', [TagController::class, 'resoteTag'])->name('tag.restore');
Route::get('/indexTagPermanentDelete/{id}', [TagController::class, 'pDeleteTag'])->name('tag.pDelete');
// Tag Route Not Implement into Blade File Ends

// Category Route Starts
Route::get('/categoryPage', [CategoryController::class, 'index'])->name('cat.index');
Route::get('/categoryCreate', [CategoryController::class, 'create'])->name('cat.create');
Route::post('/categoryStore', [CategoryController::class, 'store'])->name('cat.store');
Route::get('/categoryEdit/{id}', [CategoryController::class, 'edit'])->name('cat.edit');
Route::post('/categoryUpdate/{id}', [CategoryController::class, 'update'])->name('cat.update');
Route::get('/categoryDestroy/{id}', [CategoryController::class, 'destroy'])->name('cat.destroy');


// Category Route Not Implement into Blade File Starts
Route::get('/indexCategoryRestorePage', [CategoryController::class, 'trashFolder'])->name('cat.trash.file');
Route::get('/indexCategoryRestore/{id}', [CategoryController::class, 'resoteTag'])->name('cat.restore');
Route::get('/indexCategoryPermanentDelete/{id}', [CategoryController::class, 'pDeleteTag'])->name('cat.pDelete');
// Category Route Not Implement into Blade File Ends





//  Post Route Starts
Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/postStore', [PostController::class, 'store'])->name('post.store');
Route::get('/post/Delete/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/post/Show/{id}', [PostController::class, 'show'])->name('post.readmore');

Route::get('/post/Edit/{id}', [PostController::class, 'edit'])->name('post.edit');  // Not Working Yet
Route::post('/post/Update/{id}', [PostController::class, 'update'])->name('post.update');  // Not Working Yet

// Post Implement into Blade File Starts
Route::get('/post/RestorePage', [PostController::class, 'trashFolder'])->name('post.trash.file');
Route::get('/post/Restore/{id}', [PostController::class, 'resotePost'])->name('post.restore');
Route::get('/post/PermanentDelete/{id}', [PostController::class, 'pDeletePost'])->name('post.pDelete');
// Post Implement into Blade File Ends

// Route::get('changeStatus', [PostController::class, 'changeStatus'])->name('users.update.status');
Route::get('changeStatus', [PostController::class, 'changeStatus'])->name('asdasd34.index');

Route::get('/status/update', [PostController::class, 'updateStatus'])->name('users.update.status');
// Route::get('/status/update', 'UserController@updateStatus')->name('users.update.status');



// Comment Route Starts Here

Route::post('/commentStore/{id}', [CommentController::class, 'store'])->name('comment.store');

// Comment Route Ends Here






// Comment Route Starts here
// Route::post('/post/comment', [CommentController::class, 'store'])->name('comment.store');

// Reply Route Starts here
Route::post('/post/reply', [ReplyController::class, 'store'])->name('reply.store');










// return view then redirect after X time
Route::fallback(function () {
    echo "<script>setTimeout(function(){ window.location.href = 'http://127.0.0.1:8000/post/index'; }, 3000);</script>";
    return view('errors.notFoundLink');
});



//  this is test for github upload



