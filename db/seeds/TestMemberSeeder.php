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
                'nombre'   => 'Nombre' . $i,
                'apellido' => 'Apellido' . $i,
                'email'    => 'socio' . $i . '@example.com',
                'dni'      => '0000-' . $i,
                'telefono' => '3446-' . $i,
                'fecha_nacimiento' => date('Y-m-d', strtotime('-' . (20 + $i % 30) . ' years')),
                'contacto_emergencia' => '9999-' . $i,
                'domicilio' => 'Domicilio ' . $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->table('members')->insert($data)->saveData();
    }
}
