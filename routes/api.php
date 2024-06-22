
<?php

use App\Http\Controllers\API\LookerController;
use Illuminate\Support\Facades\Route;

Route::get('/revandamais/api/estoque', [LookerController::class, 'getXml']);
Route::get('/webmotors/api/v1/estoque', [LookerController::class, 'getJson']);
