# Project 2: Design Journey

**For each milestone, complete only the sections that are labeled with that milestone.** Refine all sections before the final submission. If you later need to update your plan, **do not delete the original plan, leave it place and append your new plan below the original.** Explain why you are changing your plan. Remember you are graded on your design process. Updating the plan documents your process!

**Replace ALL _TODOs_ with your work.** (There should be no TODOs in the final submission.)

Be clear and concise in your writing. Bullets points are encouraged.

**Everything, including images, must be visible in Markdown Preview.** If it's not visible in Markdown Preview, then we won't grade it. We won't give you partial credit either. **Your design journey should be easy to read for the grader; in Markdown Preview the question _and_ answer should have a blank line between them.**


## Design / Plan (Milestone 1)

**Make the case for your decisions using concepts from class, as well as other design principles, theories, examples, and cases from outside of class (includes the design prerequisite for this course).**

You can use bullet points and lists, or full paragraphs, or a combo, whichever is appropriate. The writing should be solid draft quality.

### Audiences (Milestone 1)

> Who are your site's audiences?
> Briefly explain who the intended audiences are for your project website.
> **DO NOT INVENT RANDOM AUDIENCES HERE!** Use the audiences from the requirements.

_Consumer_: The consumers are parents with developing children who are considering creating nature-rich spaces for their kids through gardening and plants.

_Site Administrator_: The administrators are members of the Playful Plants project, an organization aiming to provide information about how plants can provide opportunities for different kinds of play for young children.


### _Consumer_ Audience Goals (Milestone 1)

> Document your audience's goals.
> List each goal below. There is no specific number of goals required for this, but you need enough to do the job.
> **DO NOT INVENT RANDOM GOALS HERE OR STEREOTYPE HERE!** Your goals are things that your users want accomplish when using the site (e.g. print a list of plants). These are informed by the Playful Plants objectives. Review the assignment's requirements for details.

_Consumer_ Goal 1: Create a garden with plants that will provide year-round interest to the community.

- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - Make information about seasonality of each plant visible in the consumer view of the website, especially on the details page
  - Possibly include filtering between perennial and annual species on the broader catalog view
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - Might label perennial/annual on the more details page and have the broader catalog view not show that information (although the user can still use a filter to search for the two types)
  - The broader catalog view is mostly images and might get overloaded with too much text information
  - Could also use a small icon or symbol in the corner or by the plant name to indicate if it is perennial/annual

_Consumer_ Goal 2: Find a variety of plants to add to their garden that will create a high-quality, nature-rich space.

- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - Make gardening information visible in consumer view - this includes data in the "Growing Needs and Characteristics" and "General Classification" sections of the provided table
  - Also allow filtering based off of these categories so consumers can select specific types of plants to maximize variety
  - Consumers can also filter based off of plant growing needs so that they choose plants for their garden that are suited to the environmental conditions and are likely to grow well
  - Possibly have search and sort as well, although these may not be as important as they are to the admin because they may not necessarily have plants in mind already
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - Note: may be difficult to filter for Hardiness Zone Range because it is not a boolean type like the other categories (is/is not) but instead provides a range
  - Could use a checklist for including each zone, but would be visually crowded since there are so many hardiness zones
  - May only include that information on the more details page and not include it as a filtering option on the broader catalog view

_Consumer_ Goal 3: Engage children in gardening projects.

- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - On the more details page for each plant, have a section where the different play types it supports are listed
  - These play types will likely not be visible on the broader catalog view or as filter options, but will allow the parents to see the possible play potential of a plant that they are considering adding to their garden
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - Having the play types available on the broader catalog view may come across as visually crowded or overwhelming; too many filter options in addition to the gardening info filters
  - Parents may follow a process of looking for plants that are first practical and fit their garden (likely to grow well in the conditions ,are a type that they are looking for e.g. they want to find flowering plants to complete their vision of their garden)
  - After finding plants that are plausible for their garden, they can then look at the play opportunities provided by each plant they are considering and they know are practical
  - Therefore, play types can be a secondary concern for the consumers and broad category filtering should prioritize gardening info instead


### _Consumer_ Persona (Milestone 1)

> Use the goals you identified above to develop a persona of your site's audience.
> Create your persona using GenderMag's customizable personas.
> Take a screenshot and include it here. Persona must be visible in Markdown Preview; do not use PDF format!

![Screenshot of Abi, the consumer persona](consumer-persona.png)


### _Administrator_ Audience Goals (Milestone 1)

> Document your audience's goals.
> List each goal below. There is no specific number of goals required for this, but you need enough to do the job.
> **DO NOT INVENT RANDOM GOALS HERE OR STEREOTYPE HERE!** Your goals are things that your users want accomplish when using the site (e.g. print a list of plants). These are informed by the Playful Plants objectives. Review the assignment's requirements for details.


_Administrator_ Goal 1: Be able to update a database of playful plants.

- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - Have forms and buttons in place for adding a new plant to the database, editing a specific entry, and deleting an entry
  - Edit and delete buttons may appear as icons associated with each image in full catalog view
  - When clicked, the edit button leads to a new page (or modal box, depending on practicality later) where all fields for the plant can be changed and saved
  - Delete button preferably brings up a request for confirmation first
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - While the administrator does not necessarily need to see gardening information in broad catalog view, it should be visible in detailed page view so they can change it for the consumers if necessary

