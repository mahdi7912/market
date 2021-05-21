<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost:8000/users/store',
        'http://localhost:8000/users/update/1',
        'http://localhost:8000/users/destroy',
        'http://localhost:8000/order/store',
        //
    ];
}
