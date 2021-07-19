<?php
  session_start();

  if( !(isset($_SESSION['idU'])) ){
      header('Location: ./index.php');
  }
?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi biblioteca</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="src/css/main.css">
    <style>
      .foot{
        width: auto;
        min-height: 750px;
      }
      .ft{
        text-align: center;
        padding: 15px;
      }
      .cs:hover{
        text-decoration: none;
      }
      .min{
        min-height: 700px;
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-primary">
        <div class="container">
          <a class="navbar-brand text-light text-link pt-2" href="index.php">#</a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light" href="libros.php">LIBROS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="personas.php">PERSONAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="entregas.php">PRESTAMOS</a>
              </li>
            </ul>
          </div>
          <a href="src/php/cerrar.php" class="btn btn-link text-light cs">cerrar sesion</a>
        </div>
      </nav>
      <div class="container-fluid min">