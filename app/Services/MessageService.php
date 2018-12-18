<?php
/**
 * Created by PhpStorm.
 * User: alexandersix
 * Date: 12/16/18
 * Time: 5:16 PM
 */

namespace App\Services;


use App\Message;
use App\Services\Contracts\MessageServiceInterface;
use Illuminate\Support\Collection;

class MessageService implements MessageServiceInterface
{

    /**
     * @return Collection
     */
    public function all (): Collection
    {
        return Message::all();
    }

    /**
     * @param $id
     *
     * @return Message
     */
    public function find ($id): Message
    {
        return Message::find($id);
    }

    /**
     * @param $userId
     *
     * @return Collection
     */
    public function byUser ($userId): Collection
    {
        return Message::where('user_id', $userId)->get();
    }
}
