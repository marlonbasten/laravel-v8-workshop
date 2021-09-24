<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function LoginTest()
    {
        $user = User::factory()->create([
            'email' => 'test@test.de',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Anmelden')
                ->assertPathIs('/');
            $browser->screenshot(time().'-login');
        });
    }
}
