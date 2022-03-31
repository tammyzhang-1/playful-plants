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

TODO


_Final Design:_

TODO


### Design Pattern Explanation/Reflection (Milestone 1)

> Write a one paragraph (6-8 sentences) reflection explaining how you used design patterns for media catalogs in your site's final design.

TODO


### Cognitive Styles Explanation/Reflection (Milestone 1)

> Write a one paragraph (6-8 sentences) reflection explaining how your final design supports the cognitive styles of each persona.

_Consumer Cognitive Styles Reflection:_

TODO


_Site Administrator Cognitive Styles Reflection:_

TODO


## Implementation Plan (Milestone 1, Milestone 2, Milestone 3, Final Submission)

### Database Schema (Milestone 1)
> Describe the structure of your database. You may use words or a picture. A bulleted list is probably the simplest way to do this. Make sure you include constraints for each field.
> **Hint: You probably need a table for "entries", `tags`, `"entry"_tags`** (stores relationship between entries and tags), and a `users` tables.
> **Hint: For foreign keys, use the singular name of the table + _id.** For example: `image_id` and `tag_id` for the `image_tags` (tags for each image) table.

Table: TODO

- field1: TYPE {constraints...},
- field2...
- TODO


### Database Query Plan (Milestone 1, Milestone 2, Milestone 3, Final Submission)
> Plan _all_ of your database queries. You may use natural language, pseudocode, or SQL.

```
TODO: Plan a query
```

```
TODO: Plan another query
```

TODO: ...


### Code Planning (Milestone 1, Milestone 2, Milestone 3, Final Submission)
> Plan any PHP code you'll need here using pseudocode.
> Tip: Break this up by pages. It makes it easier to plan.

```
TODO: WRITE YOUR PSEUDOCODE HERE, between the back-tick lines.
```

```
TODO: WRITE MORE PSEUDOCODE HERE, between the back-tick lines.
```

TODO: ...


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
