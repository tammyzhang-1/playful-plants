<?php
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

$name = '';
$plant_id = '';

// filtering and sorting
// sort/filter SQL query base pieces
$filter_base = "SELECT * FROM entries";
$filter_where = '';
$garden_filter_options = array();
$filter_order = ' ORDER BY id ASC;';

// filter form values
$perennial_filter = '';
$annual_filter = '';
$full_sun_filter = '';
$partial_shade_filter = '';
$full_shade_filter = '';
$plant_type = '';

$show_filter_confirmation = False;

// filter form sticky values
$sticky_perennial_filter = '';
$sticky_annual_filter = '';
$sticky_full_sun_filter = '';
$sticky_partial_shade_filter = '';
$sticky_full_shade_filter = '';

$sticky_shrub_filter = '';
$sticky_grass_filter = '';
$sticky_vine_filter = '';
$sticky_tree_filter = '';
$sticky_flower_filter = '';
$sticky_groundcover_filter = '';
$sticky_other_filter = '';

// variables tracking if filter selected for each play type
$perennial_filter = $_GET['perennial-filter'];
$annual_filter = $_GET['annual-filter'];
$full_sun_filter = $_GET['full-sun-filter'];
$partial_shade_filter = $_GET['partial-shade-filter'];
$full_shade_filter = $_GET['full-shade-filter'];
$plant_type = $_GET['add-type-select'];

// make filter options chosen by user sticky
$sticky_perennial_filter = $perennial_filter ? "checked" : '';
$sticky_annual_filter = $annual_filter ? "checked" : '';
$sticky_full_sun_filter = $full_sun_filter ? "checked" : '';
$sticky_partial_shade_filter = $partial_shade_filter ? "checked" : '';
$sticky_full_shade_filter = $full_shade_filter ? "checked" : '';

$sticky_shrub_filter = ($plant_type == "shrub") ? "selected" : '';
$sticky_grass_filter = ($plant_type == "grass") ? "selected" : '';
$sticky_vine_filter = ($plant_type == "vine") ? "selected" : '';
$sticky_tree_filter = ($plant_type == "tree") ? "selected" : '';
$sticky_flower_filter = ($plant_type == "flower") ? "selected" : '';
$sticky_groundcover_filter = ($plant_type == "groundcover") ? "selected" : '';
$sticky_other_filter = ($plant_type == "other") ? "selected" : '';

$show_filter_confirmation = True;

// add selected filter options to array
if ($perennial_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 1)");
}
if ($annual_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 2)");
}
if ($full_sun_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 3)");
}
if ($partial_shade_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 4)");
}
if ($full_shade_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 5)");
}

// display either all records containing at least one of the selected filters
// OR records containing all selected filters depending on if user checked inclusive option
if (count($garden_filter_options) > 0) {
  if ($inclusive_filter) {
    $filter_where = ' WHERE ' . implode(' AND ', $garden_filter_options);
  } else {
    $filter_where = ' WHERE ' . implode(' OR ', $garden_filter_options);
  }
  $filter_base = "SELECT * FROM entry_tags INNER JOIN tags ON entry_tags.tag_id = tags.id INNER JOIN entries ON entry_tags.entry_id = entries.id";
}

// sort section
$sort = $_GET['sort'];
$order = $_GET['order'];

$sql_order = '';

if ($order == "asc") {
  $sql_order = "ASC ";
} elseif ($order == "desc") {
  $sql_order = "DESC ";
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
    'perennial-filter' => $perennial_filter ?: NULL,
    'annual-filter' => $annual_filter ?: NULL,
    'full-sun-filter' => $full_sun_filter ?: NULL,
    'partial-shade-filter' => $partial_shade_filter ?: NULL,
    'full-shade-filter' => $full_shade_filter ?: NULL,
  )
);

$sort_base = "/?" . $sort_query;

// final filter/sort query
$filter_query = $filter_base . $filter_where . " GROUP BY entries.name " . $filter_order;

$records = exec_sql_query($db, $filter_query) -> fetchAll();
$queries_matching = count($records);

