<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use DatabaseMigrations;
    
    public function test_mountain_creation()
    {

        $mountain = factory(App\Mountain::class)->create(['name' => 'Everest']);

        $mountain->countries()->save(factory(App\Country::class)->make(['name' => 'Nepal']));
        $mountain->routes()->save(factory(App\Route::class)->make(['name' => 'Normal']));
        $mountain->ranges()->save(factory(App\Range::class)->make(['name' => 'Himalaia']));
        
        $this->seeInDatabase('mountains', ['name' => 'Everest']);
        $this->seeInDatabase('countries', ['name' => 'Nepal']);
        $this->seeInDatabase('routes', ['name' => 'Normal']);
        $this->seeInDatabase('ranges', ['name' => 'Himalaia']);
    }

    public function teste_climber_creation()
    {
        $climber = factory(App\Climber::class)->create(['first_name' => 'Willians']);

        $climber->countries()->save(factory(App\Country::class)->make(['name' => 'Brasil']));
        $climber->teams()->save(factory(App\Team::class)->make(['name' => 'Brasil Team']));
        $climber->summits()->save(factory(App\Summit::class)
            ->make(['date_summit' => '2016-01-01']));

        $this->seeInDatabase('climbers', ['first_name' => 'Willians']);
        $this->seeInDatabase('teams', ['name' => 'Brasil Team']);
        $this->seeInDatabase('summits', ['date_summit' => '2016-01-01']);

    }
}
