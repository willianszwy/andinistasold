<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery as m;

class SocialLoginTest extends TestCase
{
    use DatabaseMigrations;

    protected $controller;
    protected $socialAccountService;

    public function setUp()
    {
        parent::setUp();

        $this->controller = new \App\Http\Controllers\SocialController();
    }

    public function test_login_page()
    {
        $this->visit('/login')
             ->see('Andinistas')
             ->see('register')
             ->see('Login');
    }

    public function test_redirect()
    {
        \Socialite::shouldReceive('driver->redirect')
              ->once()
              ->andReturn();

        $this->controller->redirect('facebook');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_social_login_redirect_fail_invalid_provider()
    {
        $this->controller->redirect('foo');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_social_login_callback()
    {
        $this->socialAccountService = m::mock(\App\SocialAccountService::class);
        $this->socialAccountService->shouldReceive('createOrGetUser')
                                 ->times(4)
                                 ->andReturn();

        \Auth::shouldReceive('login')
                   ->times(4)
                   ->andReturn();

        $this->controller->callback($this->socialAccountService, 'facebook');
        $this->controller->callback($this->socialAccountService, 'google');
        $this->controller->callback($this->socialAccountService, 'twitter');
        $this->controller->callback($this->socialAccountService, 'instagram');

        $this->controller->callback($this->socialAccountService, 'foo');
    }
}
