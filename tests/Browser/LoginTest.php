<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function loginTest()
    {
        $user = User::factory()->create([
            'email' => 'test@test.de',
        ]);

        $this->browse(function ($browser) use ($user) {
            /** @var Browser $browser */
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Anmelden')
                ->assertPathIs('/');
            $browser->screenshot(time().'-login');
        });
    }
}
