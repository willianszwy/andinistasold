<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocialLoginTest extends TestCase
{
    public function getUser(){
        $user = Mockery::mock('Laravel\Socialite\Two\User');

        $user->shouldReceive('getId') 
            ->andReturn(1)
            ->shouldReceive('getEmail')
            ->andReturn(str_random(10).'@noemail.app')
            ->shouldReceive('getNickname')
            ->andReturn('Laztopaz')
            ->shouldReceive('getName')
            ->andReturn('Nome')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        return $user;    
    }

    public function mockSocial(){
        \Socialite::shouldReceive('driver->redirect')
              ->andReturn(); 

        \Socialite::shouldReceive('driver->user')
            ->andReturn($this->getUser());       

    }


    public function test_login_page()
    {
        $this->visit('/login')
             ->see('Andinistas')
             ->see('register')
             ->see('Login');
    }

    public function test_can_login_with_facebook()
    {

        $this->mockSocial();          

        $this->visit('/login')
             ->click('facebook')
             ->seePageIs('/redirect/facebook');

        $this->visit('/callback/facebook');   
    }

    public function test_can_login_with_instagram()
    {

        $this->mockSocial();          

        $this->visit('/login')
             ->click('instagram')
             ->seePageIs('/redirect/instagram');

        $this->visit('/callback/instagram');  

    }

    public function test_can_login_with_google()
    {

        $this->mockSocial();          

        $this->visit('/login')
             ->click('google')
             ->seePageIs('/redirect/google');

        $this->visit('/callback/google');  

    }  

    public function test_can_login_with_twitter()
    {

        $this->mockSocial();          

        $this->visit('/login')
             ->click('twitter')
             ->seePageIs('/redirect/twitter');

        $this->visit('/callback/twitter');  

    }

}
