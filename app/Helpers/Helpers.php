<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 3:13 PM
 */

namespace App\Helpers;


use App\Helpers\Contracts\HelperInterface;
use Illuminate\Support\Collection;

class Helpers implements HelperInterface
{

    public function areCollectionsEqual (Collection $collection1, Collection $collection2): bool
    {
        return $collection1->diff($collection2)->isEmpty();
    }
}
