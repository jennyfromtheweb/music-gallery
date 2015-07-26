<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Jenny's Favorite Bands</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,100italic,300italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="audiojs/audio.min.js" type="text/javascript"></script>
</head>
<body>

<?php 
  include("bands.php");
  include("functions.php");
?>

<script type="text/javascript">
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>

<div class="header">
  <h1><?php echo $band ?></h1>

  <div class="menu">
    <a href="index.php" title="'cause I'm gonna make this place your home">home</a>
    <?php $random = array_rand($bands); ?>
    <a href="profile.php?band=<?php echo $bands[$random]; ?>" title="hit me baby one more time">random</a>
  </div>

  <hr class="short">
</div>

<div class="container">
  <?php 
    $albums = findAlbums($band);
    foreach($albums as $name => $info) { ?>                
      <div class="album">
        <img src="<?php echo getAlbumCover($info); ?>">
        <div class="description">
          <h2><?php echo $name; ?></h2>
          <h4>(<?php echo getYearRecorded($info); ?>)</h4>
          <p>
            <?php displayTrackList($info); ?>
          </p>
        </div>
        <div class="audio">
          <audio src="<?php echo getRandomTrackPreview($info); ?>" preload="auto" />
          <!-- <audio controls id="album-audio" preload="auto">
            <source src="<?php echo getRandomTrackPreview($info); ?>" type="audio/mpeg">
            Oops, your browser isn't compatible with the audio player.
          </audio> -->
        </div>
      </div>
  <?php } ?>
  <br class="clear"><br><br><br>
</div>

<?php include("footer.php"); ?>

</body>
</html>