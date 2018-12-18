<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 5:14 PM
 */

namespace App\Services\Contracts;


use App\Team;
use Illuminate\Support\Collection;

interface TeamServiceInterface
{
    public function all () : Collection;
    public function find (int $id) : Team;
    public function members (int $id) : Collection;
}
