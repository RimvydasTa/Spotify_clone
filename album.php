

<?php include ("includes/header.php");?>
    <?php
        if (isset($_GET['id'])){
            $albumId = $_GET['id'];
        }else {
            header("Location: index.php");
        }
            $album = new Album($connection, $albumId);
            $artist = new Artist($connection, $albumId);

            $albumArray = $album->getAlbumArray($connection, $albumId, 'albums');
            $albumArtistId = $albumArray['artist'];
            $albumTitle = $albumArray['title'];


            $artistArray =  $artist->getArtistArray($albumArtistId, 'artists', $connection);
            $albumArtistName = $artistArray['name'];


    ?>

        <div class="entityInfo">
            <div class="leftSection">
                <img src="<?php echo $albumArray['artworkPath'] ?>" alt="">
            </div>
            <div class="rightSection">
                <h2><?php echo $albumArray['title'] ?></h2>
                <span><?php echo $artistArray['name'] ?></span>
            </div>
        </div>

<?php include ("includes/footer.php");?>