DROP TABLE IF EXISTS folder;

CREATE TABLE folder(
	folder_id INTEGER PRIMARY KEY AUTOINCREMENT,
	folder_name VARCHAR(255),
	folder_slug VARCHAR(255),
	folder_parent_id INTEGER DEFAULT NULL,
	UNIQUE(folder_name),
	UNIQUE(folder_slug)
);

CREATE INDEX idx_folder_name ON folder(folder_name);
CREATE INDEX idx_folder_slug ON folder(folder_slug);
CREATE INDEX idx_folder_parent_id ON folder(folder_parent_id);