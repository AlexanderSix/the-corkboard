<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $userService;

    protected $team1Users;
    protected $users;
    protected $teams;

    public function setUp ()
    {
        parent::setUp();

        $this->userService = $this->app->make('\App\Services\UserService');

        $this->team1Users = factory(\App\User::class, 3)->create([
            'team_id' => 1
        ]);

        $team2Users = factory(\App\User::class, 4)->create([
            'team_id' => 2
        ]);

        $this->users = $this->team1Users->merge($team2Users);

        $this->teams = factory(\App\Team::class, 2)->create();
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

    public function testAll()
    {
        $serviceResponse = $this->userService->all();

        $this->assertEmpty($this->users->diff($serviceResponse));
    }

    public function testFind()
    {
        $user = $this->users->first();

        $serviceResponse = $this->userService->find($user->id);

        $this->assertTrue($user->is($serviceResponse));
    }

    public function testTeammates()
    {
        $user = $this->team1Users->first();
        $users = $this->team1Users->filter(function ($u) use ($user) {
            return $u->id !== $user->id;
        });

        $serviceResponse = $this->userService->teammates($user->id);

        $this->assertEmpty($users->diff($serviceResponse));
    }
}
