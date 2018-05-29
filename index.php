<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 18:04
 */

    include ("includes/header.php"); ?>

    <h1 class="pageHeadingBig">You Might Also Like</h1>
    <div class="gridViewContainer">
        <?php
        //Albums output
        $albumSql = "SELECT * FROM albums ORDER BY RAND() LIMIT 10";
        $albumQuery = mysqli_query($connection, $albumSql);

        while ($row = mysqli_fetch_array($albumQuery)){
            $albumImgPath = $row['artworkPath'];
            $albumTitle = $row['title'];
            $albumId = $row['id'];
            echo "<div class='gridViewItem'>
                <a href='album.php?id={$albumId}'>
                    <img src='{$albumImgPath}'>
                    <div class='gridViewInfo'>
                        {$albumTitle}
                    </div>
                    </a>
                </div>
                ";
        }


        ?>
    </div>

 <?php  include ("includes/footer.php");?>



    i
