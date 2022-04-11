<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  $id = $_GET["id"] ?? NULL;

  $records = exec_sql_query($db, "SELECT * FROM entries WHERE (id=:id);", array(":id" => $id)) -> fetchAll();
  $record = $records[0];

  $tag_array = exec_sql_query($db, "SELECT tags.id
  FROM (entry_tags INNER JOIN tags ON entry_tags.tag_id = tags.id)
  WHERE (entry_tags.entry_id = :id);", array(":id" => $id)) -> fetchAll();


  $name = '';
  $scientific_name = '';
  $plant_id = '';
  $hardiness_zone = '';

  $exploratory_constructive = '';
  $exploratory_sensory = '';
  $physical = '';
  $imaginative = '';
  $restorative = '';
  $expressive = '';
  $rules = '';
  $bio = '';

  $perennial = '';
  $annual = '';
  $full_sun = '';
  $partial_shade = '';
  $full_shade = '';
  $plant_type = '';

  // sticky variables
  $sticky_name = '';
  $sticky_scientific_name = '';
  $sticky_plant_id = '';
  $sticky_hardiness_zone = '';

  $sticky_exploratory_constructive = '';
  $sticky_exploratory_sensory = '';
  $sticky_physical = '';
  $sticky_imaginative = '';
  $sticky_restorative = '';
  $sticky_expressive = '';
  $sticky_rules = '';
  $sticky_bio = '';

  $sticky_perennial = '';
  $sticky_annual = '';
  $sticky_full_sun = '';
  $sticky_partial_shade = '';
  $sticky_full_shade = '';
  $sticky_plant_type = '';

  // to be put under a conditional statement
  $name = $record["name"];
  $scientific_name = $record["scientific_name"];
  $plant_id = $record["plant_id"];
  $hardiness_zone = $record["hardiness_zone"];

  $exploratory_constructive = $record["exploratory_constructive_play"];
  $exploratory_sensory = $record["exploratory_sensory_play"];
  $physical = $record["physical_play"];
  $imaginative = $record["imaginative_play"];
  $restorative = $record["restorative_play"];
  $expressive = $record["expressive_play"];
  $rules = $record["play_with_rules"];
  $bio = $record["bio_play"];

  $perennial = '';
  $annual = '';
  $full_sun = '';
  $partial_shade = '';
  $full_shade = '';
  $plant_type = '';

  $sticky_name = $name;
  $sticky_scientific_name = $scientific_name;
  $sticky_plant_id = $plant_id;
  $sticky_exploratory_constructive = (empty($exploratory_constructive) ? '' : 'checked');
  $sticky_exploratory_sensory = (empty($exploratory_sensory) ? '' : 'checked');
  $sticky_physical = (empty($physical) ? '' : 'checked');
  $sticky_imaginative = (empty($imaginative) ? '' : 'checked');
  $sticky_restorative = (empty($restorative) ? '' : 'checked');
  $sticky_expressive = (empty($expressive) ? '' : 'checked');
  $sticky_rules = (empty($rules) ? '' : 'checked');
  $sticky_bio = (empty($bio) ? '' : 'checked');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Playful Plants</title>
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" media="all"/>

</head>

<body>
  <header>
    <h1>Playful Plants</h1>
    <button type="button"><a href="/">Log out</a></button>
  </header>
  <div class="breadcrumb">
    <a href="/admin">< Back to Catalog View</a>
  </div>

  <main>
  <div class="detail-page">
    <div class="detail-photo">
      <img src="/public/images/<?php echo $record["plant_id"]; ?>.jpg" onerror=this.src="/public/images/default.png" alt=""/>
    </div>
    <div class="detail-text">
    <section class="edit-plant-form">
      <h2>Edit <?php echo ucwords(htmlspecialchars($record["name"])); ?></h2>
      <form id="edit-plant" method="post" action="/" novalidate>

        <div class="edit-text">
          <label for="edit-plant-name">Plant Name (Colloquial):</label>
          <input type="text" name="edit-plant-name" id="edit-plant-name" value="<?php echo ucwords(htmlspecialchars($record["name"])); ?>"/>
        </div>

        <div class="edit-text">
          <label for="edit-scientific-name">Plant Name (Scientific):</label>
          <input type="text" name="edit-scientific-name" id="edit-scientific-name" value="<?php echo htmlspecialchars($record["scientific_name"]); ?>" />
        </div>

        <div class="edit-text">
          <label for="edit-plant-id">Plant ID:</label>
            <input type="text" name="edit-plant-id" id="edit-plant-id" value="<?php echo htmlspecialchars($record["plant_id"]); ?>" />
        </div>

        <h3>Gardening Characteristics:</h3>
        <div class="seasonality">
          <div>
            <input type="checkbox" name="edit-perennial" id="edit-perennial" checked/>
            <label for="edit-perennial">Perennial</label>
          </div>
          <div>
            <input type="checkbox" name="edit-annual" id="edit-annual"/>
            <label for="edit-annual">Annual</label>
          </div>
        </div>
        <div class="sun-needs">
          <div>
            <input type="checkbox" name="edit-full-sun" id="edit-full-sun" checked/>
            <label for="edit-full-sun">Full Sun</label>
          </div>
          <div>
            <input type="checkbox" name="edit-partial-shade" id="edit-partial-shade" checked/>
            <label for="edit-partial-shade">Partial Shade</label>
          </div>
          <div>
            <input type="checkbox" name="edit-full-shade" id="edit-full-shade"/>
            <label for="edit-full-shade">Full Shade</label>
          </div>
        </div>

        <div>
          <label for="edit-type-select">Plant type:  </label>
            <select name="edit-type-select" id="edit-type-select">
              <option value="none">None selected</option>
              <option value="shrub">Shrub</option>
              <option value="grass">Grass</option>
              <option value="vine">Vine</option>
              <option value="tree">Tree</option>
              <option value="flower" selected>Flower</option>
              <option value="groundcover">Groundcover</option>
              <option value="other">Other</option>
            </select>
          </div>

        <!-- div containing multiple select section of form for play types -->
        <h3>Types of Play Supported:</h3>
        <div>
          <div class="edit-play-checkboxes">
            <div class="play-type">
              <input type="checkbox" name="edit-exploratory-constructive" id="edit-exploratory-constructive" <?php echo $sticky_exploratory_constructive; ?>/>
              <label for="edit-exploratory-constructive">Exploratory Constructive Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-exploratory-sensory" id="edit-exploratory-sensory" <?php echo $sticky_exploratory_sensory; ?>/>
              <label for="edit-exploratory-sensory">Exploratory Sensory Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-physical" id="edit-physical" <?php echo $sticky_physical; ?>/>
              <label for="edit-physical">Physical Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-imaginative" id="edit-imaginative" <?php echo $sticky_imaginative; ?>/>
              <label for="edit-imaginative">Imaginative Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-restorative" id="edit-restorative" <?php echo $sticky_restorative; ?>/>
              <label for="edit-restorative">Restorative Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-expressive" id="edit-expressive" <?php echo $sticky_expressive; ?>/>
              <label for="edit-expressive">Expressive Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-rules" id="edit-rules" <?php echo $sticky_rules; ?>/>
              <label for="edit-rules">Play with Rules</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-bio" id="edit-bio" <?php echo $sticky_bio; ?>/>
              <label for="edit-bio">Bio Play</label>
            </div>
          </div>
        </div>
        <div class="submit">
          <input id="edit-submit" type="submit" name="edit-plant" value="Save Changes" />
        </div>
        </form>
    </section>

    </div>
  </div>
  </main>

</body>

</html>
