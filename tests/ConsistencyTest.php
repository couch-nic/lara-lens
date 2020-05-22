<?php

namespace HiFolks\LaraLens\Tests;

use HiFolks\LaraLens\LaraLens;
use Orchestra\Testbench\TestCase;
use HiFolks\LaraLens\LaraLensServiceProvider;
use Illuminate\Support\Facades\Http;

class ConsistencyTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaraLensServiceProvider::class];
    }

    /** @test */
    public function test_config_array()
    {
        $l = new LaraLens();
        $a = $l->getConfigs();
        $this->assertIsArray($a->toArray());
        $this->assertEquals(11, count($a->toArray()));

    }
    /** @test */
    public function test_runtimeconfig_array()
    {
        $l = new LaraLens();
        $a = $l->getRuntimeConfigs();
        $this->assertIsArray($a->toArray());
        $this->assertEquals(4, count($a->toArray()));
    }

    /*
    public function test_connection_array()
    {
        Http::fake();
        $l = new LaraLens();
        $a = $l->getConnections();
        $this->assertIsArray($a->toArray());
        $this->assertEquals(3, count($a->toArray()));
    }
    */

    /** @test */
    public function test_credit_array()
    {
        $l = new LaraLens();
        $a = $l->getCredits();
        $this->assertIsArray($a->toArray());
        $this->assertGreaterThan(0, count($a->toArray()));
    }

}