<?php

/*
../app/routeur.php
ROUTEUR PRINCIPAL
*/



  if (isset($_GET['posts'])):
    include_once '../app/routeurs/posts.php';


    // DETAILS D'UN POST
    // PATTERN: ?postID=x
    // CTRL: postsControleur
    // ACTION: show
  elseif (isset($_GET['postID'])):
      include_once '../app/controleurs/postsControleur.php';
      \App\Controleurs\PostsControleur\showAction($connexion, $_GET['postID']);


      // ROUTE PAR DEFAUT
      // PATTERN: /
      // CTRL: postsControleur
      // ACTION: index
  else:
    include_once '../app/controleurs/postsControleur.php';
    \App\Controleurs\PostsControleur\indexAction($connexion);
endif;
