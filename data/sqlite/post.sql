CREATE TABLE post(post_id INTEGER PRIMARY KEY,post_title VARCHAR(255), post_slug VARCHAR(255), post_user_id VARCHAR(255), post_date_added INTEGER, post_date_modified INTEGER, post_is_published INTEGER, post_content TEXT);
CREATE INDEX idx_post_slug ON post(post_slug);
CREATE INDEX idx_post_user_id ON post(post_user_id);
CREATE INDEX idx_post_date_added ON post(post_date_added);
CREATE INDEX idx_post_date_modified ON post(post_date_modified);
CREATE INDEX idx_post_is_published ON post(post_is_published);