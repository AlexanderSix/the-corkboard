<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    protected $team1Users;

    public function setUp ()
    {
        parent::setUp();

        $this->team1Users = factory(\App\User::class, 4)->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGetTeammates()
    {
        $selectedUser = $this->team1Users->first();

        $teammates = $this->team1Users->filter(function ($u) use ($selectedUser) {
            return $u->id !== $selectedUser->id;
        });

        $this->assertEmpty($teammates->diff($selectedUser->getTeammates()));
    }
}
