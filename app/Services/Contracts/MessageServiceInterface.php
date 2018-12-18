<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 5:14 PM
 */

namespace App\Services\Contracts;


use App\Message;
use Illuminate\Support\Collection;

interface MessageServiceInterface
{
    public function all () : Collection;
    public function find ($id) : Message;
    public function byUser ($userId) : Collection;
}
