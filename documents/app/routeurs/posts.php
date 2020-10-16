<?php


  include '../app/controleurs/postsControleur.php';

  switch ($_GET['posts']) {

    case 'editUpdate':
      // MODIFICATION D'UN POSTS: UPDATE
      // PATTERN: index.php?posts=editUpdate&id=xxx
      // CTRL: postsControleur
      // ACTION: editUpdate
        \App\Controleurs\PostsControleur\editUpdateAction($connexion, [
        'id' => $_GET['id'],
        'title'      => $_POST['title'],
        'text'       => $_POST['text'],
        'quote'      => $_POST['quote'],
        'category_id' => $_POST['category_id']
      ]
        );
        break;
//------------------------------------------------------------------------------

    case 'editForm':
      // MODIFICATION D'UN POSTS: FORMULAIRE
      // PATTERN: index.php?posts=editForm
      // CTRL: postsControleur
      // ACTION: editForm
        \App\Controleurs\PostsControleur\editFormAction($connexion, $_GET['id']
        );
        break;
//------------------------------------------------------------------------------

    case 'delete':
        // SUPPRESSION POSTS
        // PATTERN: index.php?posts=delete&id=x
        // CTRL: postsControleur
        // ACTION: delete
          \App\Controleurs\PostsControleur\deleteAction($connexion, $_GET['id']);
          break;
//------------------------------------------------------------------------------

    case 'addInsert':
      // AJOUT POSTS: INSERT
      // PATTERN: index.php?posts=addInsert
      // CTRL: postsControleur
      // ACTION: addInsert
        \App\Controleurs\PostsControleur\addInsertAction($connexion, [
          'title'      => $_POST['title'],
          'text'       => $_POST['text'],
          'quote'      => $_POST['quote'],
          'category_id' => $_POST['category_id']
        ]);
        break;
//------------------------------------------------------------------------------

    case 'addForm':
        // AJOUT POSTS: FORMULAIRE
        // PATTERN: index.php?posts=addForm
        // CTRL: postsControleur
        // ACTION: addForm
          \App\Controleurs\PostsControleur\addFormAction($connexion);
          break;




      default:
      break;


  }
