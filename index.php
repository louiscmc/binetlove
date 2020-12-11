<!DOCTYPE html>
<html>
    <?php require("utils.php");
        $title="Binet Love";
        $CSS="css/perso.css";
        generateHTMLHeader($title, $CSS);
        ?>
        <main>  
            <div class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4">Spread <span class='red'>love</span>, not the virus</h1>
              </div>
            </div>
            <div id="myCarousel" class="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img class="d-block w-100" src="fond_carousel_1.jpg">
                    <div class="container">
                      <div class="carousel-caption text-left">
                        <h1>Example headline.</h1>
                        <p>Texte random.</p>
                        <p><a class="btn btn-lg btn-rose" href="#" role="button">Envoyer un design de lettre</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="fond_carousel_1.jpg">
                    <div class="container">
                      <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Texte random.</p>
                        <p><a class="btn btn-lg btn-rose" href="#" role="button">Learn more</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="fond_carousel_1.jpg">
                    <div class="container">
                      <div class="carousel-caption text-right">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-rose" href="#" role="button">Browse gallery</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <div id="jumbo2" class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Il est temps d'écrire une lettre !</h1>
                    <p class="lead">N'oubliez pas qu'il sera possible d'écrire des lettres directement sur papier aux prochains événements.</p>
                    <hr class="my-4">
                    <p>Envoyez tout votre amour ! &#128149;</p>
                    <a class="btn btn-rose btn-lg" href="submit_letter.php" role="button">Ecrire une lettre</a>
                </div>
            </div>
        </main>
        <?php 
        generateHTMLFooter()
        ?>
</html>
