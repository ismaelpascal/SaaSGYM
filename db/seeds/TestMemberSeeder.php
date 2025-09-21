<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class TestMemberSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'email' => 'juan.perez@example.com'
            ]
        ];

        $this->table('members')->insert($data)->saveData();
    }
}
