DROP TABLE IF EXISTS user;

CREATE TABLE user(
	user_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	acl_role_id_fk INTEGER,
	first_name varchar(255), 
	last_name varchar(255), 
	email varchar(255), 
	handle varchar(255), 
	is_active INTEGER, 
	user_timestamp_added INTEGER NOT NULL, 
	user_timestamp_modified INTEGER DEFAULT NULL, 
	user_timestamp_deactivated INTEGER DEFAULT NULL,

	password_hash varchar(60),
	password_is_temporary INTEGER DEFAULT 1,

	UNIQUE(email),
	UNIQUE(handle),

	FOREIGN KEY(acl_role_id_fk) REFERENCES aclRole(role_id)
);

CREATE INDEX idx_acl_role_id_fk ON user(acl_role_id_fk);
CREATE INDEX idx_first_name ON user(first_name);
CREATE INDEX idx_last_name ON user(last_name);
CREATE INDEX idx_email ON user(email);
CREATE INDEX idx_handle ON user(handle);
CREATE INDEX idx_is_active ON user(is_active);
CREATE INDEX idx_user_timestamp_added ON user(user_timestamp_added);
CREATE INDEX idx_user_timestamp_modified ON user(user_timestamp_modified);
CREATE INDEX idx_user_timestamp_deactivated ON user(user_timestamp_deactivated);
CREATE INDEX idx_password_is_temporary ON user(user_timestamp_deactivated);