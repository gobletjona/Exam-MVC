<?php

/*
./app/controleurs/postsControleur.php
CONTROLEUR DES POSTS
*/

namespace App\Controleurs\PostsControleur;
use App\Modeles\PostsModele;
use App\Modeles\CategoriesModele;

function editUpdateAction(\PDO $connexion, array $data) : array{

  //Je demande au modèle de modifier le post
  include_once '../app/modeles/postsModele.php';
  $return1 = \App\Modeles\PostsModele\update($connexion, $data);

  //Je demande au modele d'ajouter les catégories correspondantes
  foreach ($_POST['categories'] as $categorieID) {
    $return = \App\Modeles\PostsModele\insertCategoriesById($connexion, [
    'postID' => $id,
    'categorieID' => $categorieID]);
  }

  //Je redirige vers la liste des posts
  header('location: ' . BASE_URL_PUBLIC . 'posts');
}
//-------------------------------------------------------------------------------------


function editFormAction(\PDO $connexion, int $id){
  //Je demande au modéle le post à afficher dans le formulaire
  include_once '../app/modeles/postsModele.php';
  $post = \App\Modeles\PostsModele\findOneById($connexion, $id);

  //Je charge la vue editForm dans $content
  GLOBAL $content, $title;
  $title = TITLE_EDITFORM_POST;
  ob_start();
  include '../app/vues/posts/editForm.php';
  $content = ob_get_clean();
}
//-------------------------------------------------------------------------------------


function deleteAction(\PDO $connexion, int $id) {
  // Je demande au modele de supprimer la catégorie
  include_once '../app/modeles/postsModele.php';
  $return =  \App\Modeles\PostsModele\delete($connexion, $id);
  // Je redirige vers la liste des catégories
    header('location: ' . BASE_URL_PUBLIC . 'posts' );
}
//-------------------------------------------------------------------------------------


function addInsertAction(\PDO $connexion, array $data){
  //Je demande d'ajouter un posts au modele
  include_once '../app/modeles/postsModele.php';
  $id = \App\Modeles\PostsModele\insertOne($connexion, $data);

  //Je redirige vers la liste des posts
  header('location: ' . BASE_URL_PUBLIC . 'posts');
}
//-------------------------------------------------------------------------------------

function addFormAction() {
  // Je charge la vue addForm dans $content
    GLOBAL $content, $title;
    $title = TITLE_POSTS_ADDFORM;
    ob_start();
      include '../app/vues/posts/addForm.php';
    $content = ob_get_clean();
}
//-------------------------------------------------------------------------------------


function indexAction(\PDO $connexion) {
  // Je mets la liste des posts dans posts
    include_once '../app/modeles/postsModele.php';
    $posts = \App\Modeles\PostsModele\findAll($connexion);

  // Je charge la vue index dans $content
    GLOBAL $content, $title;
    $title = TITLE_POSTS_INDEX;
    ob_start();
      include '../app/vues/posts/index.php';
    $content = ob_get_clean();
}
//-------------------------------------------------------------------------------------

function showAction(\PDO $connexion, int $id) {
  //Je met dans $postID les infos du post que je demande au modéle
      include_once '../app/modeles/postsModele.php';
      $post = \App\Modeles\PostsModele\findOneById($connexion, $id);

  //Je met dans $categorieID les infos de la catégorie du post que je demande au categoriesModele
      include_once '../app/modeles/categoriesModele.php';
      $category = \App\Modeles\CategoriesModele\findOneById($connexion, $post['category_id']);

  //Je charge la vue show dans $ content
      GLOBAL $content, $title;
      $title = "Alex Parker - " . $post['title'];
      ob_start();
        include '../app/vues/posts/show.php';
        $content = ob_get_clean();
}
