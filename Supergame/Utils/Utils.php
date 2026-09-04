<?php


class Utils{
    public static function connect():PDO{
        return new PDO('mysql:host=127.0.0.1:3306;dbname=supergame','root','root',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function sanitize(string $data): string {
    return trim($data);
}
}