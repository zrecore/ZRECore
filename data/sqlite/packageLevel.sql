DROP TABLE IF EXISTS packageLevel;

CREATE TABLE packageLevel(
	package_level_id INTEGER PRIMARY KEY AUTOINCREMENT,
	package_level_name VARCHAR(32),
	package_level_is_available INTEGER DEFAULT 0,
	UNIQUE(package_level_name)
);

INSERT INTO packageLevel VALUES(1, 'Standard', 1);