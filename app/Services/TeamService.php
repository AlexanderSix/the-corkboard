<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 5:16 PM
 */

namespace App\Services;


use App\Services\Contracts\TeamServiceInterface;
use App\Team;
use App\User;
use Illuminate\Support\Collection;

class TeamService implements TeamServiceInterface
{

    /**
     * @return Collection
     */
    public function all (): Collection
    {
        return Team::all();
    }

    /**
     * @param int $id
     *
     * @return Team
     */
    public function find (int $id): Team
    {
        return Team::where('id', $id)->first();
    }

    /**
     * @param int $id
     *
     * @return Collection
     */
    public function members (int $id): Collection
    {
        return User::where('team_id', $id)->get();
    }
}
