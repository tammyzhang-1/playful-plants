<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  define("MAX_FILE_SIZE", 1000000);

  $id = $_GET["id"] ?? NULL;
  $edit_plant = $_POST["edit-plant"];

  // initialize variables needed to keep track of plant data
  // edit form feedback classes
  $name_feedback_class = 'hidden';
  $scientific_name_feedback_class = 'hidden';
  $plant_id_feedback_class = 'hidden';
  $plant_id_unique_feedback_class = 'hidden';
  $play_type_feedback_class = 'hidden';
  $hardiness_zone_feedback_class = 'hidden';
  $shade_feedback_class = 'hidden';
  $plant_type_feedback_class = 'hidden';
  $file_ext_feedback_class = 'hidden';

  $show_confirmation = False;
  $plant_added = False;

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

  // initialize sticky variables
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

  if ($edit_plant || $id) {
    $records = exec_sql_query($db, "SELECT * FROM entries INNER JOIN documents ON entries.id = documents.id WHERE (entries.id=:id);", array(":id" => $id)) -> fetchAll();

    $tag_array = exec_sql_query($db, "SELECT tags.id AS 'tags.id'
    FROM (entry_tags INNER JOIN tags ON entry_tags.tag_id = tags.id)
    WHERE (entry_tags.entry_id = :id);", array(":id" => $id)) -> fetchAll();

    $tag_list = array_column($tag_array, 'tags.id');

    if (count($records) > 0) {
      $record = $records[0];
    }
  }

  if ($record) {
    // assign initialized variables a value based on data retrieved from table
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

    $perennial = in_array(1, $tag_list);
    $annual = in_array(2, $tag_list);;
    $full_sun = in_array(3, $tag_list);;
    $partial_shade = in_array(4, $tag_list);;
    $full_shade = in_array(5, $tag_list);;

    $shrub = in_array(6, $tag_list);
    $grass = in_array(7, $tag_list);
    $vine = in_array(8, $tag_list);
    $tree = in_array(9, $tag_list);
    $flower = in_array(10, $tag_list);
    $groundcover = in_array(11, $tag_list);
    $other = in_array(12, $tag_list);

    // set sticky values
    $sticky_name = $name;
    $sticky_scientific_name = $scientific_name;
    $sticky_plant_id = $plant_id;
    $sticky_hardiness_zone = $hardiness_zone;
    $sticky_exploratory_constructive = $exploratory_constructive ? 'checked' : '';
    $sticky_exploratory_sensory = $exploratory_sensory ? 'checked' : '';
    $sticky_physical = $physical ? 'checked' : '';
    $sticky_imaginative = $imaginative ? 'checked' : '';
    $sticky_restorative = $restorative ? 'checked' : '';
    $sticky_expressive = $expressive ? 'checked' : '';
    $sticky_rules = $rules ? 'checked' : '';
    $sticky_bio = $bio ? 'checked' : '';

    $sticky_perennial = $perennial ? 'checked' : '';
    $sticky_annual = $annual ? 'checked' : '';
    $sticky_full_sun = $full_sun ? 'checked' : '';
    $sticky_partial_shade = $partial_shade ? 'checked' : '';
    $sticky_full_shade = $full_shade ? 'checked' : '';

    $sticky_shrub = $shrub ? 'selected' : '';
    $sticky_grass = $grass ? 'selected' : '';
    $sticky_vine = $vine ? 'selected' : '';
    $sticky_tree = $tree ? 'selected' : '';
    $sticky_flower = $flower ? 'selected' : '';
    $sticky_groundcover = $groundcover ? 'selected' : '';
    $sticky_other = $other ? 'selected' : '';

    // edit form code when "save changes" is pressed
    if ($edit_plant) {
      // code to be executed when "save changes" button is pressed
      $name = trim($_POST['edit-plant-name']); //untrusted
      $scientific_name = trim($_POST['edit-scientific-name']); //untrusted
      $plant_id = trim($_POST['edit-plant-id']); //untrusted
      $hardiness_zone = trim($_POST['edit-hardiness-zone']); //untrusted
      $exploratory_constructive = $_POST['edit-exploratory-constructive']; //untrusted
      $exploratory_sensory = $_POST['edit-exploratory-sensory']; //untrusted
      $physical = $_POST['edit-physical']; //untrusted
      $imaginative = $_POST['edit-imaginative']; //untrusted
      $restorative = $_POST['edit-restorative']; //untrusted
      $expressive = $_POST['edit-expressive']; //untrusted
      $rules = $_POST['edit-rules']; //untrusted
      $bio = $_POST['edit-bio']; //untrusted

      $perennial = $_POST['edit-perennial']; //untrusted
      $annual = $_POST['edit-annual']; //untrusted
      $full_sun = $_POST['edit-full-sun']; //untrusted
      $partial_shade = $_POST['edit-partial-shade']; //untrusted
      $full_shade = $_POST['edit-full-shade']; //untrusted
      $plant_type = ucfirst($_POST['edit-type-select']); //untrusted

      //$upload = $_FILES['edit-image-file'];

      $edit_form_valid = True;

      // check validity of responses
      if (empty($name)) {
        $edit_form_valid = False;
        $name_feedback_class = '';
      }

      if (empty($scientific_name)) {
        $edit_form_valid = False;
        $scientific_name_feedback_class = '';
      }

      if (empty($plant_id)) {
        $edit_form_valid = False;
        $plant_id_feedback_class = '';
      } else {
        // check plant id is unique
        $check_records = exec_sql_query($db, "SELECT * FROM entries WHERE (plant_id = :plant_id);",
          array(
            ':plant_id' => $plant_id
          )
        ) -> fetchAll();
        if (count($check_records) > 0 && $check_records[0]['id'] != $id) {
          $edit_form_valid = False;
          $plant_id_unique_feedback_class = '';
        }
      }

      if (empty($exploratory_constructive) && empty($exploratory_sensory) && empty($physical) && empty($imaginative) && empty($restorative) && empty($expressive ) && empty($rules) && empty($bio)) {
        $edit_form_valid = False;
        $play_type_feedback_class = '';
      }

      if (empty($hardiness_zone)) {
        $edit_form_valid = False;
        $hardiness_zone_feedback_class = '';
      }
      if (empty($full_sun) && empty($partial_shade) && empty($full_shade)) {
        $edit_form_valid = False;
        $shade_feedback_class = '';
      }

      if (!in_array($plant_type, array("Shrub", "Grass", "Vine", "Tree", "Flower", "Groundcover", "Other"))) {
        $edit_form_valid = False;
        $plant_type_feedback_class = '';
      }

      // if ($upload['size'] != 0) {
      //   if ($upload['error'] == UPLOAD_ERR_OK) {
      //     $image_filename = basename($upload['name']);
      //     $image_ext = strtolower(pathinfo($image_filename, PATHINFO_EXTENSION));
      //     if (!in_array($image_ext, array('jpg', 'jpeg', 'png'))) {
      //       $edit_form_valid = False;
      //     }
      //   } else {
      //     $edit_form_valid = False;
      //   }
      // } else {
      //   // no file was chosen
      //   // use placeholder image for this new entry
      //   $image_filename = "default.png";
      //   $image_ext = "png";
      // }

      if ($edit_form_valid) {
        //form is valid; edit record in database
        $result = exec_sql_query($db, "UPDATE entries SET
        name = :name,
        scientific_name = :scientific_name,
        plant_id = :plant_id,
        hardiness_zone = :hardiness_zone,
        exploratory_constructive_play = :exploratory_constructive,
        exploratory_sensory_play = :exploratory_sensory,
        physical_play = :physical,
        imaginative_play = :imaginative,
        restorative_play = :restorative,
        expressive_play = :expressive,
        play_with_rules = :rules,
        bio_play = :bio
        WHERE (id=:id);",
        array(
          ':name' => $name,
          ':scientific_name' => $scientific_name,
          ':plant_id' => $plant_id,
          ':hardiness_zone' => $hardiness_zone,
          ':exploratory_constructive' => ($exploratory_constructive) ? 1 : 0,
          ':exploratory_sensory' => ($exploratory_sensory) ? 1 : 0,
          ':physical' => ($physical) ? 1 : 0,
          ':imaginative' => ($imaginative) ? 1 : 0,
          ':restorative' => ($restorative) ? 1 : 0,
          ':expressive' => ($expressive) ? 1 : 0,
          ':rules' => ($rules) ? 1 : 0,
          ':bio' => ($bio) ? 1 : 0,
          ':id' => ($id)
          )
        );



        // push id of tag into array if it is selected
        // if ($perennial && !in_array(1, $tags)) {
        //   array_push($tags, 1);
        // }
        // if ($annual && !in_array(2, $tags)) {
        //   array_push($tags, 2);
        // }
        // if ($full_sun && !in_array(3, $tags)) {
        //   array_push($tags, 3);
        // }
        // if ($partial_shade && !in_array(4, $tags)) {
        //   array_push($tags, 4);
        // }
        // if ($full_shade && !in_array(5, $tags)) {
        //   array_push($tags, 5);
        // }
        // if ($plant_type == "Shrub" && !in_array(6, $tags)) {
        //   array_push($tags, 6);
        // }
        // if ($plant_type == "Grass" && !in_array(7, $tags)) {
        //   array_push($tags, 7);
        // }
        // if ($plant_type == "Vine" && !in_array(8, $tags)) {
        //   array_push($tags, 8);
        // }
        // if ($plant_type == "Tree" && !in_array(9, $tags)) {
        //   array_push($tags, 9);
        // }
        // if ($plant_type == "Flower" && !in_array(10, $tags)) {
        //   array_push($tags, 10);
        // }
        // if ($plant_type == "Groundcover" && !in_array(11, $tags)) {
        //   array_push($tags, 11);
        // }
        // if ($plant_type == "Other" && !in_array(12, $tags)) {
        //   array_push($tags, 12);
        // }

        // $new_entry_id = $db->lastInsertId('id');

        // foreach ($tags as $tag) {
        //   $result_tag = exec_sql_query($db, 'UPDATE entry_tags SET
        //   entry_id = :entry_id,
        //   tag_id = :tag_id,
        //     array(
        //       'entry_id' => $new_entry_id,
        //       'tag_id' => $tag
        //     )
        //   );
        // }

        // $file_result = exec_sql_query(
        //   $db,
        //   "UPDATE documents SET
        //   file_name = :file_name,
        //   file_ext = :file_ext,
        //   array(
        //     ':file_name' => $image_filename,
        //     ':file_ext' => $image_ext,
        //   )
        // );
        // if ($file_result) {
        //   // only upload image if a file was selected
        //   if ($upload) {
        //     $id_filename = 'public/uploads/documents/' . $new_entry_id . '.' . $image_ext;
        //     move_uploaded_file($upload["tmp_name"], $id_filename);
        //   }
        // } else {
        //   $file_ext_feedback_class = '';
        // }
      }

      if ($result) {
        $plant_edited = True;
        $show_confirmation = True;
      }
      // edit form is not valid; sticky values are set
      $sticky_name = $name; //untrusted
      $sticky_scientific_name = $scientific_name; //untrusted
      $sticky_plant_id = $plant_id; //untrusted
      $sticky_hardiness_zone = $hardiness_zone; // untrusted
      $sticky_exploratory_constructive = (empty($exploratory_constructive) ? '' : 'checked');
      $sticky_exploratory_sensory = (empty($exploratory_sensory) ? '' : 'checked');
      $sticky_physical = (empty($physical) ? '' : 'checked');
      $sticky_imaginative = (empty($imaginative) ? '' : 'checked');
      $sticky_restorative = (empty($restorative) ? '' : 'checked');
      $sticky_expressive = (empty($expressive) ? '' : 'checked');
      $sticky_rules = (empty($rules) ? '' : 'checked');
      $sticky_bio = (empty($bio) ? '' : 'checked');

      $sticky_perennial = (empty($perennial) ? '' : 'checked');
      $sticky_annual = (empty($annual) ? '' : 'checked');
      $sticky_full_sun = (empty($full_sun) ? '' : 'checked');
      $sticky_partial_shade = (empty($partial_shade) ? '' : 'checked');
      $sticky_full_shade = (empty($full_shade) ? '' : 'checked');

      $sticky_shrub = ($plant_type == 'Shrub' ? 'selected' : '');
      $sticky_grass = ($plant_type == 'Grass' ? 'selected' : '');
      $sticky_vine = ($plant_type == 'Vine' ? 'selected' : '');
      $sticky_tree = ($plant_type == 'Tree' ? 'selected' : '');
      $sticky_flower = ($plant_type == 'Flower' ? 'selected' : '');
      $sticky_groundcover = ($plant_type == 'Groundcover' ? 'selected' : '');
      $sticky_other = ($plant_type == 'Other' ? 'selected' : '');
    }
  }

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
    <button type="button">Log out</button>
  </header>
  <div class="breadcrumb">
    <a href="/admin">&lt; Back to Catalog View</a>
  </div>

  <main>
  <?php if ($show_confirmation) { ?>
      <!-- confirmation after successfully adding a plant, hidden by default -->
      <div class="confirmation">Changes saved successfully.</div>
    <?php } ?>
  <div class="detail-page">
    <div class="detail-photo">
      <?php if ($record['file_name'] == 'default.png') {
          $image_url = '/public/uploads/documents/default.png';
        } else {
          $check1 = $record['file_name'];
          $image_url = "/public/uploads/documents/" . $record["id"] . "." . $record["file_ext"];
        } ?>
      <!-- default.png is original work (created by Tammy Zhang) -->
      <img src="<?php echo $image_url; ?>" alt="Picture of <?php echo $record["name"]; ?>."/>
    </div>

    <div class="detail-text">
    <section class="edit-plant-form">
      <h2>Edit <?php echo ucwords(htmlspecialchars($record["name"])); ?></h2>
      <form id="edit-plant" method="post" action="<?php echo "/admin/edit?id=" . $record["id"]; ?>" enctype="multipart/form-data" novalidate>

        <div class="feedback <?php echo $name_feedback_class; ?>">A colloquial name is required.</div>
        <div class="edit-text">
          <label for="edit-plant-name">Plant Name (Colloquial):</label>
          <input type="text" name="edit-plant-name" id="edit-plant-name" value="<?php echo ucwords(htmlspecialchars($sticky_name)); ?>"/>
        </div>

        <div class="feedback <?php echo $scientific_name_feedback_class; ?>">A scientific name is required.</div>
        <div class="edit-text">
          <label for="edit-scientific-name">Plant Name (Scientific):</label>
          <input type="text" name="edit-scientific-name" id="edit-scientific-name" value="<?php echo htmlspecialchars($sticky_scientific_name); ?>" />
        </div>

        <div class="feedback <?php echo $plant_id_feedback_class; ?>">A plant ID is required.</div>
        <div class="feedback <?php echo $plant_id_unique_feedback_class; ?>">A plant with that ID already exists.</div>
        <div class="edit-text">
          <label for="edit-plant-id">Plant ID:</label>
            <input type="text" name="edit-plant-id" id="edit-plant-id" value="<?php echo htmlspecialchars($sticky_plant_id); ?>" />
        </div>

          <div class="feedback <?php echo $file_ext_feedback_class; ?>">File is required to be in .jpg or .png format.</div>
          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
          <div class="file-upload" id="edit-file">
            <label for="upload-image">JPG or PNG image:</label>
            <input id="upload-image" type="file" name="edit-image-file" accept=".png, .jpg, .jpeg" />
          </div>

        <h3>Gardening Characteristics:</h3>
        <div class="feedback <?php echo $hardiness_zone_feedback_class; ?>">Hardiness zone is required.</div>
        <div class="edit-text-short">
          <label for="edit-hardiness-zone">Hardiness Zone:</label>
          <input type="text" name="edit-hardiness-zone" id="edit-hardiness-zone" value="<?php echo htmlspecialchars($sticky_hardiness_zone); ?>" />
        </div>

        <div class="seasonality">
          <div>
            <input type="checkbox" name="edit-perennial" id="edit-perennial" <?php echo $sticky_perennial; ?>/>
            <label for="edit-perennial">Perennial</label>
          </div>
          <div>
            <input type="checkbox" name="edit-annual" id="edit-annual" <?php echo $sticky_annual; ?>/>
            <label for="edit-annual">Annual</label>
          </div>
        </div>

        <div class="feedback <?php echo $shade_feedback_class; ?>">At least one type of light is required.</div>
        <div class="sun-needs-container">
          <div>
            <input type="checkbox" name="edit-full-sun" id="edit-full-sun" <?php echo $sticky_full_sun; ?>/>
            <label for="edit-full-sun">Full Sun</label>
          </div>
          <div>
            <input type="checkbox" name="edit-partial-shade" id="edit-partial-shade" <?php echo $sticky_partial_shade; ?>/>
            <label for="edit-partial-shade">Partial Shade</label>
          </div>
          <div>
            <input type="checkbox" name="edit-full-shade" id="edit-full-shade" <?php echo $sticky_full_shade; ?>/>
            <label for="edit-full-shade">Full Shade</label>
          </div>
        </div>

        <div>
          <div class="feedback <?php echo $plant_type_feedback_class; ?>">A plant type is required.</div>
          <label for="edit-type-select">Plant type:  </label>
            <select name="edit-type-select" id="edit-type-select">
              <option value="none">None selected</option>
              <option value="shrub" <?php echo $sticky_shrub; ?>>Shrub</option>
              <option value="grass" <?php echo $sticky_grass; ?>>Grass</option>
              <option value="vine" <?php echo $sticky_vine; ?>>Vine</option>
              <option value="tree" <?php echo $sticky_tree; ?>>Tree</option>
              <option value="flower" <?php echo $sticky_flower; ?>>Flower</option>
              <option value="groundcover" <?php echo $sticky_groundcover; ?>>Groundcover</option>
              <option value="other" <?php echo $sticky_other; ?>>Other</option>
            </select>
          </div>

        <!-- div containing multiple select section of form for play types -->
        <h3>Types of Play Supported:</h3>
        <div>
          <div class="feedback <?php echo $play_type_feedback_class; ?>">At least one play type is required.</div>
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
          <input type="hidden" name="edit-plant" value="<?php echo htmlspecialchars($id); ?>" />
          <button id="edit-submit" type="submit">Save Changes</button>
        </div>
        </form>
    </section>

    </div>
  </div>
  </main>

</body>

</html>
