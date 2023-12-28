<?php
class DB
{
    public static function connect()
    {

        // $host = getenv('DB_HOST');
        // $base = getenv('DB_BASE');
        // $user = getenv('DB_USER');
        // $pass = getenv('DB_PASS');
        // $sslmode = getenv('DB_SSLMODE');
        // $options = getenv('DB_OPTIONS');
        $host = 'localhost';
        $port = '5432';
        $base = 'EscalasTrocaTurno';
        $user = 'admin';
        $pass = 'admin';



        // return new PDO("pgsql:host=$host;dbname=$base;user=$user;password=$pass;sslmode=$sslmode;options=$options");
        return new PDO("pgsql:host=$host;port=$port;dbname=$base;user=$user;password=$pass");
    }
}
