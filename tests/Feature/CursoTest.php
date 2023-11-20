<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CursoTest extends TestCase
{
    /**
     * Test the response of the course API.
     *
     * @return void
     */
    public function testCursoEndpoint()
    {
        $response = $this->get('/api/cursos/1'); // Asume que tienes un curso con ID 1

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'titulo', 'descripcion', 'precio', 'opiniones', 'esTop'
        ]);
    }
}