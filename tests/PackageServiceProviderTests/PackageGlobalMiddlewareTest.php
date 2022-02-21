<?php

namespace Spatie\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Exception;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\Tests\TestPackage\Middleware\TestMiddleware;

class PackageGlobalMiddlewareTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasRoutes('other')
            ->hasGlobalMiddleware(TestMiddleware::class);
    }

    /** @test */
    public function it_registers_global_middleware()
    {
        $this->markTestSkipped('wip');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Exception message');

        $this->withoutExceptionHandling()->get('other-route');
    }
}
