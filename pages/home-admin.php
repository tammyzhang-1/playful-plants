<?php
  $db = open_sqlite_db("tmp/site.sqlite");

  // add form feedback classes
  $name_feedback_class = 'hidden';
  $scientific_name_feedback_class = 'hidden';
  $plant_id_feedback_class = 'hidden';
  $plant_id_unique_feedback_class = 'hidden';
  $play_type_feedback_class = 'hidden';

  $show_confirmation = False;
  $plant_added = False;

  // add form values
  $name = '';
  $scientific_name = '';
  $plant_id = '';
  $exploratory_constructive = '';
  $exploratory_sensory = '';
  $physical = '';
  $imaginative = '';
  $restorative = '';
  $expressive = '';
  $rules = '';
  $bio = '';

  // add form sticky values
  $sticky_name = '';
  $sticky_scientific_name = '';
  $sticky_plant_id = '';
  $sticky_exploratory_constructive = '';
  $sticky_exploratory_sensory = '';
  $sticky_physical = '';
  $sticky_imaginative = '';
  $sticky_restorative = '';
  $sticky_expressive = '';
  $sticky_rules = '';
  $sticky_bio = '';

  // code to be executed when add form submitted
  if (isset($_POST['add-plant'])) {
    $name = trim($_POST['plant-name']); //untrusted
    $scientific_name = trim($_POST['scientific-name']); //untrusted
    $plant_id = trim($_POST['plant-id']); //untrusted
    $exploratory_constructive = $_POST['add-exploratory-constructive']; //untrusted
    $exploratory_sensory = $_POST['add-exploratory-sensory']; //untrusted
    $physical = $_POST['add-physical']; //untrusted
    $imaginative = $_POST['add-imaginative']; //untrusted
    $restorative = $_POST['add-restorative']; //untrusted
    $expressive = $_POST['add-expressive']; //untrusted
    $rules = $_POST['add-rules']; //untrusted
    $bio = $_POST['add-bio']; //untrusted

    $add_form_valid = True;

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
      $check_records = exec_sql_query($db, "SELECT * FROM plants WHERE (plant_id = :plant_id);",
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

    if ($add_form_valid) {
      // form is valid; add record to database
      $result = exec_sql_query($db, "INSERT INTO plants (name, scientific_name, plant_id, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (:name, :scientific_name, :plant_id, :exploratory_constructive, :exploratory_sensory, :physical, :imaginative, :restorative, :expressive, :rules, :bio);",
        array(
          ':name' => $name,
          ':scientific_name' => $scientific_name,
          ':plant_id' => $plant_id,
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
      if ($result) {
        $plant_added = True;
        $show_confirmation = True;
      }
    } else {
      // add form is not valid; sticky values are set
      $sticky_name = $name; //untrusted
      $sticky_scientific_name = $scientific_name; //untrusted
      $sticky_plant_id = $plant_id; //untrusted
      $sticky_exploratory_constructive = (empty($exploratory_constructive) ? '' : 'checked');
      $sticky_exploratory_sensory = (empty($exploratory_sensory) ? '' : 'checked');
      $sticky_physical = (empty($physical) ? '' : 'checked');
      $sticky_imaginative = (empty($imaginative) ? '' : 'checked');
      $sticky_restorative = (empty($restorative) ? '' : 'checked');
      $sticky_expressive = (empty($expressive) ? '' : 'checked');
      $sticky_rules = (empty($rules) ? '' : 'checked');
      $sticky_bio = (empty($bio) ? '' : 'checked');
    }
  }

  // sort/filter form section

  // sort/filter SQL query base pieces
  $filter_base = "SELECT * FROM plants";
  $filter_where = '';
  $play_filter_options = array();
  $filter_order = ' ORDER BY id ASC;';

  // sort/filter form values
  $exploratory_constructive_filter = '';
  $exploratory_sensory_filter = '';
  $physical_filter = '';
  $imaginative_filter = '';
  $restorative_filter = '';
  $expressive_filter = '';
  $rules_filter = '';
  $bio_filter = '';
  $old_sort = '';
  $recent_sort = '';
  $alphabet_sort = '';
  $inclusive_filter = '';

  $show_filter_confirmation = False;

  // sort/filter form sticky values
  $sticky_exploratory_constructive_filter = '';
  $sticky_exploratory_sensory_filter = '';
  $sticky_physical_filter = '';
  $sticky_imaginative_filter = '';
  $sticky_restorative_filter = '';
  $sticky_expressive_filter = '';
  $sticky_rules_filter = '';
  $sticky_bio_filter = '';
  $sticky_old_sort = 'checked'; // default sort value
  $sticky_recent_sort = '';
  $sticky_alphabet_sort = '';
  $sticky_inclusive_filter = '';

  // code to be executed when user submits filter/sort form
  if (isset($_GET['filter-sort'])) {
    // variables tracking if filter selected for each play type
    $exploratory_constructive_filter = $_GET['exploratory-constructive-filter']; //untrusted
    $exploratory_sensory_filter = $_GET['exploratory-sensory-filter']; //untrusted
    $physical_filter = $_GET['physical-filter']; //untrusted
    $imaginative_filter = $_GET['imaginative-filter']; //untrusted
    $restorative_filter = $_GET['restorative-filter']; //untrusted
    $expressive_filter = $_GET['expressive-filter']; //untrusted
    $rules_filter = $_GET['rules-filter']; //untrusted
    $bio_filter = $_GET['bio-filter']; //untrusted
    // variable checking which sort option is selected
    $sort = $_GET['sort']; //untrusted
    $inclusive_filter = $_GET['inclusive-filter']; //untrusted

    // make filter and sorting options chosen by user sticky
    $sticky_exploratory_constructive_filter = (empty($exploratory_constructive_filter) ? '' : 'checked');
    $sticky_exploratory_sensory_filter = (empty($exploratory_sensory_filter) ? '' : 'checked');
    $sticky_physical_filter = (empty($physical_filter) ? '' : 'checked');
    $sticky_imaginative_filter = (empty($imaginative_filter) ? '' : 'checked');
    $sticky_restorative_filter = (empty($restorative_filter) ? '' : 'checked');
    $sticky_expressive_filter = (empty($expressive_filter) ? '' : 'checked');
    $sticky_rules_filter = (empty($rules_filter) ? '' : 'checked');
    $sticky_bio_filter = (empty($bio_filter) ? '' : 'checked');

    $sticky_old_sort = ($sort == 'oldest' ? 'checked' : '');
    $sticky_recent_sort = ($sort == 'recent' ? 'checked' : '');
    $sticky_alphabet_sort = ($sort == 'alphabet' ? 'checked' : '');

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

    // build SQL query based on selected sort option
    if ($sort == 'recent') {
      $filter_order = ' ORDER BY id DESC;';
    } elseif ($sort == 'alphabet') {
      $filter_order = ' ORDER BY name ASC;';
    }
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

  // final filter/sort query
  $filter_query = $filter_base . $filter_where . $filter_order;

  $records = exec_sql_query($db, $filter_query) -> fetchAll();
  $queries_matching = count($records);
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
    <button type="button">Log out</button>
  </header>

  <main>
    <!-- form for adding a plant to the catalog -->
    <section id="add-plant-form">
      <h2>Add new plant</h2>
      <form id="add-plant" method="post" action="/" novalidate>
        <div class="main-add">
          <!-- div containing two text fields of form -->
          <div class="text-fields">
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
          </div>

          <!-- div containing multiple select section of form for play types -->
          <div class="add-play-type">
            <div class="feedback <?php echo $play_type_feedback_class; ?>">At least one supported play type is required.</div>
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
        </div>

        <div class="submit">
          <input id="add-submit" type="submit" name="add-plant" value="Add Plant" />
        </div>
        </form>
    </section>

    <?php if ($show_confirmation) { ?>
      <!-- confirmation after successfully adding a plant, hidden by default -->
      <div class="confirmation">New plant "<?php echo htmlspecialchars($name); ?>" successfully added to database.</div>
    <?php } ?>

    <!-- section underneath the adding form, includes the filtering/sorting sidebar and catalog data itself -->
    <div class="catalog">
      <!-- sidebar -->
      <section class="sidebar">
        <h2>Refine Results</h2>
        <!-- Form for filtering and sorting -->
        <div class="filter-sort-form">
          <form id="filter-sort" method="get" action="/" novalidate>
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
              <input id="filter-sort-submit" type="submit" name="filter-sort" value="Apply" />
            </div>
          </form>
        </div>
      </section>

      <!-- Actual database section -->
      <section class="table">
      <div class="catalog-header">
          <h2>3 Results</h2>
          <div>
            <select name="media-sort" id="media-sort">
              <option value="none">Sort By</option>
              <option value="alphabetical-asc">Alphabetical by Name A-Z</option>
              <option value="alphabetical-desc">Alphabetical by Name Z-A</option>
            </select>
          </div>
        </div>

        <div class="entry">
          <div class="entry-header">
            <h4>Name <em>(Scientific Name)</em></h4>
            <div class="entry-edit-buttons">
              <button type="button">Edit</button>
              <button type="button">Delete</button>
            </div>
          </div>
          <p>Plant ID<p>
          <p>Types of play supported:</p>
          <ul>
            <li>Type 1</li>
            <li>Type 2</li>
            <li>Type 3</li>
          </ul>
        </div>
      </section>
    </div>
  </main>
</body>

</html>
