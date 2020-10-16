
<?php
// INCLUDE DU FICHIER CONNEXION CAR IMPOSSIBLE DE FAIRE APPEL A $CONNEXION SANS CE FICHIER
include '../noyau/connexion.php';

?>


<!-- Form Start -->
  <form action="posts/add/insert" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Enter your title here" />
    </div>
    <div class="form-group">
      <label for="text">Text</label>
      <textarea id="text" name="text" class="form-control" rows="5" placeholder="Enter your text here"></textarea>
    </div>
    <div class="form-group">
      <label for="quote">Quote</label>
      <textarea id="quote" name="quote" class="form-control" rows="5" placeholder="Enter your quote here"></textarea>
    </div>
    <div class="form-group">
      <?php include '../app/modeles/categoriesModele.php';
      $categories = \App\Modeles\CategoriesModele\findAll($connexion);
      include '../app/vues/categories/index.php'; ?>
    </div>
    <div>
      <input class="btn btn-primary" type="submit" value="submit" />
      <input class="btn btn-secondary" type="reset" value="reset" />
    </div>
  </form>
<!-- Form End -->
