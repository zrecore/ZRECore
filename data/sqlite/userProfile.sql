DROP TABLE IF EXISTS userProfile;

CREATE TABLE userProfile(
	user_profile_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	user_id_fk INTEGER NOT NULL,
	user_about_me varchar(255) DEFAULT NULL,
	user_facebook_handle varchar(255) DEFAULT NULL,
	user_twitter_handle varchar(255) DEFAULT NULL,
	UNIQUE(user_id_fk),

	FOREIGN KEY(user_id_fk) REFERENCES user(user_id)
);

CREATE INDEX idx_user_id_fk ON userProfile(user_id_fk);