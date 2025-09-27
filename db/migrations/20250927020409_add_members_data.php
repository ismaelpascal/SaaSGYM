<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddMembersData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('members')
            ->addColumn('dni', 'string', [
                'limit' => 20,
                'null' => false,
                'after' => 'email',
            ])
            ->addColumn('telefono', 'string', [
                'limit' => 50,
                'null' => false, 
                'after' => 'dni',
            ])
            ->addColumn('fecha_nacimiento', 'date', [
                'null' => false,
                'after' => 'telefono',
            ])
            ->addColumn('contacto_emergencia', 'string', [
                'limit' => 100,
                'null' => true,
                'after' => 'fecha_nacimiento',
            ])
            ->addColumn('domicilio', 'string', [
                'limit' => 255,
                'null' => false,
                'after' => 'contacto_emergencia',
            ])
            ->addIndex(['dni'], ['unique' => true])
            ->update();
    }
}