_Administrator_ Goal 2: Tailor plant selections by various play types.

- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - Have a filter/sort sidebar next to the broad catalog view for the various play types, as well as a search bar
  - Have a filter option where they find plants that fit all selected play types or include at least one
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - Likely don't need filters for gardening information, since the admin tends to search by play type primarily and is not aiming to garden with their database

_Administrator_ Goal 3: Print lists of plants to hand out as reference to interested parents.
- **Design Ideas and Choices** _How will you meet those goals in your design?_
  - Have a print preview page where a media query is used to reduce margins/spacing/colors
  - Probably don't need images to save ink
  - Since the lists are just references, they don't necessarily need gardening data for every plant on there as the most important information for the admin is the name, plant id, and play types
- **Rationale & Additional Notes** _Justify your decisions; additional notes._
  - If print is implemented for the consumer as well, might look different because they don't need plant id and may not prioritize play type but instead gardening information
  - (Side note: would be interesting to allow consumer to build lists of plants (they are able to save plants like a bookmarking system, almost like a shopping cart) but this may be time intensive)


### _Administrator_ Persona (Milestone 1)

> Use the goals you identified above to develop a persona of your site's audience.
> Create your persona using GenderMag's customizable personas.
> Take a screenshot and include it here. Persona must be visible in Markdown Preview; do not use PDF format!

![Screenshot of Tim, the admin persona](admin-persona.png)


### Site Design (Milestone 1)

> Document your _entire_ design process. **We want to see iteration!**
> **Show us the evolution of your design from your first idea (sketch) to the final design you plan to implement (sketch).**
> **Show us how you decided what data to display to each audience.**
> **Plan your URLs for the site.**
> **Provide a brief explanation _underneath_ each design artifact (2-3 sentences).** Explain what the artifact is, how it meets the goals of your personas (**refer to your personas by name**).
>
> **Important!** Plan _all_ site requirements. Don't forget login and logout.

_Initial Designs / Design Iterations:_

Pages to be planned:
- Catalog view for consumers
  - On mobile
  - On desktop
- Details page for consumers
  - On mobile
  - On desktop
- Catalog view for administrators
  - On desktop
- Details page for administrators
  - On desktop
- Log in page for administrators

URLs:
- / for catalog view
- /plant-name for details page (different for each plant)
- /login for login page

Thinking process for deciding what data is shown:
- For administrators like Tim, their goals are focused on editing their data and on seeing play types
  - Thus, Tim doesn't need to be able to filter for gardening information on catalog view
  - But since he may want to edit gardening information for the consumers, this should be visible on the details page
- For consumers like Abi, their goals are focused around finding plants for their garden which their children may like
  - She should be able to filter by gardening info and not by play types
  - She isn't as interested in fulfilling very specific play types - she will likely follow a process of first finding plants that fit the climate and her image of her garden, and then look at these plants in more detail to make final choices
  - However, since she has children who she wants to engage, it may be helpful for her to see play types supported on the details page to see the possible positive side benefits of choosing the plant for her kids
- In conclusion, the catalog views will have a different set of filters for each audience to support their different priorities, but the detail pages will appear the same for both
  - Only exception is that administrators can see options to edit on the details page
  - Revision: administrators' details page will be the edit page; the elements will be form elements right away


  1. Catalog view for consumers on mobile iterations

  ![Sketch 1 and 2 for consumer mobile catalog](consumer_mobile_catalog_sketch1.jpg)

  - Put filters at top since sidebars don't function well on mobile displays
  - One picture per row
  - In second iteration, filter options moved next to each other to make use of space after noticing the filter options are all relatively short text
  - Login corner in upper right as is often done

  ![Sketch 3 for consumer mobile catalog](consumer_mobile_catalog_sketch2.jpg)

  - Exploring options for filter/sort form at the top
  - Sketching out a dropdown / expansion option (which is done on sites such as JSTOR on mobile)
  - Plan for if an image is not available - slightly grayed out picture used for all such cases

  2. Catalog view for consumers on desktop iterations

  ![Sketch 1 for consumer desktop catalog](consumer_desktop_catalog_sketch1.jpg)
  ![Sketch 2 for consumer desktop catalog](consumer_desktop_catalog_sketch2.jpg)

  - Drawing on similar website layouts like rareseeds.com, sidebar with image grid to the right
  - Only colloquial names needed to be visible because consumers like Abi are only interested in the most well-known names; she is less familiar with scientific names and has no need for plant IDs
  - Important for consumers to have images so that Abi can look for plants that fit her vision of her garden

  - Sketch 2 iterates on sketch 1 by moving the images down slightly, allowing space at the top to show how many results were found
  - Also moved sort from the sidebar towards the top right in a dropdown, which is a more familiar design pattern to both Abi and Tim

  3. Details page for consumers on mobile iterations

  ![Sketch 1 for consumer mobile details](consumer-mobile-details-sketch1.jpg)
  ![Sketch 2 for consumer mobile details](consumer-mobile-details-sketch2.jpg)

  - Page that is displayed when the consumer clicks on a plant image or name in the broader catalog
  - Use familiar layout of name above one large image at top with bullet points for information
  - Abi can quickly find gardening information immediately below the image and if she wants to see play types, they are also visible

  - Sketch 2 changed play types from bullet points into round tags to offset them from the gardening information and limit scrolling and shift focus to the gardening content

  4. Details page for consumers on desktop iterations

  ![Sketch 1 for consumer desktop details](consumer-desktop-details-sketch1.jpg)
  ![Sketch 2 for consumer desktop details](consumer-desktop-details-sketch2.jpg)

  - Page that is displayed when the consumer clicks on a plant image or name in the broader catalog
  - Avoids use of a hero image by aligning image next to text

  - Sketch 2 moved plant name to the right side to better support scanning styles - when the text content is all placed towards the right half, Abi will have an easier time getting a quick overview

  5. Catalog view for administrators on desktop iterations

  ![Sketch 1 for admin desktop catalog](admin-desktop-catalog-sketch1.jpg)
  ![Sketch 2 for admin desktop catalog](admin-desktop-catalog-sketch2.jpg)

  - Add form at top for quick access; sidebar for filtering and sorting so that Tim can see changes applied immediately
  - Images not needed because the admin are more concerned with the play types than the other information, so each entry is a horizontal "card" that can be clicked on for a more details page identical to the consumers'

  - Sketch 2 showed number of results and moved sorting to an upper dropdown menu to better match known design patterns and have it match the consumer catalog slightly more
  - Put edit and delete icon buttons on the upper right of each entry as a shortcut for updating the plant

  6. Details page for administrators on desktop iterations

  ![Sketch 1 for admin desktop details](admin-desktop-details-sketch1.jpg)
  ![Sketch 2 for admin desktop details](admin-desktop-details-sketch2.jpg)

  - The details page for the admin has slightly more information than for the consumer because the details page also serves as the admin's edit form for each entry, so all information needs to be present if the admin wants to update
  - Each element is an editable form element, so that Tim can efficiently update entries without having to click extra buttons
  - Experimenting with moving around parts of the form to accommodate desktop's large size

