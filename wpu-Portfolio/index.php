<?php
  function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);

}
//API channel youtube 1
$result= get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,contentDetails,statistics&id=UCBO1vtJfJQrxzdEMaSyNfSQ&key=AIzaSyDeBTJsTcQFnBi4fcN6g2bz4FRiDJCk0bM');


$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//video terakhir ini menggunakan (order date)
$urlLatestvideo = ('https://www.googleapis.com/youtube/v3/search?key=AIzaSyDeBTJsTcQFnBi4fcN6g2bz4FRiDJCk0bM&channelId=UCBO1vtJfJQrxzdEMaSyNfSQ&maxResults=1&order=date&part=snippet');
$result = get_CURL($urlLatestvideo);
$latestVideoId = $result['items'][0]['id']['videoId'];



// Instagram API
// $clientId = 'f0b022fbe68c4ae79dd51169af18feb4';
$accessToken = 'IGAAI55Aw32ZABBZAE12ajNxWVNYbWJvSElKNTFfX25tZAjVKTVkzMG8wRl9WVGhpZAk1HOHV5cHpJajhkb2UwUWY1NkxWTGlQSjhjUlZA3NlZAzR3NrYXdydEZAjb2duekxaWktPWkdfM2JrTFNaWmxXVHdCb3M4OFM2cGY0RXpDX24tTQZDZD';

$result = get_CURL('https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=IGAAI55Aw32ZABBZAE12ajNxWVNYbWJvSElKNTFfX25tZAjVKTVkzMG8wRl9WVGhpZAk1HOHV5cHpJajhkb2UwUWY1NkxWTGlQSjhjUlZA3NlZAzR3NrYXdydEZAjb2duekxaWktPWkdfM2JrTFNaWmxXVHdCb3M4OFM2cGY0RXpDX24tTQZDZD');
$usernameIG = $result['username'];
$profilePictureIG = $result['profile_picture_url'];
$followersIG = $result['followers_count'];

$result = get_CURL('https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,timestamp&access_token=IGAAI55Aw32ZABBZAE12ajNxWVNYbWJvSElKNTFfX25tZAjVKTVkzMG8wRl9WVGhpZAk1HOHV5cHpJajhkb2UwUWY1NkxWTGlQSjhjUlZA3NlZAzR3NrYXdydEZAjb2duekxaWktPWkdfM2JrTFNaWmxXVHdCb3M4OFM2cGY0RXpDX24tTQZDZD&limit=5');
$photos = [];
foreach ($result['data'] as $photo) {
    $photos[] = $photo['media_url'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>My Portfolio</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#home">Insani Verzama</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" id="home">
  <div class="container text-center">
    <img src="img/foto Profile.png" class="rounded-circle img-thumbnail">
    <h1 class="display-4">Insani Verzama</h1>
    <h3 class="lead">student | informanation sytem | sains</h3>
  </div>
</div>

<section class="about" id="about">
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col"><h2>About</h2></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5">
        <p>Saya adalah siswa Sistem Informasi di bidang Sains dan Teknologi yang memiliki minat kuat dalam pengembangan teknologi informasi dan solusi digital. Saya bersemangat untuk mempelajari cara mengintegrasikan ilmu komputer dan teknologi untuk membantu memecahkan masalah dunia nyata melalui sistem yang efisien dan inovatif. Saya terus berusaha meningkatkan kemampuan teknis serta soft skill untuk menjadi profesional yang kompeten di bidang teknologi informasi.</p>
      </div>
      <div class="col-md-5">
        <p>Sebagai seorang mahasiswa cerdas, saya selalu berkomitmen untuk mengoptimalkan waktu belajar dan mengembangkan kemampuan akademik secara maksimal. Saya percaya bahwa kecerdasan tidak hanya diukur dari nilai, tetapi juga dari kemampuan untuk memahami konsep secara mendalam dan menerapkannya dalam situasi nyata. Dengan rasa ingin tahu yang tinggi, saya terus mencari wawasan baru dan beradaptasi dengan perkembangan teknologi dan ilmu pengetahuan yang terus berubah.

</p>
      </div>
    </div>
  </div>
</section>

<section class="social bg-light" id="social"> 
  <div class="container">
    <div class="row pt-4 mb-4 text-center">
      <div class="col"><h2>Social Media</h2></div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-5"> 
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePic ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName  ?></h5>  
            <p><?= $subscriber ?> Subscribers.</p>
            <div class="g-ytsubscribe" data-channelid="UCBO1vtJfJQrxzdEMaSyNfSQ" data-layout="default" data-count="default"></div>
          </div> 
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NKo7vBX9zPQ?rel=0" allowfullscreen></iframe>
            </div>
          </div>
        </div> 
      </div>

     <div class="col-md-5 mb-4">
        <div class="row mb-3">
          <div class="col-md-4 text-center">
            <img src="<?= $profilePictureIG; ?>" width="100" class="rounded-circle img-thumbnail" alt="Instagram Profile Picture">
          </div>
          <div class="col-md-8 d-flex flex-column justify-content-center">
            <h5><?= $usernameIG; ?></h5>
            <p><?= $followersIG; ?> Followers</p>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col d-flex flex-wrap gap-2">
            <?php foreach ($photos as $photo) : ?>
              <div class="ig-thumbnail">
                <img src="<?= $photo; ?>" class="img-fluid" alt="Instagram Photo">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </div>
</section>

<section class="portfolio" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4 text-center">
      <div class="col"><h2>Portfolio</h2></div>
    </div>
    <div class="row">
      <?php for ($i = 1; $i <= 6; $i++): ?>
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/<?= $i ?>.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<section class="contact bg-light" id="contact">
  <div class="container">
    <div class="row pt-4 mb-4 text-center">
      <div class="col"><h2>Contact</h2></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card bg-primary text-white mb-4 text-center">
          <div class="card-body">
            <h5 class="card-title">Contact Me</h5>
            <p class="card-text">Feel free to reach out via the form or social media!</p>
          </div>
        </div>
        <ul class="list-group mb-4">
          <li class="list-group-item"><h3>Location</h3></li>
          <li class="list-group-item">My Office</li>
          <li class="list-group-item">Jl. Setiabudhi No. 193, Padang</li>
          <li class="list-group-item">Sumatra Barat, Indonesia</li>
        </ul>
      </div>
      <div class="col-lg-6">
        <form>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<footer class="bg-dark text-white mt-5">
  <div class="container text-center">
    <p>&copy; <?= date("Y") ?>. All rights reserved.</p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>
</body>
</html>