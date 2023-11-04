<?php

    use App\Http\Controllers\CourseController;
    use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'courses', 'as' => 'course.'], function () {
    Route::get('/', action:[CourseController::class, 'index'])->name('index');
    Route::get('/create', action:[CourseController::class, 'create'])->name('create');
    Route::post('/create', action:[CourseController::class, 'store'])->name('store');
    Route::delete('/destroy/{course}', action:[CourseController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{course}', action:[CourseController::class, 'edit'])->name('edit');
    Route::put('/edit/{course}', action:[CourseController::class, 'update'])->name('update');
});
