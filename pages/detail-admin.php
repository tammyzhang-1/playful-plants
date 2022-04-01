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
    <button type="button"><a href="/">Log out</a></button>
  </header>
  <main>
  <div class="detail-page">
    <div class="detail-photo">
      <img src="public/images/FL_27.jpg" alt="">
    </div>
    <div class="detail-text">
    <section class="edit-plant-form">
      <h2>Edit High Mallow</h2>
      <form id="edit-plant" method="post" action="/" novalidate>

        <div class="edit-text">
          <label for="edit-plant-name">Plant Name (Colloquial):</label>
          <input type="text" name="edit-plant-name" id="edit-plant-name" value="High Mallow"/>
        </div>

        <div class="edit-text">
          <label for="edit-scientific-name">Plant Name (Scientific):</label>
          <input type="text" name="edit-scientific-name" id="edit-scientific-name" value="Malva sylvestris" />
        </div>

        <div class="edit-text">
          <label for="edit-plant-id">Plant ID:</label>
            <input type="text" name="edit-plant-id" id="edit-plant-id" value="FL_27" />
        </div>

        <h3>Gardening characteristics:</h3>
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
              <input type="checkbox" name="edit-exploratory-sensory" id="edit-exploratory-sensory" checked/>
              <label for="edit-exploratory-sensory">Exploratory Sensory Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-physical" id="edit-physical" checked/>
              <label for="edit-physical">Physical Play</label>
            </div>

            <div class="play-type">
              <input type="checkbox" name="edit-imaginative" id="edit-imaginative" checked/>
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
              <input type="checkbox" name="edit-bio" id="edit-bio" checked/>
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