_Final Design:_

1. Catalog view for consumers on mobile

![Final sketch for consumer mobile catalog](consumer_mobile_catalog_sketch_final.jpg)

- Largely similar to sketch 2, but two photos on each row instead of one so that the user is not overwhelmed with large photos
- Follows the layout of similar sites such as rareseeds.com
- Uses collapses filter section to save space vertically

2. Catalog view for consumers on desktop

![Final sketch for consumer desktop catalog](consumer_desktop_catalog_sketch_final.jpg)

- Increased spacing between images vertically to be less visually crowded in Abi's point of view
- Added dropdown menu in filter because the type of plant is better suited to that than a list of checkboxes, given the type can only be one of a list
- MINOR REVISION: change dropdown menu to checkboxes because Abi may want to look at more than one type of plant at a time

3. Details page for consumers on mobile

![Final sketch for consumer mobile details](consumer-mobile-details-sketch-final.jpg)

- Made list of tags of supported play types from inline into block because on mobile, there may not be enough space for wrapping to work properly

 4. Details page for consumers on desktop

![Final sketch for consumer desktop details](consumer-desktop-details-sketch-final.jpg)

- Expanded text content to better fit what what likely happen - there may be empty space underneath the image, but Abi has likely seen this in similar websites before, especially those that are associated with shopping
- Prevents Abi's eyes from having to jump to different spots on the page
- Revision: add breadcrumbs to top left of page so that Abi can navigate more easily back to the home page

5. Catalog view for administrators on desktop

![Final sketch for admin desktop catalog](admin-desktop-catalog-sketch-final.jpg)

- Fixed margin inconsistencies in sketch 2 by aligning everything in an entry to the left
- REVISION: add fourth textbox for a place to input hardiness zone data

6. Details page for administrators on desktop

![Final sketch for admin desktop details](admin-desktop-details-sketch-final.jpg)

- Decided to move form elements from being underneath the image to the side in a stacked layout with checkboxes being inline as needed, so that the form has good alignment and is filled out in a smooth vertical motion
- This way Tim does not have to jump around the page to fill out all fields and the layout is more similar to the details page seen by the consumers
- REVISION: will add fourth textbox so that there is a place to input hardiness zone data, which does not suit checkboxes or dropdowns
- REVISION: will add small button under image for file uploads so that the image can be changed

### Design Pattern Explanation/Reflection (Milestone 1)

> Write a one paragraph (6-8 sentences) reflection explaining how you used design patterns for media catalogs in your site's final design.

The login button is placed in the upper right corner, where it is typically located on many websites. On desktop, a sidebar with filters is a common design pattern, especially one that is located on the left side and is aligned with the media so that changes can be applied adjacently. Sorting is also usually done in dropdown menus on the upper right and is separate from the filtering sidebar. For the consumer, a grid of images was used with limited text associated with each, a common simple layout for media catalogs. By being able to see a separate page with more details by clicking on each square, this design emulates many similar websites with a catalog. Finally, aligning text on the details page towards the right half and the image on the left is following a common pattern seen in many shopping sites.


### Cognitive Styles Explanation/Reflection (Milestone 1)

> Write a one paragraph (6-8 sentences) reflection explaining how your final design supports the cognitive styles of each persona.

_Consumer Cognitive Styles Reflection:_

