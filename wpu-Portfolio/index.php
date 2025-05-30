<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCBO1vtJfJQrxzdEMaSyNfSQ&key=AIzaSyDeBTJsTcQFnBi4fcN6g2bz4FRiDJCk0bM');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);
curl_close($curl);

$data = json_decode($result, true);

if (!isset($data['items'][0])) {
    $title = "Channel Not Found";
    $subscribers = 0;
    $thumbnail = "img/profile2.png";
} else {
    $channel = $data['items'][0];
    $title = $channel['snippet']['title'];
    $subscribers = $channel['statistics']['subscriberCount'];
    $thumbnail = $channel['snippet']['thumbnails']['medium']['url'];
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
        <a class="navbar-brand" href="#home">Sandhika Galih</a>
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
        <img src="img/profile1.png" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Sandhika Galih</h1>
        <h3 class="lead">Lecturer | Programmer | Youtuber</h3>
      </div>
    </div>

    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4 text-center">
          <div class="col"><h2>About</h2></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
          </div>
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
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
                <img src="<?= $thumbnail ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $title ?></h5>  
                <p><?= number_format($subscribers) ?> Subscribers.</p>
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

          <div class="col-md-5">
            <div class="row align-items-center">
              <div class="col-md-4">
                <img src="img/profile2.png" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5>insani_vzm</h5>  
                <p>100 Followers.</p>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="ig-thumbnail">
                  <img src="img/thumbs/1.png">
                </div>
              </div>
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
              <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
              <li class="list-group-item">West Java, Indonesia</li>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </body>
</html>
