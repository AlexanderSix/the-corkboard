<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 5:14 PM
 */

namespace App\Services\Contracts;


use App\Response;
use Illuminate\Support\Collection;

interface ResponseServiceInterface
{
    public function all () : Collection;
    public function find ($id) : Response;
    public function byMessage ($messageId) : Collection;
}
