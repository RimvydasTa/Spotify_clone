<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/29/2018
 * Time: 21:08
 */

class Helper
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;

    }

    public function selectAllById ($db, $id){
        $sql = "select * from {$db} where id = '{$id}' ";
        return $sql;
    }

    public function queryDb($connection, $sql){
        return mysqli_query($connection, $sql);
    }

    public function fetchArrayFromDb ($connection, $sql){
            $query = mysqli_query($connection, $sql);
            $dbArray = mysqli_fetch_array($query);

            return $dbArray;
    }

}