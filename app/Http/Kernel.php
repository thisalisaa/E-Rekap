protected $routeMiddleware = [
    // Middleware lainnya
    'role' => \App\Http\Middleware\CheckRole::class,
    'activated' => \App\Http\Middleware\CheckActivation::class,
];
