<?php

namespace Tests\Feature;

use App\Breed;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;

class MockTest extends TestCase
{

    function tearDown()
    {
        Mockery::close();
    }

    public function testExample()
    {

        $mockedUser = Mockery::mock(User::class);

        $mockedUser->shouldReceive('exists')
            ->once()
            ->andReturn(true);

        $mockedUser->shouldReceive('put')
            ->never();

        $generator = new Generator($mockedUser);
        $generator->fire();

    }
}

class Generator {
    protected $file;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    protected function getContent()
    {
        return 'user';
    }

    public function fire()
    {
        $content = $this->getContent();
        $user = 'user';

        if (! $this->user->exists($user))
        {
            $this->user->put($user, $content);
        }
    }
}
