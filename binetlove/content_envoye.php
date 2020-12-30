<div class="container">
    <br>
    <a class="btn btn-light float-right" href="index.php?page=letter" role="button">Revenir au formulaire</a>
    <?php get_lettres($dbh, $_SESSION['login']); ?>
</div>

