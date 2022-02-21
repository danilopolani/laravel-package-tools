<?php

namespace Spatie\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Exception;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\Tests\TestPackage\Middleware\TestMiddleware;

class PackageMiddlewareTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasRoutes('web', 'middleware')
            ->hasMiddleware('test-middleware', TestMiddleware::class)
            ->hasGroupMiddleware('web', TestMiddleware::class);
    }

    protected function defineRoutes($router)
    {
        $router->middlewareGroup('group1', []);
    }

    /** @test */
    public function it_registers_middleware_alias()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Exception message');

        $this->withoutExceptionHandling()->get('middleware-route');
    }

    /** @test */
    public function it_appends_middleware_group()
    {
        $this->markTestSkipped('wip');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Exception message');

        $this->withoutExceptionHandling()->get('my-route');
    }

    /** @test */
    public function it_does_not_appends_middleware_to_other_groups()
    {
        $this->get('group1-route')->assertSeeText('group1 response');
    }
}