By using very common design patterns and a simple layout with high amounts of alignment, Abi sees aspects of the website as familiar and predictable, which suits her lower computer self-efficacy and attitude toward risk. By placing the filters in a visually prominent location, Abi can also quickly search for the plants that will suit her garden without having to scroll or click around too much, suiting her motivations. She wants to accomplish her tasks using comfortable methods instead of experimentation, so familiar steps like clicking on recognizable elements helps her learn by process. By making the images and plant names clickable links on catalog view, she feels comfortable taking the next step after finding a plant she wants to know more about. With catalog view, since everything is visible in a quick overview, Abi can look over what the site offers as a whole instead of immediately choosing a specific plant's information, suiting her information processing style.


_Site Administrator Cognitive Styles Reflection:_

On catalog view, subheadings for different sections like Add Plant, Refine Results, and Results allow Tim to find leads to figure out how to accomplish tasks. This suits his selective information processing style. The edit and delete buttons being available immediately next to each entry serve as shortcuts and suit Tim's high computer self-efficacy and risk tolerance. He is more likely to find these tools useful than be hesitant to click on them. Since he likes tinkering and is motivated by exploration, these details like small buttons are something that Tim is likely to notice and make use of. Instead of following a process like clicking on one entry and then clicking an edit button, then clicking into a field to change it, his high risk tolerance allows him to utilize shortcut tools without much concern.


## Implementation Plan (Milestone 1, Milestone 2, Milestone 3, Final Submission)

### Database Schema (Milestone 1)
> Describe the structure of your database. You may use words or a picture. A bulleted list is probably the simplest way to do this. Make sure you include constraints for each field.
> **Hint: You probably need a table for "entries", `tags`, `"entry"_tags`** (stores relationship between entries and tags), and a `users` tables.
> **Hint: For foreign keys, use the singular name of the table + _id.** For example: `image_id` and `tag_id` for the `image_tags` (tags for each image) table.

Table: entries

- id: INTEGER {PK, U, NN, AI}
- name: STRING {NN}
- scientific_name: STRING {NN}
- plant_id: STRING {U, NN}
- Revision: hardiness_zone: STRING {NN}

- exploratory_constructive_play: INTEGER {NN}
- exploratory_sensitive_play : INTEGER {NN}
- physical_play: INTEGER {NN}
- imaginative_play: INTEGER {NN}
- restorative_play: INTEGER {NN}
- expressive_play: INTEGER {NN}
- play_with_rules: INTEGER {NN}
- bio_play: INTEGER {NN}
- Revision: above play types will be removed as fields in this table and will become tags instead
- Revision: above play types will be moved back as fields in this table instead of being tags

Table: tags

- id: INTEGER {PK, U, NN, AI}
- name: TEXT {NN}

Table: entry_tags

- id: INTEGER {PK, U, NN, AI}
- entry_id: {NN} FOREIGN KEY REFERENCES entries
- tag_id: {NN} FOREIGN KEY REFERENCES tags

Table: users

- id: INTEGER {PK, U, NN, AI}
- username: TEXT {U, NN}
- password: TEXT {NN}

LATER REVISION - play types will instead be included under tags, which removes all of the play type fields from table "entries". Examples of possible records under "name" in table "tags" would be "bio play", "restorative play", "shrub", "partial shade" and other information that is not the main plant data (plant name, scientific name, plant id).

LATER REVISION 2 - play types will be moved back under entries instead of tags because separating the play type tags from the other tags makes it less complex to echo out data in admin catalog

REVISION 2 - category "hardiness zones" will be moved out of table "tags" and instead to "entries", because they function unlike the other fields in tags (are unique and not represented by boolean type data)

REVISION 3 - new table to hold file upload information

Table: documents

- id: INTEGER {PK, U, NN, AI}
- file_name: TEXT {NN}
- file_ext: TEXT {NN}


### Database Query Plan (Milestone 1, Milestone 2, Milestone 3, Final Submission)
> Plan _all_ of your database queries. You may use natural language, pseudocode, or SQL.

- For admin:

```
// all records
SELECT * FROM entries;
```

```
// filtering
SELECT * FROM entries WHERE (the play type(s) checked by the admin is 1, indicating the plant supports it);

// sorting
SELECT * FROM entries ORDER BY id DESC; // for most recent to oldest
SELECT * FROM entries ORDER BY name ASC; // for alphabetical A-Z);
```

```
// details page
SELECT * FROM entries WHERE (id=$id);
// then escape with array of parameter markers
```

```
// editing a plant entry
UPDATE entries SET
  name = :name,
  scientific_name = :scientific_name,
  plant_id = :plant_id,
  hardiness_zone = :hardiness_zone,
  exploratory_constructive_play = :exploratory_constructive_play,
  exploratory_sensory_play = :exploratory_sensory_play,
  physical_play = :physical_play,
  imaginative_play = :imaginative_play,
  restorative_play = :restorative_play,
  expressive_play = :expressive_play,
  play_with_rules = :play_with_rules,
  bio_play = :bio_play)
  ...
  WHERE (id=___);

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

DELETE FROM entries WHERE (id=___);

INSERT INTO entries (fields) VALUES (parameter markers using an array);

// editing the tags of a plant entry
DELETE FROM entry_tags WHERE (entry.id = $id AND $tags.id = __); // drop unwanted tag
INSERT INTO entry_tags (entry.id, tags.id) VALUES ($id, __);
then escape with parameter marker array
```

