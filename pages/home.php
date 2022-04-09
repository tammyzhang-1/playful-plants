<?php
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

$name = '';
$plant_id = '';

$records = exec_sql_query($db, "SELECT * FROM entries;") -> fetchAll();
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
    <button type="button"><a href="/admin">Log in</a></button>
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
                <input type="checkbox" name="perennial-filter" id="perennial-filter" />
                <label for="perennial-filter">Perennial</label>
              </div>

              <div class="filter-option">
                <input type="checkbox" name="annual-filter" id="annual-filter" />
                <label for="annual-filter">Annual</label>
              </div>

              <div class="filter-option">
                <input type="checkbox" name="full-sun-filter" id="full-sun-filter" />
                <label for="full-sun-filter">Full Sun</label>
              </div>

              <div class="filter-option">
                <input type="checkbox" name="partial-shade-filter" id="partial-shade-filter" />
                <label for="partial-shade-filter">Partial Shade</label>
              </div>

              <div class="filter-option">
                <input type="checkbox" name="full-shade-filter" id="full-shade-filter" />
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
                <input id="filter-garden-submit" type="submit" name="filter-garden-submit" value="Apply" />
              </div>
          </form>
        </div>
      </div>

      <div>
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
        <!-- Media grid section -->
        <div id="media-grid">
          <?php
          foreach ($records as $record) { ?>
            <div class="photo">
              <!-- referencing mozilla documentation: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Img -->
              <a href="/detail"><img src="public/images/<?php echo $record["plant_id"]; ?>.jpg" onerror=this.src="public/images/default.png" alt=""/></a>
              <a href="/detail"><p><?php echo $record["name"]; ?></p></a>
            </div>
          <?php } ?>
            <!-- <div class="photo">
              <img src="public/images/GA_03.jpg" alt="">
              <p>Switchgrass</p>
            </div>
            <div class="photo">
              <img src="public/images/GR_15.jpg" alt="">
              <p>Blue Violet</p> -->
            <!-- </div> -->
        </div>
      </div>
    </div>
  </main>

</body>

</html>
