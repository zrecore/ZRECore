DROP TABLE IF EXISTS userAclResource;

CREATE TABLE userAclResource(
	acl_user_id_fk INTEGER NOT NULL,
	acl_resource_id_fk INTEGER NOT NULL,
	acl_permission_id_fk INTEGER NOT NULL,
	UNIQUE (acl_user_id_fk, acl_resource_id_fk),

	FOREIGN KEY(acl_user_id_fk) REFERENCES user(user_id)
);

CREATE INDEX idx_acl_user_id_fk ON userAclResource(acl_user_id_fk);
CREATE INDEX idx_acl_resource_id_fk ON userAclResource(acl_resource_id_fk);
CREATE INDEX idx_acl_permission_id_fk ON userAclResource(acl_permission_id_fk);