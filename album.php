

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
                <p><?php echo $artistArray['name'] ?></p>
                <p><?php echo $album->getNumberOfSongs('songs',$albumArtistId) ?> songs</p>
            </div>
        </div>

        <div class="tracklistContainer">
            <ul class="tracklist">
                <?php
                    $songIdArray = $album->getSongIds();
                    $i = 1;
                    foreach ($songIdArray as $songId){
                       $albumSong = new Song($connection, $songId);
                       $songArr = $albumSong->getSongArray($songId, "songs");
                       echo "<li class='tracklistRow'>
                                 <div class='trackCount'>
                                    <img src='assets/images/icons/play-white.png' alt='Play Button' class='play'>
                                    <span class='trackNumber'>{$i}</span>
                                  </div>
                                  
                                  <div class='trackInfo'>
                                      <span class='trackName'>{$songArr['title']}</span>
                                      <span class='artistName'>{$artistArray['name']}</span>
                                  </div>
                                  <div class='trackOptions'>
                                    <img src='assets/images/icons/more.png' alt='' class='optionsButton'>
                                  </div>
                                  
                                  <div class='trackDuration'>
                                    <span class='duration'>{$songArr['duration']}</span>
                                  </div>
                              </li>";
                        $i++;
                    }
                ?>
            </ul>
        </div>

<?php






?>

<?php include ("includes/footer.php");?>