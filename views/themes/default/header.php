<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SYS_NAME; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="<?= TEMPLATE_PATH; ?>/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
  <a class="navbar-brand" href="<?= BASE; ?>"><?= SYS_NAME; ?></a>
  <button class="navbar-toggler" type="button" 
  data-toggle="collapse" 
  data-target="#main_nav" 
  aria-controls="main_nav" 
  aria-expanded="false" 
  aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?= BASE; ?>"><?php echo $text_home; ?> </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $user_list_href; ?>"><?php echo $text_user_list; ?></a>
      </li>
    </ul>
  </div>
  </div>
</nav>

