DROP TABLE IF EXISTS ingredient;
DROP TABLE IF EXISTS instruction;
DROP TABLE IF EXISTS recipe;
DROP TABLE IF EXISTS menu;
DROP TABLE IF EXISTS menu_recipe;
DROP TABLE IF EXISTS material;
DROP TABLE IF EXISTS procedure;

CREATE TABLE ingredient
(
	ingredientId		INTEGER PRIMARY KEY  AUTO_INCREMENT,
	-- name: name of the ingredient
	name			VARCHAR(40),
);

CREATE TABLE instruction
(
	instructionId		INTEGER PRIMARY KEY  AUTO_INCREMENT,
	-- intro: introduction of the instruction
	intro			VARCHAR(40),	
	-- figure: figure of this instruction
	figure			BLOB,
);

CREATE TABLE recipe
(
	recipeId		INTEGER PRIMARY KEY  AUTO_INCREMENT,
	-- intro: introduction of the recipe
	intro			VARCHAR(40),	
	-- figure: figure of this recipe
	figure			BLOB,
	-- comments: comments from other people
	comments		VARCHAR(400),
	--datetime: created date and time
	datetime		VARCHAR(40),
);

CREATE TABLE menu
(
	menuId			INTEGER PRIMARY KEY  AUTO_INCREMENT,
	-- name of the menu
	name			VARCHAR(40),
	-- introduction of the menu
	intro			VARCHAR(40),
	--datetime: created date and time
	datetime		VARCHAR(40),
);

-- store the relation of menu and recipe
CREATE TABLE menu_recipe
(
	menuId			INTEGER REFERENCES menu,
	recipeId		INTEGER REFERENCES recipe,
	PRIMARY KEY(menuId, recipeId)
);

--store ingredients in a recipe
CREATE TABLE material
(
	recipeId		INTEGER REFERENCES recipe,
	ingredientId		INTEGER REFERENCES ingredient,
	PRIMARY KEY(recipeId, ingredientId)
);

--store instructions of a recipe
CREATE TABLE procedure
(
	recipeId		INTEGER REFERENCES recipe,
	instructionId		INTEGER REFERENCES instruction,
	PRIMARY KEY(recipeId, instructionId)
);

