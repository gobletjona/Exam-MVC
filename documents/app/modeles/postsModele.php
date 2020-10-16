<?php

/*
./app/modeles/postsModele.php
MODELES DES POSTS
*/
namespace App\Modeles\PostsModele;

function update(\PDO $connexion, array $data ) {
  $sql = "UPDATE posts
          SET title = :title,
              text = :text,
              quote = :quote,
              category_id = :category_id
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
  $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
  $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
  $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
  $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_INT);
  return intVal($rs->execute());
}
//-------------------------------------------------------------------------------------


function delete(\PDO $connexion, int $id){
  $sql = "DELETE FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_STR);
  return intVal($rs->execute());
}
//-------------------------------------------------------------------------------------


function insertOne(\PDO $connexion, array $data = null) :int {
  $sql = "INSERT INTO posts
          SET title = :title,
              text = :text,
              quote = :quote,
              category_id = :category_id,
              created_at = NOW();";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':title', $data['title'], \PDO::PARAM_STR);
  $rs->bindValue(':text', $data['text'], \PDO::PARAM_STR);
  $rs->bindValue(':quote', $data['quote'], \PDO::PARAM_STR);
  $rs->bindValue(':category_id', $data['category_id'], \PDO::PARAM_INT);
  $rs->execute();
  return $connexion->lastInsertId();
}
//-------------------------------------------------------------------------------------


function findAll(\PDO $connexion) :array {
  $sql = "SELECT *, posts.id as postID, posts.created_at as postCreation, categories.name as categoryName
          FROM posts
          LEFT JOIN categories ON posts.category_id = categories.id
          ORDER BY postCreation DESC
          LIMIT 10;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
//-------------------------------------------------------------------------------------


function findOneById(\PDO $connexion, int $id) :array {
  $sql = "SELECT *
          FROM posts
          WHERE id = :id;";
  $rs = $connexion->prepare($sql);
  $rs->bindValue(':id', $id, \PDO::PARAM_INT);
  $rs->execute();
  return $rs->fetch(\PDO::FETCH_ASSOC);
}