```
// adding a new plant
// insert into entries table
INSERT INTO entries (name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (:name, :scientific_name, :plant_id, :hardiness_zone, :exploratory_constructive, :exploratory_sensory, :physical, :imaginative, :restorative, :expressive, :rules, :bio);

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

// insert into entry_tags table
INSERT INTO entry_tags (entry_id, tag_id) VALUES (:entry_id, :tag_id);

```

```
// uploading image on add form / edit form
$file_result = exec_sql_query(
  $db,
  "INSERT INTO documents (file_name, file_ext) VALUES (:file_name, :file_ext)",
  array(
    ':file_name' => $image_filename,
    ':file_ext' => $image_ext,
  )
);
```


- For consumer:
```
// filtering
SELECT * FROM entries WHERE (the gardening conditions checked by the consumer is 1, indicating it is true for the plant);

REVISION:
SELECT *
  FROM entry_tags
	INNER JOIN tags ON entry_tags.tag_id = tags.id
	INNER JOIN entries ON entry_tags.entry_id = entries.id
  WHERE (entry_tags.tag_id = 1);
// this returns a list of plants that have tag of id 1 (perennial)
// replace 1 with variables and escape with array of parameter markers

// sorting
SELECT * FROM entries ORDER BY id DESC; // for most recent to oldest
SELECT * FROM entries ORDER BY name ASC; // for alphabetical A-Z);
```

```
// details page
// returning the tags associated with the plant being viewed
SELECT tags.id, tags.name
  FROM (entry_tags INNER JOIN tags ON entry_tags.tag_id = tags.id)
  WHERE (entry_tags.entry_id = $id);
// then escape with array of parameter markers

// ^ REVISION: only need tags.id from the inner join, not both id and name

// returning the information associated with the plant entry
SELECT * FROM entries WHERE (id = $id);
// then escape with array of parameter markers
```


### Code Planning (Milestone 1, Milestone 2, Milestone 3, Final Submission)
> Plan any PHP code you'll need here using pseudocode.
> Tip: Break this up by pages. It makes it easier to plan.

- Admin catalog view

```
// for outputting into html for admin catalog view after retrieving records:
for each record in records:
  echo the name into the heading of a data "entry" div
  echo the scientific name into the heading
  echo the plant id into the paragraph element below the heading
  if play type has value of 1, echo it into a list element
```

```
// dynamic output
<div class="entry">
  <div class="entry-header">
    <h4> echo $name <em>(echo $scientific_name)</em></h4>
    <div class="entry-edit-buttons">
      <button type="button">Edit</button>
      <button type="button">Delete</button>
    </div>
  </div>
  <p> echo $plant_id <p>
  <p>Types of play supported:</p>
  <ul>
    echo <li> . play type . </li> if play type is supported (not 0)
  </ul>
</div>
```

```
// list of feedback classes for admin add and edit forms, hidden by default
// will be placed in divs of class="feedback" above form elements
$name_feedback_class = 'hidden';
$scientific_name_feedback_class = 'hidden';
$plant_id_feedback_class = 'hidden';
$plant_id_unique_feedback_class = 'hidden';
$play_type_feedback_class = 'hidden';

// NEW from project 2
$hardiness_zone_feedback_class = 'hidden'; // should not be empty
$shade_feedback_class = 'hidden'; // at least one should be chosen
$plant_type_feedback_class = 'hidden'; // one should be chosen

if (empty($hardiness_zone)) {
  $add_form_valid = False;
  $hardiness_zone_feedback_class = '';
}

if (empty($full_sun) && empty($partial_shade) && empty($full_shade)) {
  $add_form_valid = False;
  $shade_feedback_class = '';
}

if (empty($shrub) && empty($grass) && empty($vine) && empty($tree) && empty($flower) && empty($groundcover) && empty($other)) {
  $add_form_valid = False;
  $plant_type_feedback_class = '';
}
```

```
// sorting entries in catalog view pseudocode
4 types of sort:
1. oldest to most recent (default)
2. most recent to oldest
3. alphabetical by common name A-Z
4. alphabetical by common name Z-A

// necessary query strings:
1. &sort=id&order=asc
2. &sort=id&order=desc
3. &sort=name&order=asc
4. &sort=name&order=desc

make each <option> have an <a href="query string">
revision: since option cannot have <a> elements, use onchange attribute

These query strings need to be glued onto "admin/"
$sort_query = one of the strings above;
$sort_base = "/admin?" . $sort_query;

however, $sort_query must also contain any strings to remember applied filters
$sort_query = http_build_query(
  array(
    'exploratory-constructive-play' = $exploratory_constructive_filter ?: NULL,
    'exploratory-sensory-play' = $exploratory_sensory_filter ?: NULL,
    'physical-play' = $physical_filter ?: NULL,
    'imaginative-play' = $imaginative_filter ?: NULL,
    'restorative-play' = $restorative_filter ?: NULL,
    'expressive-play' = $expressive_filter ?: NULL,
    'rules-play' = $rules_filter ?: NULL,
    'bio-play' = $bio_filter ?: NULL
  )
);
```

