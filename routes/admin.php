<?php

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.pages.dashboard');
    });
});

?>