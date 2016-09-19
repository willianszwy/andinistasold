<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;
    
    public function testMountain()
    {

        $mountain = factory(App\Mountain::class)->create(['name' => 'Everest']);

        $mountain->countries()->save(factory(App\Country::class)->make(['name' => 'Nepal']));
        
         $this->seeInDatabase('mountains', ['name' => 'Everest']);
         $this->seeInDatabase('countries', ['name' => 'Nepal']);
    }
}