```
// file uploads needed on the admin edit page and admin add form (on catalog view)
// all images need to be moved to public/uploads/documents and renamed to [id].extension
// table needs to be created with name "documents" to store file information

define("MAX_FILE_SIZE", 1000000);

$file_ext_feedback_class = 'hidden';
if ext is not jpg or png:
  $file_ext_feedback_class = '';

$image_filename = '';
$image_ext = '';

if (add button OR edit button is pressed) {
  $upload = $_FILES['image-file'];

  if ($upload['error'] == UPLOAD_ERR_OK) {
    $image_filename = basename($upload['name']);
    $image_ext = strtolower(pathinfo($image_filename, PATHINFO_EXTENSION));
    if (!in_array($image_ext, array('jpg', 'jpeg', 'png'))) {
      $form_valid = False;
    }
  } else {
    $form_valid = False;
  }

  if form_valid {
    $file_result = db query that inserts file info into table "documents"
    if $file_result {
      $record_id = $db->lastInsertId('id');
      $id_filename = 'public/uploads/documents/' . $record_id . '.' . $image_ext;
      move_uploaded_file($upload["tmp_name"], $id_filename);
    } else {
      $file_ext_feedback_class = '';
    }
  }

}

<p class="feedback <?php echo $file_ext_feedback_class; ?>">File is required to be in .jpg or .png format.</p>
<form action="/admin" method="post" enctype="multipart/form-data" novalidate>
  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />

  <label for="upload-image">JPG or PNG file:</label>
  <input id="upload-image" type="file" name="image-file" accept=".png, .jpg" />
</form>
```

```
// adding an entry
// similar to editing an entry (also needs variables + sticky variables for the gardening information to be added)
// code from project 2 in place takes care of everything except for the gardening info

if admin clicks the add plant button:
  validate all fields
  if at least one field is invalid
    form_valid is false, set sticky values, show feedback messages
  create array of tags selected
  add plant info into entries table
  access tags array and add those into the entry_tags table as foreign keys to the corresponding tables where entry_id = id of this plant being added and tags_id = ids of the tags in the array
```

```
create form element where the submit button is the edit button
<form method = "get" action="/admin/detail-admin">

use hidden input to track what plant is being edited
<input type="hidden" name="id" value="<?php echo $record["id"]; ?>"/>
```


- Consumer catalog view

```
// for outputting into html for consumer catalog view after retrieving records:
for each record in records:
  echo image associated with the id for the record into the square div
  echo the name into the div underneath the picture
```

```
//php code at top of page:
$db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

$name = '';
$plant_id = '';

$records = exec_sql_query($db, "SELECT * FROM entries;") -> fetchAll();
```

```
<div class="photo">
  <a href="/detail"><img src="public/images/ echo $plant_id .jpg" alt=""/></a>
  <a href="/detail"><p> echo $name </p></a>
</div>
```

```
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
  $sticky_tree_filter = '($plant_type == "tree") ? "selected" : '';
  $sticky_flower_filter = ($plant_type == "flower") ? "selected" : '';
  $sticky_groundcover_filter = ($plant_type == "groundcover") ? "selected" : '';
  $sticky_other_filter = ($plant_type == "other") ? "selected" : '';

  $show_filter_confirmation = True;

  // add selected filter options to array
  if ($perennial_filter) {
    array_push($garden_filter_options, "(perennial)");
  }
  if ($annual_filter) {
    array_push($garden_filter_options, "(annual)");
  }
  if ($full_sun_filter) {
    array_push($garden_filter_options, "(full sun)");
  }
  if ($partial_shade_filter) {
    array_push($garden_filter_options, "(partial shade)");
  }
  if ($full_shade_filter) {
    array_push($garden_filter_options, "(full shade)");
  }

  // display either all records containing at least one of the selected filters
  // OR records containing all selected filters depending on if user checked inclusive option
  if (count($garden_filter_options) > 0) {
    if ($inclusive_filter) {
      $filter_where = ' WHERE ' . implode(' AND ', $garden_filter_options);
    } else {
      $filter_where = ' WHERE ' . implode(' OR ', $garden_filter_options);
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
      'perennial-filter' => $perennial_filter ?: NULL,
      'annual-filter' => $annual_filter ?: NULL,
      'full-sun-filter' => $full_sun_filter ?: NULL,
      'partial-shade-filter' => $partial_shade_filter ?: NULL,
      'full-shade-filter' => $full_shade_filter ?: NULL,
    )
  );

  $sort_base = "/?" . $sort_query;

  // final filter/sort query
  $filter_query = $filter_base . $filter_where . $filter_order;

  $records = exec_sql_query($db, $filter_query) -> fetchAll();
  $queries_matching = count($records);

  // later in code:
  // echo sticky values out in input so they can stay checked when selected (for both filters and sorting)
  // hidden inputs in the filter form keeping track of sort
  // hidden inputs under sort keeping track of filters

```


- Consumer details view

```
when user clicks on image or plant name:
  use <a> element for URL with query string parameters for a GET request

the link on each image/name for every plant on catalog view should roughly be:
<a href="/details?name=value>
where name is "name" and value is $record["name"]

Revision: since the names have spaces that will make the url less usable, ids will be used instead
<a href="/details?id=$record["id"]> for each record in records
```

```
// dynamic output
<div class="detail-page">
    <div class="detail-photo">
      <img src="public/images/[$plant_id].jpg" alt="">
    </div>
    <div class="detail-text">
      <div class="garden-list">
        <h2>[$name]</h2>
        <h3>Gardening care:</h3>
        <ul>
          [All tags associated with this plant as list elements]
        </ul>
      </div>
      <div class="play-list">
        <h3>Types of play supported:</h3>
          <ul>
            [All types of play associated with this plant as list elements]
          </ul>
      </div>
    </div>
  </div>
```


