<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  $id = $_GET["id"] ?? NULL;

  $records = exec_sql_query($db, "SELECT * FROM entries INNER JOIN documents ON entries.id = documents.id WHERE (entries.id=:id);", array(":id" => $id)) -> fetchAll();

  $record = $records[0];

  $tag_list = exec_sql_query($db, "SELECT tags.id, tags.name
  FROM (entry_tags INNER JOIN tags ON entry_tags.tag_id = tags.id)
  WHERE (entry_tags.entry_id = :id);", array(":id" => $id)) -> fetchAll();
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
    <button type="button">Log in</button>
  </header>
  <div class="breadcrumb">
    <a href="/">&lt; Back to Home</a>
  </div>

  <main>
  <div class="detail-page">
    <div class="detail-photo">
      <!-- default.png is original work (created by Tammy Zhang) -->
      <img src="<?php echo "/public/uploads/documents/" . $record["file_name"] . "." . $record["file_ext"]; ?>" alt="Picture of <?php echo $record["name"]; ?>."/>
    </div>
    <div class="detail-text">
      <div class="garden-list">
        <h2><?php echo ucwords($record["name"]); ?></h2>
        <h3>Gardening information:</h3>
        <ul>
          <li>Hardiness Zone: <?php echo $record["hardiness_zone"]; ?></li>
          <?php
          foreach ($tag_list as $tag) { ?>
            <?php echo "<li>" . $tag["name"] . "</li>"; ?>
          <?php } ?>
        </ul>
      </div>
      <div class="play-list">
        <h3>Types of play supported:</h3>
          <ul>
          <?php if ($record["exploratory_constructive_play"]) { ?>
                <li>Exploratory Constructive Play</li>
              <?php } ?>
              <?php if ($record["exploratory_sensory_play"]) { ?>
                <li>Exploratory Sensory Play</li>
              <?php } ?>
              <?php if ($record["physical_play"]) { ?>
                <li>Physical Play</li>
              <?php } ?>
              <?php if ($record["imaginative_play"]) { ?>
                <li>Imaginative Play</li>
              <?php } ?>
              <?php if ($record["restorative_play"]) { ?>
                <li>Restorative Play</li>
              <?php } ?>
              <?php if ($record["expressive_play"]) { ?>
                <li>Expressive Play</li>
              <?php } ?>
              <?php if ($record["play_with_rules"]) { ?>
                <li>Play with Rules</li>
              <?php } ?>
              <?php if ($record["bio_play"]) { ?>
                <li>Bio Play</li>
              <?php } ?>
          </ul>
      </div>
    </div>
  </div>
  </main>

</body>

</html>
