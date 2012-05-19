DROP TABLE IF EXISTS post;

CREATE TABLE post(
	post_id INTEGER PRIMARY KEY AUTOINCREMENT,
	post_user_id_fk INTEGER NOT NULL,
	post_title VARCHAR(255) NOT NULL,
	post_slug VARCHAR(255) NOT NULL,
	post_date_added INTEGER NOT NULL,
	post_date_modified INTEGER DEFAULT NULL,
	post_is_published INTEGER DEFAULT NULL,
	post_content TEXT NOT NULL,

	FOREIGN KEY(post_user_id_fk) REFERENCES user(user_id),
	UNIQUE (post_title),
	UNIQUE (post_slug)
);

CREATE INDEX idx_post_user_id_fk ON post(post_user_id_fk);
CREATE INDEX idx_post_slug ON post(post_slug);
CREATE INDEX idx_post_date_added ON post(post_date_added);
CREATE INDEX idx_post_date_modified ON post(post_date_modified);
CREATE INDEX idx_post_is_published ON post(post_is_published);