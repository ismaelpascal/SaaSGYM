<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class PaymentHistorySeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $faker = Faker\Factory::create('es_ES');
        $data = [];
        
        $memberships = $this->fetchAll('SELECT id, member_id FROM memberships');

        foreach ($memberships as $membership) {
            $numeroDePagos = $faker->numberBetween(1, 10);
            for ($i = 0; $i < $numeroDePagos; $i++) {
                $paymentDate = $faker->dateTimeThisYear();
                $data[] = [
                    'member_id'          => $membership['member_id'],
                    'membership_id'      => $membership['id'],
                    'monto'              => $faker->randomFloat(2, 7000, 50000),
                    'metodo_pago'        => $faker->randomElement(['efectivo', 'transferencia', 'tarjeta_debito', 'tarjeta_credito']),
                    'fecha_pago'         => $paymentDate->format('Y-m-d H:i:s'),
                    'created_at'         => date('Y-m-d H:i:s'),
                    'updated_at'         => date('Y-m-d H:i:s'),
                ];
            }
        }

        if (!empty($data)) {
            $this->table('payment_history')->insert($data)->saveData();
        }
    }
}
