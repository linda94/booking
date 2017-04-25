<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testDatabase extends TestCase
{
    /**
     * Test som sjekker database for en spesifik e-post adresse.
     * ide for fremtidig feature / test: Når en ny løsning lages legges det automatisk til en admin bruker
     * skriv en test for å sjekke at en bruker med navn "Administrator" finnes i databasen.
     *
     * @return void
     */
    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
        'email' => 'danielconnery1@hotmail.com'
    ]);
    }
}
