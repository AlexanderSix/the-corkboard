<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 2:48 PM
 */

namespace App\Services;


use App\Services\Contracts\UserServiceInterface;
use App\User;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{

    public function all (): Collection
    {
        return User::all();
    }

    public function find (int $id): User
    {
        return User::find($id);
    }

    public function teammates ($id): Collection
    {
        return User::where('team_id', '=', $this->find($id)->team_id)
            ->where('id', '!=', $id)
            ->get();
    }
}
