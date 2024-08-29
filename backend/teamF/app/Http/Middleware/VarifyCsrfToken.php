<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VarifyCsrfToken extends Middleware
{
    /**
     * @var array
     */
    protected $except = [
        'api/createMediaList',
    ];
}
