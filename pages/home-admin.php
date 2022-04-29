<?php
  if (is_user_logged_in()) {
    define("MAX_FILE_SIZE", 1000000);
    $file_ext_feedback_class = 'hidden';
    $file_feedback_class = 'hidden';

    $image_filename = NULL;
    $image_ext = NULL;

    // add form feedback classes
    $name_feedback_class = 'hidden';
    $scientific_name_feedback_class = 'hidden';
    $plant_id_feedback_class = 'hidden';
    $plant_id_unique_feedback_class = 'hidden';
    $play_type_feedback_class = 'hidden';
    $hardiness_zone_feedback_class = 'hidden';
    $shade_feedback_class = 'hidden';
    $plant_type_feedback_class = 'hidden';

    $show_confirmation = False;
    $plant_added = False;

    // add form values
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

    $upload = '';

    // variable tracking tags added with this plant
    $tags = array();

    // add form sticky values
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

    $sticky_shrub = '';
    $sticky_grass = '';
    $sticky_vine = '';
    $sticky_tree = '';
    $sticky_flower = '';
    $sticky_groundcover = '';

    $sticky_other = '';

    $add_plant = $_POST['add-plant'];

    // code to be executed when add form submitted
    if ($add_plant) {
      $name = trim(ucwords(($_POST['plant-name']))); //untrusted
      $scientific_name = trim($_POST['scientific-name']); //untrusted
      $plant_id = trim($_POST['plant-id']); //untrusted
      $hardiness_zone = trim($_POST['hardiness-zone']); //untrusted
      $exploratory_constructive = $_POST['add-exploratory-constructive']; //untrusted
      $exploratory_sensory = $_POST['add-exploratory-sensory']; //untrusted
      $physical = $_POST['add-physical']; //untrusted
      $imaginative = $_POST['add-imaginative']; //untrusted
      $restorative = $_POST['add-restorative']; //untrusted
      $expressive = $_POST['add-expressive']; //untrusted
      $rules = $_POST['add-rules']; //untrusted
      $bio = $_POST['add-bio']; //untrusted

      $perennial = $_POST['add-perennial']; //untrusted
      $annual = $_POST['add-annual']; //untrusted
      $full_sun = $_POST['add-full-sun']; //untrusted
      $partial_shade = $_POST['add-partial-shade']; //untrusted
      $full_shade = $_POST['add-full-shade']; //untrusted
      $plant_type = ucfirst($_POST['add-type-select']); //untrusted

      $upload = $_FILES['image-file'];

      $add_form_valid = True;

      if ($upload['error'] == UPLOAD_ERR_OK) {
        $image_filename = basename($upload['name']);
        $image_ext = strtolower(pathinfo($image_filename, PATHINFO_EXTENSION));

        if (!in_array($image_ext, array('jpg', 'jpeg', 'png'))) {
          $add_form_valid = False;
          $file_ext_feedback_class = '';
        }
      } else {
        // upload was not successful
        $add_form_valid = False;
        $file_feedback_class = '';
      }

      // check validity of responses
      if (empty($name)) {
        $add_form_valid = False;
        $name_feedback_class = '';
      }

      if (empty($scientific_name)) {
        $add_form_valid = False;
        $scientific_name_feedback_class = '';
      }

      if (empty($plant_id)) {
        $add_form_valid = False;
        $plant_id_feedback_class = '';
      } else {
        // check plant id is unique
        $check_records = exec_sql_query($db, "SELECT * FROM entries WHERE (plant_id = :plant_id);",
          array(
            ':plant_id' => $plant_id
          )
        ) -> fetchAll();
        if (count($check_records) > 0) {
          $add_form_valid = False;
          $plant_id_unique_feedback_class = '';
        }
      }

      if (empty($exploratory_constructive) && empty($exploratory_sensory) && empty($physical) && empty($imaginative) && empty($restorative) && empty($expressive ) && empty($rules) && empty($bio)) {
        $add_form_valid = False;
        $play_type_feedback_class = '';
      }

      if (empty($hardiness_zone)) {
        $add_form_valid = False;
        $hardiness_zone_feedback_class = '';
      }
      if (empty($full_sun) && empty($partial_shade) && empty($full_shade)) {
        $add_form_valid = False;
        $shade_feedback_class = '';
      }

      if (!in_array($plant_type, array("Shrub", "Grass", "Vine", "Tree", "Flower", "Groundcover", "Other"))) {
        $add_form_valid = False;
        $plant_type_feedback_class = '';
      }

      if ($add_form_valid) {
        //form is valid; add record to database
        //insert into entries table
        $result = exec_sql_query($db, "INSERT INTO entries (name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (:name, :scientific_name, :plant_id, :hardiness_zone, :exploratory_constructive, :exploratory_sensory, :physical, :imaginative, :restorative, :expressive, :rules, :bio);",
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
            ':bio' => ($bio) ? 1 : 0
          )
        );

        // push id of tag into array if it is selected
        if ($perennial) {
          array_push($tags, 1);
        }
        if ($annual) {
          array_push($tags, 2);
        }
        if ($full_sun) {
          array_push($tags, 3);
        }
        if ($partial_shade) {
          array_push($tags, 4);
        }
        if ($full_shade) {
          array_push($tags, 5);
        }
        if ($plant_type == "Shrub") {
          array_push($tags, 6);
        }
        if ($plant_type == "Grass") {
          array_push($tags, 7);
        }
        if ($plant_type == "Vine") {
          array_push($tags, 8);
        }
        if ($plant_type == "Tree") {
          array_push($tags, 9);
        }
        if ($plant_type == "Flower") {
          array_push($tags, 10);
        }
        if ($plant_type == "Groundcover") {
          array_push($tags, 11);
        }
        if ($plant_type == "Other") {
          array_push($tags, 12);
        }

        $new_entry_id = $db->lastInsertId('id');

        foreach ($tags as $tag) {
          $result_tag = exec_sql_query($db, 'INSERT INTO entry_tags (entry_id, tag_id) VALUES (:entry_id, :tag_id);',
            array(
              'entry_id' => $new_entry_id,
              'tag_id' => $tag
            )
          );
        }

        $new_img_name = "$new_entry_id" . "." . "$image_ext";

        $file_result = exec_sql_query(
          $db,
          "INSERT INTO documents (file_name, file_ext) VALUES (:file_name, :file_ext)",
          array(
            ':file_name' => $new_img_name,
            ':file_ext' => $image_ext,
          )
        );

        if ($file_result) {
          $id_filename = 'public/uploads/documents/' . $new_entry_id . '.' . $image_ext;
          move_uploaded_file($upload["tmp_name"], $id_filename);
        }

        if ($result) {
          $plant_added = True;
          $show_confirmation = True;
        }



      } else {
        // add form is not valid; sticky values are set
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

    // filter form section

    // sort/filter SQL query base pieces
    $filter_base = "SELECT * FROM entries";
    $filter_where = '';
    $play_filter_options = array();
    $filter_order = ' ORDER BY id DESC;';

    // filter form values
    $exploratory_constructive_filter = '';
    $exploratory_sensory_filter = '';
    $physical_filter = '';
    $imaginative_filter = '';
    $restorative_filter = '';
    $expressive_filter = '';
    $rules_filter = '';
    $bio_filter = '';

    $show_filter_confirmation = False;

    // filter form sticky values
    $sticky_exploratory_constructive_filter = '';
    $sticky_exploratory_sensory_filter = '';
    $sticky_physical_filter = '';
    $sticky_imaginative_filter = '';
    $sticky_restorative_filter = '';
    $sticky_expressive_filter = '';
    $sticky_rules_filter = '';
    $sticky_bio_filter = '';

    // variables tracking if filter selected for each play type
    $exploratory_constructive_filter = $_GET['exploratory-constructive-filter']; //untrusted
    $exploratory_sensory_filter = $_GET['exploratory-sensory-filter']; //untrusted
    $physical_filter = $_GET['physical-filter']; //untrusted
    $imaginative_filter = $_GET['imaginative-filter']; //untrusted
    $restorative_filter = $_GET['restorative-filter']; //untrusted
    $expressive_filter = $_GET['expressive-filter']; //untrusted
    $rules_filter = $_GET['rules-filter']; //untrusted
    $bio_filter = $_GET['bio-filter']; //untrusted
    $inclusive_filter = $_GET['inclusive-filter']; //untrusted

    // make filter options chosen by user sticky
    $sticky_exploratory_constructive_filter = (empty($exploratory_constructive_filter) ? '' : 'checked');
    $sticky_exploratory_sensory_filter = (empty($exploratory_sensory_filter) ? '' : 'checked');
    $sticky_physical_filter = (empty($physical_filter) ? '' : 'checked');
    $sticky_imaginative_filter = (empty($imaginative_filter) ? '' : 'checked');
    $sticky_restorative_filter = (empty($restorative_filter) ? '' : 'checked');
    $sticky_expressive_filter = (empty($expressive_filter) ? '' : 'checked');
    $sticky_rules_filter = (empty($rules_filter) ? '' : 'checked');
    $sticky_bio_filter = (empty($bio_filter) ? '' : 'checked');

    $sticky_inclusive_filter = (empty($inclusive_filter) ? '' : 'checked');

    $show_filter_confirmation = True;

    // add selected filter options to array
    if ($exploratory_constructive_filter) {
      array_push($play_filter_options, "(exploratory_constructive_play)");
    }
    if ($exploratory_sensory_filter) {
      array_push($play_filter_options, "(exploratory_sensory_play)");
    }
    if ($physical_filter) {
      array_push($play_filter_options, "(physical_play)");
    }
    if ($imaginative_filter) {
      array_push($play_filter_options, "(imaginative_play)");
    }
    if ($restorative_filter) {
      array_push($play_filter_options, "(restorative_play)");
    }
    if ($expressive_filter) {
      array_push($play_filter_options, "(expressive_play)");
    }
    if ($rules_filter) {
      array_push($play_filter_options, "(play_with_rules)");
    }
    if ($bio_filter) {
      array_push($play_filter_options, "(bio_play)");
    }

    // display either all records containing at least one of the selected filters
    // OR records containing all selected filters depending on if user checked inclusive option
    if (count($play_filter_options) > 0) {
      if ($inclusive_filter) {
        $filter_where = ' WHERE ' . implode(' AND ', $play_filter_options);
        } else {
          $filter_where = ' WHERE ' . implode(' OR ', $play_filter_options);
        }
      }

    // sort section
    $sort = $_GET['sort'];
    $order = $_GET['order'];

    $sql_order = '';

    if ($order == "asc") {
      $sql_order = "ASC";
    } elseif ($order == "desc") {
      $sql_order = "DESC";
    } else {
      $order= NULL;
    }

    if ($order && in_array($sort, array('id', 'name'))) {
      if ($sort == 'id') {
        $filter_order = ' ORDER BY id ' . $sql_order;
      } elseif ($sort == 'name') {
        $filter_order = ' ORDER BY name ' . $sql_order;
      }
    }

    // sticky sort values
    $sticky_id_sort_asc = ($sort == "id" && $order == "asc") ? "selected" : "";
    $sticky_id_sort_desc = ($sort == "id" && $order == "desc") ? "selected" : "";
    $sticky_name_sort_asc = ($sort == "name" && $order == "asc") ? "selected" : "";
    $sticky_name_sort_desc = ($sort == "name" && $order == "desc") ? "selected" : "";

    $sort_query = http_build_query(
      array(
        'exploratory-constructive-filter' => $exploratory_constructive_filter ?: NULL,
        'exploratory-sensory-filter' => $exploratory_sensory_filter ?: NULL,
        'physical-filter' => $physical_filter ?: NULL,
        'imaginative-filter' => $imaginative_filter ?: NULL,
        'restorative-filter' => $restorative_filter ?: NULL,
        'expressive-filter' => $expressive_filter ?: NULL,
        'rules-filter' => $rules_filter ?: NULL,
        'bio-filter' => $bio_filter ?: NULL,
        'inclusive-filter' => $inclusive_filter ?: NULL,
      )
    );

    $sort_base = "/admin?" . $sort_query;

    // final filter/sort query
    $filter_query = $filter_base . $filter_where . $filter_order;

    // delete button functionality
    $delete_plant_id = $_POST["id-delete"];
    $delete_plant = $_POST["delete-confirmed"];
    $id_delete_confirmed = $_POST["id-delete-confirmed"];
    $show_delete_confirmation = False;


    if ($delete_plant) {
      $delete_entry = exec_sql_query($db, "DELETE FROM entries WHERE (id=:id);",
        array(
          ':id' => $id_delete_confirmed
        )
      );

      $delete_tags = exec_sql_query($db, "DELETE FROM entry_tags WHERE (entry_id=:id);",
        array (
          ':id' => $id_delete_confirmed
        )
      );

      $delete_img = exec_sql_query($db, "DELETE FROM documents WHERE (id=:id);",
        array (
        ':id' => $id_delete_confirmed
        )
      );

      if ($delete_entry && $delete_tags && $delete_img) {
        $show_delete_confirmation = True;
      }
    }

    $records = exec_sql_query($db, $filter_query) -> fetchAll();
    $queries_matching = count($records);
  }
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
    <?php if (is_user_logged_in()) { ?>
      <div class="admin-welcome">
        <p>Welcome, <?php echo $current_user["username"]; ?>! You are currently on edit view.</p>
        <a class="admin-nav" href="/">Go to Consumer View</a>
      </div>
      <a class="logout-button" href="/?logout=">Sign Out</a>
    <?php } else { ?>
      <button class="login-button" type="button">Sign in</button>
    <?php } ?>
  </header>

  <?php if (!is_user_logged_in()) { ?>
    <div class="hidden modal">
      <div class="hidden login-box">
        <button class="close-button" id="modal-close">x</button>
        <h2>Sign in to your Playful Plants account</h2>
        <p>Add plants, edit entries, and more.</p>
        <?php echo_login_form("/", $session_messages); ?>
      </div>
    </div>
  <?php } ?>

  <?php if (is_user_logged_in() && $delete_plant_id) { ?>
    <div class="modal">
      <div class="delete-confirm-popup">
        <h2>Confirm Entry Deletion</h2>
        <p>Are you sure you want to delete <?php echo $delete_plant_id; ?>?</p>
        <p>Cancel</p>
        <form method="post" action="/admin">
          <input type="hidden" name="id-delete-confirmed" value="<?php echo $delete_plant_id;?>" />
          <button type="submit" name="delete-confirmed" value="submitted">Delete</button>
        </form>
      </div>
    </div>
  <?php } ?>

  <?php if (is_user_logged_in()) { ?>
    <main>
      <!-- form for adding a plant to the catalog -->
      <div id="add-plant-form">
        <div>
          <h2>Add new plant</h2>
          <p> (Note for Milestone 3: bug where submit button must be clicked twice to add entry successfully)</p>
        </div>

        <div class="add-body">
          <form id="add-plant" name="add-plant" method="post" action="/admin" enctype="multipart/form-data" novalidate>
            <div class="main-add">
              <!-- div containing text fields of form -->
              <div class="text-fields">
                <h3>Basic Information</h3>
                <div class="feedback <?php echo $name_feedback_class; ?>">A colloquial name is required.</div>
                <div class="add-text">
                  <label for="plant-name">Plant Name (Colloquial):</label>
                  <input type="text" name="plant-name" id="plant-name" value="<?php echo htmlspecialchars($sticky_name); ?>"/>
                </div>

                <div class="feedback <?php echo $scientific_name_feedback_class; ?>">A scientific name is required.</div>
                <div class="add-text">
                  <label for="scientific-name">Plant Name (Scientific):</label>
                  <input type="text" name="scientific-name" id="scientific-name" value="<?php echo htmlspecialchars($sticky_scientific_name); ?>" />
                </div>

                <div class="feedback <?php echo $plant_id_feedback_class; ?>">A plant ID is required.</div>
                <div class="feedback <?php echo $plant_id_unique_feedback_class; ?>">A plant with that ID already exists.</div>
                <div class="add-text">
                  <label for="plant-id">Plant ID:</label>
                  <input type="text" name="plant-id" id="plant-id" value="<?php echo htmlspecialchars($sticky_plant_id); ?>" />
                </div>

                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
                <div class="feedback <?php echo $file_ext_feedback_class; ?>">File is required to be in .jpg or .png format.</div>
                <div class="feedback <?php echo $file_feedback_class; ?>">File required.</div>
                <div class="file-upload">
                  <label for="upload-image">JPG or PNG image:</label>
                  <input id="upload-image" type="file" name="image-file" accept=".png, .jpg, .jpeg" />
                </div>
              </div>

              <!-- div containing multiple select section of form for play types -->
              <div class="add-play-type">
                <h3>Supported Play Types</h3>
                <div class="feedback <?php echo $play_type_feedback_class; ?>">At least one play type is required.</div>
                <div class="play-checkboxes">
                  <div class="play-type">
                    <input type="checkbox" name="add-exploratory-constructive" id="add-exploratory-constructive" <?php echo $sticky_exploratory_constructive; ?>/>
                    <label for="add-exploratory-constructive">Exploratory Constructive Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-exploratory-sensory" id="add-exploratory-sensory" <?php echo $sticky_exploratory_sensory; ?>/>
                    <label for="add-exploratory-sensory">Exploratory Sensory Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-physical" id="add-physical" <?php echo $sticky_physical; ?>/>
                    <label for="add-physical">Physical Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-imaginative" id="add-imaginative" <?php echo $sticky_imaginative; ?>/>
                    <label for="add-imaginative">Imaginative Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-restorative" id="add-restorative" <?php echo $sticky_restorative; ?>/>
                    <label for="add-restorative">Restorative Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-expressive" id="add-expressive" <?php echo $sticky_expressive; ?>/>
                    <label for="add-expressive">Expressive Play</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-rules" id="add-rules" <?php echo $sticky_rules; ?>/>
                    <label for="add-rules">Play with Rules</label>
                  </div>

                  <div class="play-type">
                    <input type="checkbox" name="add-bio" id="add-bio" <?php echo $sticky_bio; ?>/>
                    <label for="add-bio">Bio Play</label>
                  </div>
                </div>
              </div>
                <!-- code for adding gardening information -->
              <div class="garden-info">
                <h3>Gardening Information</h3>

                <div class="feedback <?php echo $hardiness_zone_feedback_class; ?>">Hardiness zone is required.</div>
                <div class="short-text">
                  <label for="hardiness-zone">Hardiness Zone:</label>
                  <input type="text" name="hardiness-zone" id="hardiness-zone" value="<?php echo htmlspecialchars($sticky_hardiness_zone); ?>" />
                </div>

                <div class="garden-type">
                  <input type="checkbox" name="add-perennial" id="add-perennial" <?php echo $sticky_perennial; ?>/>
                  <label for="add-perennial">Perennial</label>
                </div>
                <div class="garden-type">
                  <input type="checkbox" name="add-annual" id="add-annual" <?php echo $sticky_annual; ?>/>
                  <label for="add-annual">Annual</label>
                </div>

                <div class="feedback <?php echo $shade_feedback_class; ?>">At least one type of light is required.</div>
                <div class="garden-type">
                  <input type="checkbox" name="add-full-sun" id="add-full-sun" <?php echo $sticky_full_sun; ?>/>
                  <label for="add-full-sun">Full Sun</label>
                </div>
                <div class="garden-type">
                  <input type="checkbox" name="add-partial-shade" id="add-partial-shade" <?php echo $sticky_partial_shade; ?>/>
                  <label for="add-partial-shade">Partial Shade</label>
                </div>
                <div class="garden-type">
                  <input type="checkbox" name="add-full-shade" id="add-full-shade" <?php echo $sticky_full_shade; ?>/>
                  <label for="add-full-shade">Full Shade</label>
                </div>

                <div class="feedback <?php echo $plant_type_feedback_class; ?>">A plant type is required.</div>
                <div class="garden-type">
                  <label for="add-type-select">Plant type:  </label>
                    <select name="add-type-select" id="add-type-select">
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
                <div class="submit">
                  <input class= "submit" id="add-submit" type="submit" name="add-plant" value="Add Plant" />
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>

      <?php if ($show_confirmation) { ?>
        <!-- confirmation after successfully adding a plant, hidden by default -->
        <div class="confirmation">New plant "<?php echo htmlspecialchars($name); ?>" successfully added to database.</div>
      <?php } ?>

      <?php if ($show_delete_confirmation) { ?>
        <!-- confirmation after successfully adding a plant, hidden by default -->
        <div class="confirmation">Plant with ID "<?php echo htmlspecialchars($id_delete_confirmed); ?>" successfully deleted.</div>
      <?php } ?>

      <!-- section underneath the adding form, includes the filtering/sorting sidebar and catalog data itself -->
      <div class="catalog">
        <!-- sidebar -->
        <section class="sidebar">
          <h2>Refine Results</h2>
          <!-- Form for filtering and sorting -->
          <div class="filter-sort-form">
            <form id="filter-sort" method="get" action="/admin" novalidate>
              <!-- Filter section -->
              <div>
                <h3>Filter by:</h3>

                <div class="filter-option">
                  <input type="checkbox" name="exploratory-constructive-filter" id="exploratory-constructive-filter" <?php echo $sticky_exploratory_constructive_filter; ?> />
                  <label for="exploratory-constructive-filter">Exploratory Constructive Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="exploratory-sensory-filter" id="exploratory-sensory-filter" <?php echo $sticky_exploratory_sensory_filter; ?> />
                  <label for="exploratory-sensory-filter">Exploratory Sensory Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="physical-filter" id="physical-filter" <?php echo $sticky_physical_filter; ?> />
                  <label for="physical-filter">Physical Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="imaginative-filter" id="imaginative-filter" <?php echo $sticky_imaginative_filter; ?>/>
                  <label for="imaginative-filter">Imaginative Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="restorative-filter" id="restorative-filter" <?php echo $sticky_restorative_filter; ?> />
                  <label for="restorative-filter">Restorative Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="expressive-filter" id="expressive-filter" <?php echo $sticky_expressive_filter; ?> />
                  <label for="expressive-filter">Expressive Play</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="rules-filter" id="rules-filter" <?php echo $sticky_rules_filter; ?> />
                  <label for="rules-filter">Play with Rules</label>
                </div>

                <div class="filter-option">
                  <input type="checkbox" name="bio-filter" id="bio-filter" <?php echo $sticky_bio_filter; ?> />
                  <label for="bio-filter">Bio Play</label>
                </div>
              </div>

              <!-- Other section -->
              <div>
                <h3 class="form-heading">More Options:</h3>
                <div class="filter-option">
                  <input type="checkbox" name="inclusive-filter" id="inclusive-filter" <?php echo $sticky_inclusive_filter; ?> />
                  <label for="inclusive-filter">Only show results supporting every selected play type</label>
                </div>
              </div>

              <div class="submit">
                <button class="submit" type="submit">Apply</button>
              </div>

              <!-- hidden inputs to track sort values -->
              <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
              <input type="hidden" name="order" value="<?php echo $order; ?>" />
            </form>
          </div>
        </section>

        <!-- Actual database section -->
        <section class="table">
        <div class="catalog-header">
            <h2><?php echo $queries_matching; ?> results</h2>
            <div>
              <!-- referencing documentation: https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onchange -->
              <select name="sort-media" id="sort" onchange="location=this.value;">
                <option value="" disabled>Sort by:</option>
                <option value="<?php echo $sort_base . "&sort=id&order=desc"?>" <?php echo $sticky_id_sort_desc; ?>>Most recent to oldest (default)</option>
                <option value="<?php echo $sort_base . "&sort=id&order=asc"?>" <?php echo $sticky_id_sort_asc; ?>>Oldest to most recent</option>
                <option value="<?php echo $sort_base . "&sort=name&order=asc"?>" <?php echo $sticky_name_sort_asc; ?>>Alphabetical by name A-Z</option>
                <option value="<?php echo $sort_base . "&sort=name&order=desc"?>" <?php echo $sticky_name_sort_desc; ?>>Alphabetical by name Z-A</option>
              </select>
              <input type="hidden" name="sort" value =""/>
              <input type="hidden" name="order" value=""/>

              <input type="hidden" name="exploratory-constructive-filter" value="<?php echo $exploratory_constructive_filter; ?>" />
              <input type="hidden" name="exploratory-sensory-filter" value="<?php echo $exploratory_sensory_filter; ?>" />
              <input type="hidden" name="physical-filter" value="<?php echo $physical_filter; ?>" />
              <input type="hidden" name="imaginative-filter" value="<?php echo $imaginative_filter; ?>" />
              <input type="hidden" name="restorative-filter" value="<?php echo $restorative_filter; ?>" />
              <input type="hidden" name="expressive-filter" value="<?php echo $expressive_filter; ?>" />
              <input type="hidden" name="rules-filter" value="<?php echo $rules_filter; ?>" />
              <input type="hidden" name="bio-filter" value="<?php echo $bio_filter; ?>" />
              <input type="hidden" name="inclusive-filter" value="<?php echo $inclusive_filter; ?>" />
            </div>
          </div>


          <?php
          foreach ($records as $record) { ?>
            <div class="entry">
              <div class="entry-header">
                <h4><?php echo ucwords(htmlspecialchars($record["name"])); ?><em> (<?php echo htmlspecialchars($record["scientific_name"]); ?>)</em></h4>
                <div class="entry-edit-buttons">
                  <form method="get" action="/admin/edit">
                    <input type="hidden" name="id" value="<?php echo $record["id"]; ?>" />
                    <button type="submit">Edit</button>
                  </form>

                  <form method="post" action="/admin" id="delete-entry">
                    <input type="hidden" name="id-delete" value="<?php echo $record["id"]; ?>" />
                    <div class="delete-button"><button type="submit">Delete</button></div>

                  </form>
                </div>
              </div>
              <p>Plant ID: <?php echo htmlspecialchars($record["plant_id"]); ?><p>
              <p>Types of play supported:</p>
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
            <?php } ?>
        </section>
      </div>
    </main>
  <?php } else { ?>
    <main>
      <div class="error-message">
        <h2>Page not found</h2>
        <p>This page does not exist. <a href="/">Go back to the home page?</a></p>
      </div>
    </main>
  <?php } ?>

  <script src="public/scripts/jquery-3.6.0.js" type="text/javascript"></script>
  <script src="public/scripts/login.js" type="text/javascript"></script>
</body>

</html>