- Admin details view

```
// editing an entry
if the admin clicks the edit button from catalog view:
  use hidden inputs to echo current data for that entry id into the edit form that comes up
  if the admin clicks save:
    update the database via database query where the id from the hidden input is used so the right entry is edited
    $updated_entries = exec_sql_query($db, UPDATE entries SET ....);
    $updated_tags = exec_sql_query($db, UPDATE entry_tags SET ....);
    $updated_documents = exec_sql_query($db, UPDATE documents SET ....);

if (isset($_POST['edit-plant'])) {
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

    $upload = $_FILES['edit-image-file'];


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
      if (count($check_records) > 0) {
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

    if ($upload['size'] != 0) {
      if ($upload['error'] == UPLOAD_ERR_OK) {
        $image_filename = basename($upload['name']);
        $image_ext = strtolower(pathinfo($image_filename, PATHINFO_EXTENSION));
        if (!in_array($image_ext, array('jpg', 'jpeg', 'png'))) {
          $edit_form_valid = False;
        }
      } else {
        $edit_form_valid = False;
      }
    } else {
      // no file was chosen
      // use placeholder image for this new entry
      $image_filename = "default.png";
      $image_ext = "png";
    }


    if ($edit_form_valid) {
      //form is valid; edit record in database
      $result = exec_sql_query($db, "UPDATE entries (name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (:name, :scientific_name, :plant_id, :hardiness_zone, :exploratory_constructive, :exploratory_sensory, :physical, :imaginative, :restorative, :expressive, :rules, :bio);",
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
      if ($perennial && !in_array(1, $tags)) {
        array_push($tags, 1);
      }
      if ($annual && !in_array(2, $tags)) {
        array_push($tags, 2);
      }
      if ($full_sun && !in_array(3, $tags)) {
        array_push($tags, 3);
      }
      if ($partial_shade && !in_array(4, $tags)) {
        array_push($tags, 4);
      }
      if ($full_shade && !in_array(5, $tags)) {
        array_push($tags, 5);
      }
      if ($plant_type == "Shrub" && !in_array(6, $tags)) {
        array_push($tags, 6);
      }
      if ($plant_type == "Grass" && !in_array(7, $tags)) {
        array_push($tags, 7);
      }
      if ($plant_type == "Vine" && !in_array(8, $tags)) {
        array_push($tags, 8);
      }
      if ($plant_type == "Tree" && !in_array(9, $tags)) {
        array_push($tags, 9);
      }
      if ($plant_type == "Flower" && !in_array(10, $tags)) {
        array_push($tags, 10);
      }
      if ($plant_type == "Groundcover" && !in_array(11, $tags)) {
        array_push($tags, 11);
      }
      if ($plant_type == "Other" && !in_array(12, $tags)) {
        array_push($tags, 12);
      }

      $new_entry_id = $db->lastInsertId('id');;

      foreach ($tags as $tag) {
        $result_tag = exec_sql_query($db, 'UPDATE entry_tags SET
        entry_id = :entry_id,
        tag_id = :tag_id,
          array(
            'entry_id' => $new_entry_id,
            'tag_id' => $tag
          )
        );
      }

      $file_result = exec_sql_query(
        $db,
        "UPDATE documents SET
        file_name = :file_name,
        file_ext = :file_ext,
        array(
          ':file_name' => $image_filename,
          ':file_ext' => $image_ext,
        )
      );
      if ($file_result) {
        // only upload image if a file was selected
        if ($upload) {
          $id_filename = 'public/uploads/documents/' . $new_entry_id . '.' . $image_ext;
          move_uploaded_file($upload["tmp_name"], $id_filename);
        }
      } else {
        $file_ext_feedback_class = '';
      }
    }

    if ($result && $result_tag && $file_result) {
      $plant_edited = True;
      $show_confirmation = True;
    } else {
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

}

<form id="edit-plant" method="post" action="<?php echo "/admin/edit?id=" . $record["id"]?>" novalidate>
...
</form>
```

```
// editing the tags of a plant
// pseudocode:
tags = array of numbers where each number = a tag id, indicating the plant has that tag

new_tags = array of new numbers generated when the admin clicks "save changes" that looks at the tags now applied

if # is in_array(tags) and not in_array(new_tags):
  // admin wants to remove this tag
  exec_sql_query($db, "sql code for removing the entry in table entry_tags where tag_id = # and entry_id = $id")

if # is not in_array(tags) and is in_array(new_tags):
  // admin wants to add this tag
  exec_sql_query($db, "sql code for adding the entry in table entry_tags where tag_id = # and entry_id = $id")


```

