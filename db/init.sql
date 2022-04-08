CREATE TABLE entries (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    name TEXT NOT NULL,
    scientific_name TEXT NOT NULL,
    plant_id TEXT NOT NULL UNIQUE
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

INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (1, "Cutleaf Weeping Birch", "Betula pendula 'Dalecarlica'", "TR_07");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (2, "High mallow", "Malva sylvestris", "FL_27");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (3, "Zebra Grass", "Miscanthus sinensis 'Zebrinus'", "GA_16");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (4, "Pincushion Moss", "Leucobryum glaucum", "FE_13");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (5, "Burdock", "Arctium minus", "FL_13");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (6, "Hazelnut/Filbert", "Corylus avellana", "SH_12");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (7, "Snowdrops", "Galanthus nivalis", "FL_11");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (8, "Blue violet", "Viola sororia", "GR_15");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (9, "Switchgrass", "Panicum virgatum", "GA_03");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (10, "Northern Bush Honeysuckle", "Diervilla lonicera", "VI_02");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (11, "Soloman's Seal", "Polygonatum biflorum", "FL_12");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (12, "Ostrich fern", "Matteuccia struthiopteris", "FE_11");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (13, "Red Pine", "Pinus resinosa", "TR_04");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (14, "Black-Eyed Susan", "Rudbekia hirta", "FL_35");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (15, "Juneberry Regent", "Amelanchier alniflora", "SH_22");
INSERT INTO entries (id, name, scientific_name, plant_id) VALUES (16, "Summer-Sweet", "Clethra alnifolia", "SH_07");

INSERT INTO tags (id, name) VALUES (1, 'Exploratory Constructive Play');
INSERT INTO tags (id, name) VALUES (2, 'Exploratory Sensory Play');
INSERT INTO tags (id, name) VALUES (3, 'Physical Play');
INSERT INTO tags (id, name) VALUES (4, 'Imaginative Play');
INSERT INTO tags (id, name) VALUES (5, 'Restorative Play');
INSERT INTO tags (id, name) VALUES (6, 'Expressive Play');
INSERT INTO tags (id, name) VALUES (7, 'Play With Rules');
INSERT INTO tags (id, name) VALUES (8, 'Bio Play');
INSERT INTO tags (id, name) VALUES (9, 'Perennial');
INSERT INTO tags (id, name) VALUES (10, 'Annual');
INSERT INTO tags (id, name) VALUES (11, 'Full Sun');
INSERT INTO tags (id, name) VALUES (12, 'Partial Shade');
INSERT INTO tags (id, name) VALUES (13, 'Full Shade');
INSERT INTO tags (id, name) VALUES (14, 'Hardiness Zone');
INSERT INTO tags (id, name) VALUES (15, 'Shrub');
INSERT INTO tags (id, name) VALUES (16, 'Grass');
INSERT INTO tags (id, name) VALUES (17, 'Vine');
INSERT INTO tags (id, name) VALUES (18, 'Tree');
INSERT INTO tags (id, name) VALUES (19, 'Flower');
INSERT INTO tags (id, name) VALUES (20, 'Groundcover');
INSERT INTO tags (id, name) VALUES (21, 'Other');


INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (1, 1, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (2, 3, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (3, 9, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (4, 13, 1);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (5, 1, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (6, 2, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (7, 3, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (8, 4, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (9, 5, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (10, 6, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (11, 7, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (12, 8, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (13, 9, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (14, 10, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (15, 11, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (16, 12, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (17, 13, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (18, 14, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (19, 15, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (20, 16, 2);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (21, 1, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (22, 2, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (23, 3, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (24, 5, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (25, 6, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (26, 8, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (27, 9, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (28, 10, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (29, 11, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (30, 13, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (31, 14, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (32, 15, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (33, 16, 3);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (34, 1, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (35, 2, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (36, 3, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (37, 4, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (38, 5, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (39, 7, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (40, 9, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (41, 10, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (42, 11, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (43, 12, 4);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (44, 1, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (45, 3, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (46, 4, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (47, 7, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (48, 9, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (49, 12, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (50, 13, 5);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (51, 3, 7);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (52, 9, 7);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (53, 1, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (54, 2, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (55, 3, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (56, 4, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (57, 5, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (58, 6, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (59, 8, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (60, 9, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (61, 10, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (62, 11, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (63, 12, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (64, 13, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (65, 14, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (66, 15, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (67, 16, 8);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (68, 2, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (69, 3, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (70, 4, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (71, 5, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (72, 6, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (73, 7, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (74, 8, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (75, 9, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (76, 10, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (77, 11, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (78, 12, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (79, 13, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (80, 14, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (81, 15, 9);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (82, 1, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (83, 2, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (84, 3, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (85, 5, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (86, 6, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (87, 7, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (88, 8, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (89, 9, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (90, 10, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (91, 13, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (92, 14, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (93, 15, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (94, 16, 11);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (95, 1, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (96, 2, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (97, 4, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (98, 5, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (99, 6, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (100, 7, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (101, 8, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (102, 9, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (103, 10, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (104, 11, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (105, 12, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (106, 13, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (107, 15, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (108, 16, 12);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (109, 4, 13);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (110, 11, 13);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (111, 12, 13);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (112, 6, 15);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (113, 15, 15);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (114, 16, 15);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (115, 3, 16);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (116, 9, 16);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (117, 10, 17);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (118, 1, 18);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (119, 13, 18);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (120, 2, 19);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (121, 5, 19);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (122, 7, 19);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (123, 11, 19);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (124, 14, 19);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (125, 8, 20);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (126, 4, 21);
INSERT INTO entry_tags (id, entry_id, tag_id) VALUES (127, 12, 21);


INSERT INTO users (id, username, password) VALUES (0, 'user1', 'password1');
INSERT INTO users (id, username, password) VALUES (1, 'user2', 'password2');
INSERT INTO users (id, username, password) VALUES (2, 'user3', 'password3');
