<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class TestMemberSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'nombre'   => 'Socio de Prueba',
                'apellido' => $i,
                'email'    => 'socio' . $i . '@example.com',
            ];
        }

        $this->table('members')->insert($data)->saveData();
    }
}
