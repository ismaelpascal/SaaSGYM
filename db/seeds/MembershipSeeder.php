<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class MembershipSeeder extends AbstractSeed
{
    public function run(): void
    {
        // 1. Obtener todos los miembros y tipos de membresía existentes de la base de datos.
        $members = $this->fetchAll('SELECT id FROM members');
        $membershipTypes = $this->fetchAll('SELECT id, duracion_dias FROM membership_types');

        // Detener la ejecución si las tablas base están vacías.
        if (empty($members) || empty($membershipTypes)) {
            echo "ERROR: Por favor, ejecuta TestMemberSeeder y MembershipTypesSeeder antes de ejecutar este seeder.\n";
            return;
        }

        $data = [];
        $today = new DateTime(); // Usamos la fecha actual para determinar si una membresía está vencida.

        // 2. Iterar sobre cada miembro para asignarle una membresía.
        foreach ($members as $member) {
            // Elegir un tipo de membresía al azar de los que ya existen.
            $randomType = $membershipTypes[array_rand($membershipTypes)];
            $membershipTypeId = $randomType['id'];
            $durationDays = (int)$randomType['duracion_dias'];

            // Generar fechas de forma aleatoria para que los datos parezcan reales.
            // La fecha de inicio será en algún momento de los últimos 6 meses.
            $startDate = (new DateTime())->modify('-' . rand(0, 180) . ' days');
            $endDate = (clone $startDate)->modify('+' . $durationDays . ' days');
            
            // Determinar el estado de la membresía comparando la fecha de vencimiento con la actual.
            $status = ($endDate < $today) ? 'vencido' : 'activo';

            $data[] = [
                'member_id'          => $member['id'],
                'membership_type_id' => $membershipTypeId,
                'fecha_inicio'       => $startDate->format('Y-m-d'),
                'fecha_vencimiento'  => $endDate->format('Y-m-d'),
                'estado'             => $status,
                'created_at'         => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_at'         => (new DateTime())->format('Y-m-d H:i:s'),
            ];
        }

        // 3. Insertar todos los nuevos registros de membresías en la base de datos.
        if (!empty($data)) {
             $this->table('memberships')->insert($data)->saveData();
        }
    }
}
