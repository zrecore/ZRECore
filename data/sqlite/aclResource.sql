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

INSERT INTO aclResource VALUES(1, 'Admin_IndexController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(2, 'Admin_AppearanceController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(3, 'Admin_DeveloperToolsController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(4, 'Admin_PagesController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(5, 'Admin_PluginsController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(6, 'Admin_PostsController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(7, 'Admin_SettingsController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(8, 'Admin_SignController', 1, strftime('%s', 'now'), NULL, NULL);
INSERT INTO aclResource VALUES(9, 'Admin_UsersController', 1, strftime('%s', 'now'), NULL, NULL);