<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/29/2018
 * Time: 21:05
 */

class Artist extends Helper
{
    private $connection;
    private $id;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;
    }



    public function getArtistArray($albumArtistId, $db, $connection){
        $artistSql = $this->selectAllById($db, $albumArtistId);
        $artistArr =  $this->fetchArrayFromDb($connection, $artistSql);


        return $artistArr;
    }

}