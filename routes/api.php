    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FunFactApiController;

    
    Route::put('/funfacts/random', [FunFactApiController::class, 'random']);

    Route::put('/funfacts', [FunFactApiController::class, 'index']);


