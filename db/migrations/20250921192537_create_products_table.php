<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProductsTable extends AbstractMigration
{
    public function change(): void
    {
        // 2. Tabla de Socios (Members)
        $this->table('members')
            ->addColumn('nombre', 'string', ['limit' => 100])
            ->addColumn('apellido', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addIndex(['email'], ['unique' => true]) // Para asegurar que el email sea único
            ->addTimestamps() // Crea created_at y updated_at
            ->create();

        // 3. Tabla de Tipos de Membresía
        $this->table('membership_types')
            ->addColumn('nombre', 'string', ['limit' => 100])
            ->addColumn('precio', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addColumn('duracion_dias', 'integer')
            ->create();

        // 4. Tabla de Pagos (Payments)
        $this->table('payments')
            ->addColumn('member_id', 'integer', ['signed' => false])
            ->addColumn('membership_type_id', 'integer', ['signed' => false])
            ->addColumn('monto', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addForeignKey('member_id', 'members', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->addForeignKey('membership_type_id', 'membership_types', 'id', ['delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'])
            ->addTimestamps()
            ->create();
    }
}
