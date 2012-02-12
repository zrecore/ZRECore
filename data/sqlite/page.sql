DROP TABLE IF EXISTS page;

CREATE TABLE page(
	page_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	folder_id_fk INTEGER NULL,
	page_user_id_fk INTEGER NOT NULL,
	page_title varchar(255) NOT NULL, 
	page_slug varchar(255) NOT NULL, 
	page_date_added INTEGER NOT NULL, 
	page_date_modified INTEGER DEFAULT NULL, 
	page_date_deactivated INTEGER DEFAULT NULL,
	page_is_active INTEGER DEFAULT NULL, 
	page_content TEXT NOT NULL,

	FOREIGN KEY(page_user_id_fk) REFERENCES user(user_id),
	UNIQUE (page_title),
	UNIQUE (page_slug)
);

CREATE INDEX idx_page_user_id_fk ON page (page_user_id_fk);
CREATE INDEX idx_page_slug ON page (page_slug);
CREATE INDEX idx_page_date_added ON page (page_date_added);
CREATE INDEX idx_page_date_modified ON page (page_date_modified);
CREATE INDEX idx_page_date_deactivated ON page (page_date_deactivated);
CREATE INDEX idx_page_is_active ON page (page_is_active);

INSERT INTO page VALUES(1, NULL, 1, 'Setup Complete', 'setup-complete', strftime('%s', 'now'), NULL, NULL, 1, 'This is a welcome page.');