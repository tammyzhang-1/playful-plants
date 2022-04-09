<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  $id = $_GET["id"] ?? NULL;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Playful Plants</title>
  <link rel="stylesheet" type="text/css" href="public/styles/site.css"/>
</head>

<body>
  <header>
    <h1>Playful Plants</h1>
    <button type="button"><a href="/detail-admin">Log in</a></button>
  </header>
  <div class="breadcrumb">
    <a href="/">< Back to Home</a>
  </div>

  <main>
  <div class="detail-page">
    <div class="detail-photo">
      <img src="public/images/FL_27.jpg" alt="">
    </div>
    <div class="detail-text">
      <div class="garden-list">
        <h2>High Mallow</h2>
        <h3>Gardening care:</h3>
        <ul>
          <li>Perennial</li>
          <li>Full sun, partial shade</li>
          <li>Hardiness Zone Range: 4-8</li>
          <li>Type: flower</li>
        </ul>
      </div>
      <div class="play-list">
        <h3>Types of play supported:</h3>
          <ul>
            <li>Type 1</li>
            <li>Type 2</li>
            <li>Type 3</li>
          </ul>
      </div>
    </div>
  </div>
  </main>

</body>

</html>
