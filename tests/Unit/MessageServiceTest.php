<?php

namespace Tests\Unit;

use App\Message;
use App\Services\MessageService;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var MessageService
     */
    protected $messageService;

    /**
     * @var Collection
     */
    protected $users;

    /**
     * @var Collection
     */
    protected $messages;

    /**
     * @var Collection
     */
    protected $user1Messages;

    public function setUp ()
    {
        parent::setUp();

        $this->messageService = $this->app->make('\App\Services\MessageService');

        $this->users = factory(\App\User::class, 2)->create()->each(function ($u) {
            return $u->fresh();
        });

        $this->messages = collect();

        foreach ($this->users as $user) {
            $this->messages = $this->messages->concat(factory(\App\Message::class, 2)->create([
                'user_id' => $user->id
            ])->each(function ($m) {
                return $m->fresh();
            }));
        }

        $user1 = $this->users->first()->fresh();

        $this->user1Messages = $this->messages->filter(function ($m) use ($user1) {
            return $m->user_id == $user1->id;
        });

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
        $messages = $this->messageService->all();

        $this->messages->each(function ($m, $key) use ($messages) {
            $this->assertEquals($m->getKey(), $messages[$key]->getKey());
        });
    }

    public function testFind()
    {
        $actualMessage = $this->messages->first()->fresh();

        $message = $this->messageService->find($actualMessage->id);

        $this->assertTrue($actualMessage->is($message));
    }

    public function testByUser()
    {
        $user1 = $this->users->first()->fresh();

        $userMessages = $this->messageService->byUser($user1->id);

        $userMessages->each(function ($m) use ($user1) {
            $this->assertTrue($m->user_id === $user1->id);
        });

        $this->assertTrue($this->user1Messages->count() === $userMessages->count());

        $this->user1Messages->each(function ($m, $key) use ($userMessages) {
            $this->assertEquals($m->getKey(), $userMessages[$key]->getKey());
        });
    }
}
