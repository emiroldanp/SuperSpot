<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

use PHPUnit\Framework\TestCase;

class SeriesTests extends TestCase
{
    use RefreshDatabase;

    public function user_can_leave_comment()
    {
        $comment = new Comment();
        //crear comentario
        //validar que se haya creado
    }
}
