DROP TABLE IF EXISTS aclRole;

CREATE TABLE aclRole(
	acl_role_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	acl_role_name varchar(255) NOT NULL,
	acl_role_is_active INTEGER NOT NULL,
	acl_role_timestamp_added INTEGER NOT NULL, 
	acl_role_timestamp_modified INTEGER DEFAULT NULL, 
	acl_role_timestamp_deactivated INTEGER DEFAULT NULL,
	acl_inherit_role_id INTEGER DEFAULT 0
);

CREATE INDEX idx_acl_role_name ON aclRole(acl_role_name);
CREATE INDEX idx_acl_role_is_active ON aclRole(acl_role_is_active);
CREATE INDEX idx_acl_role_timestamp_added ON aclRole(acl_role_timestamp_added);
CREATE INDEX idx_acl_role_timestamp_modified ON aclRole(acl_role_timestamp_modified);
CREATE INDEX idx_acl_role_timestamp_deactivated ON aclRole(acl_role_timestamp_deactivated);
CREATE INDEX idx_acl_inherit_role_id ON aclRole(acl_inherit_role_id);

INSERT INTO aclRole VALUES(1, 'guest', 1, strftime('%s', 'now'), NULL, NULL, 0);
INSERT INTO aclRole VALUES(2, 'administrator', 1, strftime('%s', 'now'), NULL, NULL, 0);
INSERT INTO aclRole VALUES(3, 'editor', 1, strftime('%s', 'now'), NULL, NULL, 0);
INSERT INTO aclRole VALUES(4, 'author', 1, strftime('%s', 'now'), NULL, NULL, 0);
INSERT INTO aclRole VALUES(5, 'contributor', 1, strftime('%s', 'now'), NULL, NULL, 0);