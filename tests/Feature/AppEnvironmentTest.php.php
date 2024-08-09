<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    public function testAppenv()
    {
        if (App::environment('testing','prod')) 
        {
            self::assertTrue(true);
        }
        //var_dump(App::environment());
    }
}
