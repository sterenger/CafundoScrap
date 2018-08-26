<?php
require __DIR__ . "/vendor/autoload.php";

use Goutte\Client;

$url = "https://www.sciencenews.org/topic/life-evolution";
$baseUrl = "https://www.sciencenews.org";
$client = new Client();
$crawler = $client->request('GET', $url);
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CAFUNDÓ CHALLENGE</title>
    <link rel="stylesheet" href="css/album.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-7 py-4">
              <h4 class="text-white">PHP Crawler <a class="pull-left" href="<?= $url ?>" target="_blank">{$url}</a></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Cafundó Challenge</strong>
          </a>
        
            <span ></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">LIFE & EVOLUTION NEWS</h1>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php
              $category=null;
              $crawler->filter('div.item-list ul li')->each(function ($node, $index) use ($baseUrl) {
                  $category = $node->filter("span.field-content")->text();
                  // echo "Category : " . $category."<br>";
                  $node->filter("div.views-field-view")->each(function ($subNode, $subIndex) use ($category,$baseUrl) {
                      $imgSrc = $subNode->filter("img")->attr('data-echo');
                      $title = $subNode->filter("div.views-field-title > span.field-content")->text();
                      $urlPost = $baseUrl .$subNode->filter("div.views-field-title > span.field-content a")->attr('href');
                      $urlPost2 = $baseUrl .$subNode->filter("div.views-row-2")->filter("div.views-field-title > span.field-content a")->attr('href');
                      $urlPost3 = $baseUrl .$subNode->filter("div.views-row-3")->filter("div.views-field-title > span.field-content a")->attr('href');
                      $title2 = $subNode->filter("div.views-row-2")->filter("div.views-field-title > span.field-content")->text();
                      $imgSrc2 = $subNode->filter("div.views-row-2")->filter("img")->attr('data-echo');
                      $title3 = $subNode->filter("div.views-row-3")->filter("div.views-field-title > span.field-content")->text();
                      $imgSrc3 = $subNode->filter("div.views-row-3")->filter("img")->attr('data-echo'); ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="<?= $imgSrc ?>" src="<?= $imgSrc ?>" alt="<?= $title ?>">
                  <div class="card-body">
                    <p class="card-text">
                      <?= $title; ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-secondary" target="_blank" href="<?= $urlPost ?>">View</a>
                      </div>
                      <small class="text-muted"><?= $category ?></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="<?= $imgSrc2 ?>" src="<?= $imgSrc2 ?>" alt="<?= $title2 ?>">
                  <div class="card-body">
                    <p class="card-text">
                      <?= $title2 ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-secondary" target="_blank" href="<?= $urlPost2 ?>">View</a>
                      </div>
                      <small class="text-muted"><?= $category ?></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="<?= $imgSrc3 ?>" src="<?= $imgSrc3 ?>" alt="<?= $title3 ?>">
                  <div class="card-body">
                    <p class="card-text">
                      <?= $title3 ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a type="button" class="btn btn-sm btn-outline-secondary" target="_blank"" href="<?= $urlPost3 ?>">View</a>
                      </div>
                      <small class="text-muted"><?= $category ?></small>
                    </div>
                  </div>
                </div>
              </div>
            <?php
                  });
              });
            ?>
          </div>
        </div>
      </div>
    </main>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>© SALAH BOUAGGA</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
              ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>
