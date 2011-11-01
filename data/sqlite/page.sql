CREATE TABLE page(page_id INTEGER PRIMARY KEY, page_title varchar(255), page_slug varchar(255), page_user_id INTEGER, page_date_added INTEGER, page_date_modified INTEGER, page_is_published INTEGER, page_content TEXT);
CREATE INDEX idx_page_slug ON page (page_slug);
CREATE INDEX idx_page_user_id ON page (page_user_id);
CREATE INDEX idx_page_date_added ON page (page_date_added);
CREATE INDEX idx_page_date_modified ON page (page_date_modified);
CREATE INDEX idx_page_is_published ON page (page_is_published);