<?php


namespace App\Database;


class Database
{

    private static $db = null;

    public function __construct(string $dbPath)
    {
        self::setDb($dbPath);
    }

    private static function setDb(string $dbPath)
    {
        self::$db = json_decode(file_get_contents($dbPath),true);
    }

    public static function find(int $id, string $tableName)
    {
        if (isset(self::$db[$tableName])){
            foreach (self::$db[$tableName] as $row){
                if ($row['id']===$id){
                    return $row;
                }
            }
        }
        return null;
    }

    public static function all(string $tableName=null)
    {
        if (isset($tableName) && isset(self::$db[$tableName])){
            return self::$db[$tableName];
        }
        return self::$db;
    }
}
