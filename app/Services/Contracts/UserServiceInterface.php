<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 2:41 PM
 */

namespace App\Services\Contracts;


use App\User;
use Illuminate\Support\Collection;

interface UserServiceInterface
{
    public function all (): Collection;
    public function find (int $id): User;
    public function teammates ($id): Collection;
}
