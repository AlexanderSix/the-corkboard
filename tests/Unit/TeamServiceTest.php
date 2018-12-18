<?php

namespace Tests\Unit;

use App\Services\TeamService;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TeamService
     */
    protected $teamService;

    /**
     * @var Collection
     */
    protected $teams;

    /**
     * @var Collection
     */
    protected $users;

    public function setUp ()
    {
        parent::setUp();

        $this->teamService = $this->app->make('\App\Services\TeamService');

        $this->teams = factory(\App\Team::class, 2)->create();
        $this->users = collect();

        foreach ($this->teams as $team) {
            $this->users = $this->users->concat(factory(\App\User::class, 3)->create([
                'team_id' => $team->id
            ]));
        }
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
        $this->assertEmpty($this->teams->diff($this->teamService->all()));
    }

    public function testFind()
    {
        $selectedTeam = $this->teams->first();

        $this->assertTrue($selectedTeam->is($this->teamService->find($selectedTeam->id)));
    }

    public function testMembers()
    {
        $team1 = $this->teams->first();

        $team1Users = $this->users->filter(function ($u) use ($team1) {
            return $u->team_id === $team1->id;
        });

        $this->assertTrue($team1Users->count() > 0);

        $returnValue = $this->teamService->members($team1->id);

        // The following works for our needs because emails are unique throughout the application
        $team1Emails = $team1Users->map(function ($u) {
            return $u->email;
        });

        $returnEmails = $returnValue->map(function ($u) {
            return $u->email;
        });

        $this->assertEmpty(
            $team1Emails->diff($returnEmails)
        );
    }
}
