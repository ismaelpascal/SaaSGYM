<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
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
        $categorias = ['Bebidas', 'Suplementos', 'Ropa', 'Accesorios'];

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'nombre'     => $faker->words(3, true),
                'categoria'  => $faker->randomElement($categorias),
                'precio'     => $faker->randomFloat(2, 500, 25000),
                'stock'      => $faker->numberBetween(0, 100),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->table('products')->insert($data)->saveData();
    }
}
