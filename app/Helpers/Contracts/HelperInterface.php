<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 3:14 PM
 */

namespace App\Helpers\Contracts;


use Illuminate\Support\Collection;

interface HelperInterface
{
    public function areCollectionsEqual (Collection $collection1, Collection $collection2) : bool;
}
