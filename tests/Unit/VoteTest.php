<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testvote()
    {
        $this->vote_answer = Vote::vote($this->user->id, $this->answer->id, 1, 'answer_id');
        if (!$this->answer) return false;
    }
}
