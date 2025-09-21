<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class MembershipTypesSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Plan Mensual',
                'precio' => 5000.00,
                'duracion_dias' => 30
            ],
            [
                'nombre' => 'Plan Trimestral',
                'precio' => 13500.00,
                'duracion_dias' => 90
            ],
            [
                'nombre' => 'Plan Anual',
                'precio' => 48000.00,
                'duracion_dias' => 365
            ]
        ];

        $this->table('membership_types')->insert($data)->saveData();
    }
}
