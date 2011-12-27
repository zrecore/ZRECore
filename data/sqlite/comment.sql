DROP TABLE IF EXISTS comment;

CREATE TABLE comment(
	comment_id INTEGER PRIMARY KEY AUTOINCREMENT,
	comment_user_id_fk INTEGER NOT NULL,
	comment_is_active INTEGER DEFAULT 0,
	comment_is_spam INTEGER DEFAULT 0,
	comment_text TEXT NOT NULL,
	comment_timestamp_added INTEGER NOT NULL, 
	comment_timestamp_modified INTEGER DEFAULT NULL, 
	comment_timestamp_deactivated INTEGER DEFAULT NULL,

	FOREIGN KEY(comment_user_id_fk) REFERENCES user(user_id)
);

CREATE INDEX idx_comment_user_id_fk ON comment(comment_user_id_fk);
CREATE INDEX idx_comment_is_active ON comment(comment_is_active);
CREATE INDEX idx_comment_is_spam ON comment(comment_is_spam);
CREATE INDEX idx_comment_timestamp_added ON comment(comment_timestamp_added);
CREATE INDEX idx_comment_timestamp_modified ON comment(comment_timestamp_modified);
CREATE INDEX idx_comment_timestamp_deactivated ON comment(comment_timestamp_deactivated);