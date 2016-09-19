<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;
    
    public function testExample()
    {

        $mountains = factory(App\Mountain::class,3)
           ->create()
           ->each(function ($u) {
                $u->routes()->save(factory(App\Route::class)->make());
            });




        
        $this->assertCount(3, $mountains->routes);
    }
}
