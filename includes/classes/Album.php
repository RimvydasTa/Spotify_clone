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

    public function getNumberOfSongs ($db, $albumArtistId){
        $numSongsSql = "select id from" . " $db " . "where album = '$albumArtistId'";
        $numSongsQuery = $this->queryDb($this->connection, $numSongsSql);
        return mysqli_num_rows($numSongsQuery);
    }

    public function getSongIds(){
        $songIdsSql = "select id from songs where album = '$this->id' order by albumOrder asc";
        $songIdQuery = $this->queryDb($this->connection, $songIdsSql);
        $songIdArray = [];

        while ($row = mysqli_fetch_array($songIdQuery)){
            array_push($songIdArray, $row['id']);
        }

        return $songIdArray;

    }
}