$image_url = 'public/images/default.png';
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

  <main>
    <!-- section including the sidebar and catalog data itself -->
    <div class="media-catalog">
      <!-- sidebar -->
      <div class="sidebar">
        <h2>Refine Results</h2>
        <!-- Form for filtering and sorting -->
        <div class="filter-sort-form">
          <form id="filter-garden" method="get" action="/" novalidate>
            <!-- Filter section -->
            <h3>Filter by:</h3>

            <div class="filter-option">
              <input type="checkbox" name="perennial-filter" id="perennial-filter" <?php echo $sticky_perennial_filter; ?>/>
              <label for="perennial-filter">Perennial</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="annual-filter" id="annual-filter" <?php echo $sticky_annual_filter; ?>/>
              <label for="annual-filter">Annual</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="full-sun-filter" id="full-sun-filter" <?php echo $sticky_full_sun_filter; ?>/>
              <label for="full-sun-filter">Full Sun</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="partial-shade-filter" id="partial-shade-filter" <?php echo $sticky_partial_shade_filter; ?>/>
              <label for="partial-shade-filter">Partial Shade</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="full-shade-filter" id="full-shade-filter" <?php echo $sticky_full_shade_filter; ?>/>
              <label for="full-shade-filter">Full Shade</label>
            </div>

            <!-- referencing Mozilla select documentation -->
            <div class="filter-option">
              <label for="type-select">Plant type:  </label>
              <select name="type-select" id="type-select">
                <option value="none">None selected</option>
                <option value="shrub">Shrub</option>
                <option value="grass">Grass</option>
                <option value="vine">Vine</option>
                <option value="tree">Tree</option>
                <option value="flower">Flower</option>
                <option value="groundcover">Groundcover</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="submit">
              <button class="submit" type="submit">Apply</button>
            </div>

            <!-- hidden inputs to track sort values -->
            <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
            <input type="hidden" name="order" value="<?php echo $order; ?>" />
          </form>
        </div>
      </div>

      <div class="catalog-body">
        <div class="catalog-header">
          <h2><?php echo $queries_matching; ?> Results</h2>
          <div>
            <!-- referencing documentation: https://developer.mozilla.org/en-US/docs/Web/API/GlobalEventHandlers/onchange -->
            <select name="sort-media" id="sort" onchange="location=this.value;">
              <option value="" disabled>Sort by:</option>
              <option value="<?php echo $sort_base . "&sort=id&order=asc"?>" <?php echo $sticky_id_sort_asc; ?>>Oldest to most recent (default)</option>
              <option value="<?php echo $sort_base . "&sort=id&order=desc"?>" <?php echo $sticky_id_sort_desc; ?>>Most recent to oldest</option>
              <option value="<?php echo $sort_base . "&sort=name&order=asc"?>" <?php echo $sticky_name_sort_asc; ?>>Alphabetical by name A-Z</option>
              <option value="<?php echo $sort_base . "&sort=name&order=desc"?>" <?php echo $sticky_name_sort_desc; ?>>Alphabetical by name Z-A</option>
            </select>
            <input type="hidden" name="sort" value =""/>
            <input type="hidden" name="order" value=""/>

            <input type="hidden" name="perennial-filter" value="<?php echo $perennial_filter; ?>" />
            <input type="hidden" name="annual-filter" value="<?php echo $annual_filter; ?>" />
            <input type="hidden" name="full-sun-filter" value="<?php echo $full_sun_filter; ?>" />
            <input type="hidden" name="partial-shade-filter" value="<?php echo $partial_shade_filter; ?>" />
            <input type="hidden" name="full-shade-filter" value="<?php echo $full_shade_filter; ?>" />
          </div>
        </div>
        <!-- Media grid section -->
        <div id="media-grid">
          <?php
          foreach ($records as $record) { ?>
            <div class="photo">
              <?php if (file_exists("public/images/" . $record["plant_id"] . ".jpg")) { ?>
                <?php $image_url = "public/images/" . $record["plant_id"] . ".jpg"; ?>
              <?php } ?>
              <a href="/detail?id=<?php echo $record["id"]; ?>"><img src="<?php echo $image_url; ?>" alt="Picture of plant."/></a>
              <!-- default.png is original work (created by Tammy Zhang) -->
              <?php $image_url = "public/images/default.png"; ?>
              <a href="/detail?id=<?php echo $record["id"]; ?>"><p><?php echo ucwords($record["name"]); ?></p></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>

</body>

</html>
