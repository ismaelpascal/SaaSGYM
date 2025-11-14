<?php

class Database
{
    /**
     * @var PDO|null
     */
    private $connection = null;

    /**
     * @var Database|null
     */
    private static $instance = null;

    /**
     * El constructor es privado para prevenir la creación de nuevas instancias
     * con el operador 'new'.
     */
    private function __construct()
    {
        // Cargar la configuración de la base de datos desde phinx.php
        $config = require __DIR__ . '/../../phinx.php';
        //$env = $config['environments']['development'];
        $env = $config['environments']['testing'];

        $dsn = sprintf(
            '%s:host=%s;port=%d;dbname=%s;charset=%s',
            $env['adapter'],
            $env['host'],
            $env['port'],
            $env['name'],
            $env['charset']
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, $env['user'], $env['pass'], $options);
        } catch (PDOException $e) {
            // En un entorno de producción, deberías registrar este error en lugar de mostrarlo.
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Previene la clonación de la instancia.
     */
    private function __clone() {}

    /**
     * Previene la deserialización de la instancia.
     */
    public function __wakeup() {}

    /**
     * Controla el acceso a la única instancia.
     *
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Devuelve la conexión PDO.
     *
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        return $this->connection;
    }
}
