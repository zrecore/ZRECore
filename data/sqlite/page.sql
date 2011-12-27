DROP TABLE IF EXISTS page;

CREATE TABLE page(
	page_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	page_user_id_fk INTEGER NOT NULL,
	page_title varchar(255) NOT NULL, 
	page_slug varchar(255) NOT NULL, 
	page_user_id INTEGER NOT NULL, 
	page_date_added INTEGER NOT NULL, 
	page_date_modified INTEGER DEFAULT NULL, 
	page_is_published INTEGER DEFAULT NULL, 
	page_content TEXT NOT NULL,

	FOREIGN KEY(page_user_id_fk) REFERENCES user(user_id),
	UNIQUE (page_title),
	UNIQUE (page_slug)
);

CREATE INDEX idx_page_user_id_fk ON page (page_user_id_fk);
CREATE INDEX idx_page_slug ON page (page_slug);
CREATE INDEX idx_page_user_id ON page (page_user_id);
CREATE INDEX idx_page_date_added ON page (page_date_added);
CREATE INDEX idx_page_date_modified ON page (page_date_modified);
CREATE INDEX idx_page_is_published ON page (page_is_published);