<?php
/**
 * Clase para abrir y cerrar conexiones de la base de datos.
 */
class Connection
{
    private static $connection;

    /**
     * Abre conexion a la base de datos
     *
     * @return void
     */
    public static function openConnection()
    {
        if (!isset(self::$connection)) 
        {
            try
            {
                include_once 'config.php';

                self::$connection = new PDO('mysql:host=' . SERVER_NAME . '; dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->exec('SET CHARACTER SET utf8');
            } catch (PDOException $ex) 
            {
                print('ERROR' . $ex->getMessage() . '<br>');
                die();
            }
        }
    }

    /**
     * Cierra la conexion a la base de datos
     *
     * @return void
     */
    public static function closeConnection()
    {
        if (isset(self::$connection)) 
        {
            self::$connection = null;
        }
    }

    /**
     * Obtiene la conexión a la base de datos
     *
     * @return $connection
     */
    public static function getConnection()
    {
        return self::$connection;
    }
}
