<?php

use App\Http\Controllers\api\careerController;
use Illuminate\Support\Facades\Route;

Route::get('/career', [careerController::class, 'index']);