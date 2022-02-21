<?php

namespace Spatie\LaravelPackageTools\Tests\TestPackage\Middleware;

use Closure;
use Exception;

class TestMiddleware
{
    public function handle($request, Closure $next)
    {
        throw new Exception('Exception message');
    }
}
