<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 6/12/2018
 * Time: 21:48
 */

class Song extends Helper
{
    private $connection;
    private $id;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;
    }

    public function getSongArray ($id, $db){
        $songSql = $this->selectAllById($db, $id);
        $songArr = $this->fetchArrayFromDb($this->connection, $songSql);

        return $songArr;
    }
}