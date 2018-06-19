<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/27/2018
 * Time: 13:15
 */
    $resultArr = [];
    $songQuery = mysqli_query($connection, "select songs.id from songs order by rand() limit 10");
    while($row = mysqli_fetch_array($songQuery)){
        array_push($resultArr, $row['id']);
    }

    $jsonArray = json_encode($resultArr);
?>

<script>

    $(document).ready(function () {
        currentPlaylist = <?php echo $jsonArray?>;
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, false);
        //Volume bar
        updateVolumeProgressBar(audioElement.audio);

        $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function (e) {
           e.preventDefault();
        });

        $(".playbackBar .progressBar").mousedown(function () {
           mouseDown = true;
        });
        $(".playbackBar .progressBar").mousemove(function (e) {
            if(mouseDown == true){
                timeFromOffset(e, this);
            }
        });

        $(".playbackBar .progressBar").mouseup(function (e) {
                timeFromOffset(e, this);
        });

        // Volume bar

        $(".volumeBar .progressBar").mousedown(function () {
            mouseDown = true;
        });
        $(".volumeBar .progressBar").mousemove(function (e) {
            if(mouseDown == true){
                var percentage = e.offsetX / $(this).width();
                if (percentage >= 0 && percentage <=1 ){
                    audioElement.audio.volume = percentage;
                }
            }
        });

        $(".volumeBar .progressBar").mouseup(function (e) {
            var percentage = e.offsetX / $(this).width();
            if (percentage >= 0 && percentage <=1 ){
                audioElement.audio.volume = percentage;
            }
        });

        $(".controlButton.volume").on("click", function () {
            setMute();

        });

        $(document).mouseup(function () {
           mouseDown = false;
        });


        $(".play").on("click",function () {
            playSong();
        });
        $(".pause").on("click",function () {
            pauseSong();
        });

        $(".next").on("click",function () {
            nextSong();
        });
        $(".repeat").on("click",function () {
            setRepeat();
        });

        $(".previous").on("click",function () {
            prevSong();
        });


    });
    
    function timeFromOffset(mouse, progressBar) {
        var precentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration  * (precentage / 100);
        audioElement.setTime(seconds);
    }
    function setTrack(trackId, newPlaylist, play) {
        currentIndex = currentPlaylist.indexOf(trackId);
        pauseSong();
        $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function (data) {
            var track = JSON.parse(data);
            console.log(track);
            $(".trackName").text(track.title);

            $.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist}, function (data){
                var artist = JSON.parse(data);
                console.log(artist.name);
                $(".artistName").text(artist.name);
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album}, function (data){
                var album = JSON.parse(data);
                console.log(album);
                $(".albumArtWork").attr('src', album.artworkPath);
            });

            audioElement.setTrack(track);
            audioElement.play();
        });
        play ? audioElement.playSong() : false;
    }

    function playSong() {
        if (audioElement.audio.currentTime == 0){
            $.post("includes/handlers/ajax/updatePlay.php", {songId: audioElement.currentlyPlaying.id}, function (data) {
                console.log(data);
            });
        }else {
            console.log("Dont update")
        }
        audioElement.play();
        $(".play").hide();
        $(".pause").show();
    }
    function pauseSong() {
        audioElement.pause();
        $(".pause").hide();
        $(".play").show();
    }
    function prevSong() {
        if (audioElement.audio.currentTime >= 3 || currentIndex === 0){
            audioElement.setTime(0);
        }else {
            currentIndex = currentIndex --;
            setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
        }
    }
    function nextSong() {
        if (repeat == true){
            audioElement.setTime(0);
            playSong();
            return;
        }
        if (currentIndex === currentPlaylist.length - 1) {
            currentIndex = 0;
        }else {
            currentIndex = currentIndex++;
        }
        var trackToPlay = currentPlaylist[currentIndex];
        setTrack(trackToPlay, currentPlaylist, true);
    }

    function setRepeat() {
        repeat = !repeat;
        var imageName = repeat ? "repeat-active.png" : "repeat.png";
        $(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
    }

    function setMute() {
        audioElement.audio.muted = !audioElement.audio.muted;
        var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
        $(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName);
    }


</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                        <span class="albumLink">
                            <img class="albumArtWork" src="" alt="album artwork">
                        </span>
                <div class="trackInfo">
                    <span class="trackName"></span>
                    <span></span>
                    <span class="artistName"></span>
                    <span></span>
                </div>

            </div>
        </div>
        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle button">
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous button">
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>
                    <button class="controlButton play" title="Play button">
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>
                    <button class="controlButton pause" title="Pause button" style="display: none;">
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>
                    <button class="controlButton next" title="Next button">
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>
                    <button class="controlButton repeat" title="Repeat button">
                        <img src="assets/images/icons/repeat.png" alt="Repeat">
                    </button>
                </div>
                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress">
                            </div>
                        </div>
                    </div>
                    <span class="progressTime remaining ">0.00</span>
                </div>
            </div>
        </div>
        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume button">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
