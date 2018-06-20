<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Chrome;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('surname', 'Surname')
                ->type('name', 'Name')
                ->type('login', '')
                ->type('phone_number' . '89999999999')
                ->type('email', 'user_test@ya.ru')
                ->type('password', 'user_test')
                ->type('password_confirmation', 'user_test')
                ->press('Enter')
                ->assertPathIs('/');
        });
    }
}
