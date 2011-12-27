DROP TABLE IF EXISTS postComment;

CREATE TABLE postComment(
	post_id_fk INTEGER NOT NULL, 
	comment_id_fk INTEGER NOT NULL,
	UNIQUE(post_id_fk, comment_id_fk),

	FOREIGN KEY(post_id_fk) REFERENCES post(post_id),
	FOREIGN KEY(comment_id_fk) REFERENCES comment(comment_id)
);

CREATE INDEX idx_post_id_fk ON postComment(post_id_fk);
CREATE INDEX idx_comment_id_fk ON postComment(comment_id_fk);