<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/29/2018
 * Time: 21:45
 */

class Album extends Helper
{
    private $connection;
    private $id;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;
    }

    public function getAlbumArray($connection, $id, $db){
        $artistSql = $this->selectAllById($db, $id);
        $artistArr =  $this->fetchArrayFromDb($connection, $artistSql);


        return $artistArr;
    }
}