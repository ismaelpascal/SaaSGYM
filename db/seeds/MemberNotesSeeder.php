<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class MemberNotesSeeder extends AbstractSeed
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

        $members = $this->fetchAll('SELECT id FROM members');
        $users = $this->fetchAll('SELECT id FROM users');

        if (empty($members) || empty($users)) {
            echo "Asegúrate de que las tablas 'members' y 'users' tengan datos.\n";
            return;
        }

        foreach ($members as $member) {
            $numeroDeNotas = $faker->numberBetween(1, 3);
            for ($i = 0; $i < $numeroDeNotas; $i++) {
                $randomUser = $faker->randomElement($users);

                $data[] = [
                    'member_id'  => $member['id'],
                    'user_id'    => $randomUser['id'],
                    'note'       => $faker->words(15, true),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
        }

        if (!empty($data)) {
            $this->table('member_notes')->insert($data)->saveData();
        }
    }
}
