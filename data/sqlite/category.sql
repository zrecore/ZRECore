DROP TABLE IF EXISTS category;

CREATE TABLE category(
	category_id INTEGER PRIMARY KEY AUTOINCREMENT,
	category_name VARCHAR(255),
	category_slug VARCHAR(255),
	category_parent_id INTEGER DEFAULT NULL,
	UNIQUE(category_name),
	UNIQUE(category_slug)
);

CREATE INDEX idx_category_name ON category(category_name);
CREATE INDEX idx_category_slug ON category(category_slug);
CREATE INDEX idx_category_parent_id ON category(category_parent_id);

INSERT INTO category VALUES(1,'Miscellaneous', 'miscellaneous', NULL);