<?php
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

$name = '';
$plant_id = '';

// filtering and sorting
// sort/filter SQL query base pieces
$filter_base = "SELECT * FROM entries";
$filter_where = '';
$garden_filter_options = array();
$filter_order = ' ORDER BY name ASC;';

// filter form values
$perennial_filter = '';
$annual_filter = '';
$full_sun_filter = '';
$partial_shade_filter = '';
$full_shade_filter = '';
$shrub_filter = '';
$grass_filter = '';
$vine_filter = '';
$tree_filter = '';
$flower_filter = '';
$groundcover_filter = '';
$other_filter = '';

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

$shrub_filter = $_GET['shrub-filter'];
$grass_filter = $_GET['grass-filter'];
$vine_filter = $_GET['vine-filter'];
$tree_filter = $_GET['tree-filter'];
$flower_filter = $_GET['flower-filter'];
$groundcover_filter = $_GET['groundcover-filter'];
$other_filter = $_GET['other-filter'];

// make filter options chosen by user sticky
$sticky_perennial_filter = $perennial_filter ? "checked" : '';
$sticky_annual_filter = $annual_filter ? "checked" : '';

$sticky_full_sun_filter = $full_sun_filter ? "checked" : '';
$sticky_partial_shade_filter = $partial_shade_filter ? "checked" : '';
$sticky_full_shade_filter = $full_shade_filter ? "checked" : '';

$sticky_shrub_filter = $shrub_filter ? "checked" : '';
$sticky_grass_filter = $grass_filter ? "checked" : '';
$sticky_vine_filter = $vine_filter ? "checked" : '';
$sticky_tree_filter =  $tree_filter ? "checked" : '';
$sticky_flower_filter = $flower_filter ? "checked" : '';
$sticky_groundcover_filter = $groundcover_filter ? "checked" : '';
$sticky_other_filter = $other_filter ? "checked" : '';

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
if ($shrub_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 6)");
}
if ($grass_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 7)");
}
if ($vine_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 8)");
}
if ($tree_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 9)");
}
if ($flower_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 10)");
}
if ($groundcover_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 11)");
}
if ($other_filter) {
  array_push($garden_filter_options, "(entry_tags.tag_id == 12)");
}

// display either all records containing at least one of the selected filters
// OR records containing all selected filters depending on if user checked inclusive option
if (count($garden_filter_options) > 0) {
  $filter_where = ' WHERE ' . implode(' OR ', $garden_filter_options);
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
    'shrub-filter' => $shrub_filter ?: NULL,
    'grass-filter' => $grass_filter ?: NULL,
    'vine-filter' => $vine_filter ?: NULL,
    'tree-filter' => $tree_filter ?: NULL,
    'flower-filter' => $flower_filter ?: NULL,
    'groundcover-filter' => $groundcover_filter ?: NULL,
    'other-filter' => $other_filter ?: NULL
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
            <h3 id="filter-by">Filter by:</h3>

            <h5>Seasonality</h5>
            <div class="filter-option">
              <input type="checkbox" name="perennial-filter" id="perennial-filter" <?php echo $sticky_perennial_filter; ?>/>
              <label for="perennial-filter">Perennial</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="annual-filter" id="annual-filter" <?php echo $sticky_annual_filter; ?>/>
              <label for="annual-filter">Annual</label>
            </div>

            <h5>Light Needs</h5>
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

            <h5>Plant Types</h5>
            <div class="filter-option">
              <input type="checkbox" name="shrub-filter" id="shrub-filter" <?php echo $sticky_shrub_filter; ?>/>
              <label for="shrub-filter">Shrub</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="grass-filter" id="grass-filter" <?php echo $sticky_grass_filter; ?>/>
              <label for="grass-filter">Grass</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="vine-filter" id="vine-filter" <?php echo $sticky_vine_filter; ?>/>
              <label for="vine-filter">Vine</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="tree-filter" id="tree-filter" <?php echo $sticky_tree_filter; ?>/>
              <label for="tree-filter">Tree</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="flower-filter" id="flower-filter" <?php echo $sticky_flower_filter; ?>/>
              <label for="flower-filter">Flower</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="groundcover-filter" id="groundcover-filter" <?php echo $sticky_groundcover_filter; ?>/>
              <label for="groundcover-filter">Groundcover</label>
            </div>

            <div class="filter-option">
              <input type="checkbox" name="other-filter" id="other-filter" <?php echo $sticky_other_filter; ?>/>
              <label for="other-filter">Other</label>
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
              <option value="<?php echo $sort_base . "&sort=name&order=asc"?>" <?php echo $sticky_name_sort_asc; ?>>Alphabetical by name A-Z (default)</option>
              <option value="<?php echo $sort_base . "&sort=name&order=desc"?>" <?php echo $sticky_name_sort_desc; ?>>Alphabetical by name Z-A</option>
              <option value="<?php echo $sort_base . "&sort=id&order=asc"?>" <?php echo $sticky_id_sort_asc; ?>>Oldest to most recently added</option>
              <option value="<?php echo $sort_base . "&sort=id&order=desc"?>" <?php echo $sticky_id_sort_desc; ?>>Most recently added to oldest</option>
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
