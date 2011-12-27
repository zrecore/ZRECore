DROP TABLE IF EXISTS aclResource;

CREATE TABLE aclResource(
	acl_resource_id INTEGER PRIMARY KEY AUTOINCREMENT, 
	acl_resource_name varchar(255) NOT NULL,
	acl_resource_is_active INTEGER NOT NULL,
	acl_resource_timestamp_added INTEGER NOT NULL, 
	acl_resource_timestamp_modified INTEGER DEFAULT NULL, 
	acl_resource_timestamp_deactivated INTEGER DEFAULT NULL
);

CREATE INDEX idx_acl_resource_name ON aclResource(acl_resource_name);
CREATE INDEX idx_acl_resource_is_active ON aclResource(acl_resource_is_active);
CREATE INDEX idx_acl_resource_timestamp_added ON aclResource(acl_resource_timestamp_added);
CREATE INDEX idx_acl_resource_timestamp_modified ON aclResource(acl_resource_timestamp_modified);
CREATE INDEX idx_acl_resource_timestamp_deactivated ON aclResource(acl_resource_timestamp_deactivated);