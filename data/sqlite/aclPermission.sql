DROP TABLE IF EXISTS aclPermission;

CREATE TABLE aclPermission(
	acl_permission_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	acl_permission_name varchar(255) NOT NULL,
	acl_permission_is_active INTEGER NOT NULL,
	acl_permission_timestamp_added INTEGER NOT NULL, 
	acl_permission_timestamp_modified INTEGER DEFAULT NULL,
	acl_permission_timestamp_deactivated INTEGER DEFAULT NULL
);

CREATE INDEX idx_acl_permission_name ON aclPermission(acl_permission_name);
CREATE INDEX idx_acl_permission_is_active ON aclPermission(acl_permission_is_active);
CREATE INDEX idx_acl_permission_timestamp_added ON aclPermission(acl_permission_timestamp_added);
CREATE INDEX idx_acl_permission_timestamp_modified ON aclPermission(acl_permission_timestamp_modified);
CREATE INDEX idx_acl_permission_timestamp_deactivated ON aclPermission(acl_permission_timestamp_deactivated);

INSERT INTO aclPermission VALUES(1, 'allow', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclPermission VALUES(2, 'deny', 1, strftime('%s', 'now'), NULL, NULL);