```
// dynamic output part 1
// outputting into the html the text fields
$name = "";
$scientific_name = "";
$plant_id = "";
$hardiness_zone = "";

$name = $record["name"];
$scientific_name = $record["scientific_name"];
$plant_id = $record["plant_id"];
$hardiness_zone = $record["hardiness_zone"];
// where $record is the plant data retrieved using the viewed plant's id

<section class="edit-plant-form">
      <h2>Edit [$name]</h2>
      <form id="edit-plant" method="post" action="/" novalidate>

        <div class="edit-text">
          <label for="edit-plant-name">Plant Name (Colloquial):</label>
          <input type="text" name="edit-plant-name" id="edit-plant-name" value="[$name]"/>
        </div>

        <div class="edit-text">
          <label for="edit-scientific-name">Plant Name (Scientific):</label>
          <input type="text" name="edit-scientific-name" id="edit-scientific-name" value="[$scientific_name]" />
        </div>

        <div class="edit-text">
          <label for="edit-plant-id">Plant ID:</label>
            <input type="text" name="edit-plant-id" id="edit-plant-id" value="[$plant_id]" />
        </div>
```

```
// dynamic output part 2
// outputting checked boxes for the gardening information section, accessing tags
// general idea: create list of boolean variables tracking if a tag was returned from the inner join above (basically checks if the displayed plant has that tag)
// to check if a tag is in the array, the column with the tag ids needs to be turned into an array first

$tag_list = array_column($tag_array, 'id');

// then in_array can be used to check if a tag's id is present or not
$perennial = in_array(1, $tag_list);
$annual = in_array(2, $tag_list);
$full_sun = in_array(3, $tag_list);
$partial_shade = in_array(4, $tag_list);
$full_shade = in_array(5, $tag_list);
```

```
// edit form feedback classes (same as add form feedback classes on admin catalog view)
// NEW from project 2
// will be placed in divs of class="feedback" above form elements
$hardiness_zone_feedback_class = 'hidden'; // should not be empty
$shade_feedback_class = 'hidden'; // at least one should be chosen
$plant_type_feedback_class = 'hidden'; // one should be chosen

if (empty($hardiness_zone)) {
  $add_form_valid = False;
  $hardiness_zone_feedback_class = '';
}

if (empty($full_sun) && empty($partial_shade) && empty($full_shade)) {
  $add_form_valid = False;
  $shade_feedback_class = '';
}

if (empty($shrub) && empty($grass) && empty($vine) && empty($tree) && empty($flower) && empty($groundcover) && empty($other)) {
  $add_form_valid = False;
  $plant_type_feedback_class = '';
}
```

- General

```
// big picture add form validation:
check if form is valid
if form valid:
  show confirmation message
else:
  form is not valid
  set all variables of form input to sticky values
  remove hidden from the feedback messages for the affected field(s)
```

```
// variables needed to track all values of a plant

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
$sticky_shrub = '';
$sticky_grass = '';
$sticky_vine = '';
$sticky_tree = '';
$sticky_flower = '';
$sticky_groundcover = '';
$sticky_other = '';

// for both the play types and the gardening info checkboxes (whose variables are boolean), the sticky values can be assigned to a ternary operator of general form $variable ? '' : 'checked' which will then be echoed into the form checkbox input element
// therefore the form will load with the corresponding boxes already checked for the plant being displayed on the admin details page

// sticky values for dropdown menu (plant types):
$sticky_shrub = ($plant_type == 'Shrub' ? 'selected' : '');
$sticky_grass = ($plant_type == 'Grass' ? 'selected' : '');
$sticky_vine = ($plant_type == 'Vine' ? 'selected' : '');
$sticky_tree = ($plant_type == 'Tree' ? 'selected' : '');
$sticky_flower = ($plant_type == 'Flower' ? 'selected' : '');
$sticky_groundcover = ($plant_type == 'Groundcover' ? 'selected' : '');
$sticky_other = ($plant_type == 'Other' ? 'selected' : '');
// echo sticky values in option elements in html dropdown menu code
```


### Accessibility Audit (Final Submission)
> Tell us what issues you discovered during your accessibility audit.
> What do you do to improve the accessibility of your site?

TODO


## Reflection (Final Submission)

### Audience (Final Submission)
> Tell us how your final site meets the goals of your audiences. Be specific here. Tell us how you tailored your design, content, etc. to make your website usable for your personas.

TODO


### Additional Design Justifications (Final Submission)
> If you feel like you haven’t fully explained your design choices in the final submission, or you want to explain some functions in your site (e.g., if you feel like you make a special design choice which might not meet the final requirement), you can use the additional design justifications to justify your design choices. Remember, this is place for you to justify your design choices which you haven’t covered in the design journey. You don’t need to fill out this section if you think all design choices have been well explained in the design journey.

TODO


### Self-Reflection (Final Submission)
> Reflect on what you learned during this assignment. How have you improved from Project 2? What would you do differently next time?

TODO


> Take some time here to reflect on how much you've learned since you started this class. It's often easy to ignore our own progress. Take a moment and think about your accomplishments in this class. Hopefully you'll recognize that you've accomplished a lot and that you should be very proud of those accomplishments!

TODO


### Grading: Step-by-Step Instructions (Final Submission)
> Write step-by-step instructions for the graders.
> The project if very hard to grade if we don't understand how your site works.
> For example, you must login before you can delete.
> For each set of instructions, assume the grader is starting from /

_View all entries:_

1. TODO
2.

_View all entries for a tag:_

1. TODO
2.

_View a single entry's details:_

1. TODO
2.

_How to insert and upload a new entry:_

1. TODO
2.

_How to delete an entry:_

1. TODO
2.

_How to edit and existing entry and its tags:_

1. TODO
2.
