CREATE TABLE entries (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    name TEXT NOT NULL,
    scientific_name TEXT NOT NULL,
    plant_id TEXT NOT NULL UNIQUE,
    hardiness_zone TEXT NOT NULL,
    exploratory_constructive_play INTEGER NOT NULL,
    exploratory_sensory_play INTEGER NOT NULL,
    physical_play INTEGER NOT NULL,
    imaginative_play INTEGER NOT NULL,
    restorative_play INTEGER NOT NULL,
    expressive_play INTEGER NOT NULL,
    play_with_rules INTEGER NOT NULL,
    bio_play INTEGER NOT NULL
);

CREATE TABLE tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    name TEXT NOT NULL
);

CREATE TABLE entry_tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    entry_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL,
    FOREIGN KEY (entry_id) REFERENCES entries(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);


INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (1, "Cutleaf Weeping Birch", "Betula pendula 'Dalecarlica'", "TR_07", "2-7", 1, 1, 1, 1, 1, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (2, "High mallow", "Malva sylvestris", "FL_27", "4-8", 0, 1, 1, 1, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (3, "Zebra Grass", "Miscanthus sinensis 'Zebrinus'", "GA_16", "5-9", 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (4, "Pincushion Moss", "Leucobryum glaucum", "FE_13", "4-10", 0, 1, 0, 1, 1, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (5, "Burdock", "Arctium minus", "FL_13", "3-10", 0, 1, 1, 1, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (6, "Hazelnut/Filbert", "Corylus avellana", "SH_12", "4-8", 0, 1, 1, 0, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (7, "Snowdrops", "Galanthus nivalis", "FL_11", "3-7", 0, 1, 0, 1, 1, 0, 0, 0);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (8, "Blue violet", "Viola sororia", "GR_15", "3-7", 0, 1, 1, 0, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (9, "Switchgrass", "Panicum virgatum", "GA_03", "5-9", 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (10, "Northern Bush Honeysuckle", "Diervilla lonicera", "VI_02", "3-7", 0, 1, 1, 1, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (11, "Soloman's Seal", "Polygonatum biflorum", "FL_12", "3-9", 0, 1, 1, 1, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (12, "Ostrich fern", "Matteuccia struthiopteris", "FE_11", "3-7", 0, 1, 0, 1, 1, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (13, "Red Pine", "Pinus resinosa", "TR_04", "3-9", 1, 1, 1, 0, 1, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (14, "Black-Eyed Susan", "Rudbekia hirta", "FL_35", "3-7", 0, 1, 1, 0, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (15, "Juneberry Regent", "Amelanchier alniflora", "SH_22", "2-7", 0, 1, 1, 0, 0, 0, 0, 1);
INSERT INTO entries (id, name, scientific_name, plant_id, hardiness_zone, exploratory_constructive_play, exploratory_sensory_play, physical_play, imaginative_play, restorative_play, expressive_play, play_with_rules, bio_play) VALUES (16, "Summer-Sweet", "Clethra alnifolia", "SH_07", "3-9", 0, 1, 1, 0, 0, 0, 0, 1);


INSERT INTO tags (id, name) VALUES (1, 'Perennial');
INSERT INTO tags (id, name) VALUES (2, 'Annual');
INSERT INTO tags (id, name) VALUES (3, 'Full Sun');
INSERT INTO tags (id, name) VALUES (4, 'Partial Shade');
INSERT INTO tags (id, name) VALUES (5, 'Full Shade');
INSERT INTO tags (id, name) VALUES (6, 'Shrub');
INSERT INTO tags (id, name) VALUES (7, 'Grass');
INSERT INTO tags (id, name) VALUES (8, 'Vine');
INSERT INTO tags (id, name) VALUES (9, 'Tree');
INSERT INTO tags (id, name) VALUES (10, 'Flower');
INSERT INTO tags (id, name) VALUES (11, 'Groundcover');
INSERT INTO tags (id, name) VALUES (12, 'Other');


INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (1, 2, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (2, 3, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (3, 4, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (4, 5, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (5, 6, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (6, 7, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (7, 8, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (8, 9, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (9, 10, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (10, 11, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (11, 12, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (12, 13, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (13, 14, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (14, 15, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (15, 1, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (16, 2, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (17, 3, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (18, 5, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (19, 6, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (20, 7, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (21, 8, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (22, 9, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (23, 10, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (24, 13, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (25, 14, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (26, 15, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (27, 16, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (28, 1, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (29, 2, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (30, 4, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (31, 5, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (32, 6, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (33, 7, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (34, 8, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (35, 9, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (36, 10, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (37, 11, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (38, 12, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (39, 13, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (40, 15, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (41, 16, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (42, 4, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (43, 11, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (44, 12, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (45, 6, 6);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (46, 15, 6);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (47, 16, 6);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (48, 3, 7);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (49, 9, 7);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (50, 10, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (51, 1, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (52, 13, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (53, 2, 10);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (54, 5, 10);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (55, 7, 10);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (56, 11, 10);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (57, 14, 10);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (58, 8, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (59, 4, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (60, 12, 12);


INSERT INTO users (id, username, password) VALUES (0, 'user1', 'password1');
INSERT INTO users (id, username, password) VALUES (1, 'user2', 'password2');
INSERT INTO users (id, username, password) VALUES (2, 'user3', 'password3');
