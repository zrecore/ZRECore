CREATE TABLE token(token_id INTEGER PRIMARY KEY, token_is_static INTEGER, token_content_file TEXT);
CREATE INDEX idx_token_is_static ON token(token_is_static);