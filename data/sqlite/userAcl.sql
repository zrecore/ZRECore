DROP TABLE IF EXISTS userAcl;

CREATE TABLE userAcl(
	user_id_fk INTEGER NOT NULL,
	resource_id_fk INTEGER NOT NULL,
	permission_id_fk INTEGER NOT NULL,
	UNIQUE (user_id_fk, resource_id_fk),

	FOREIGN KEY(user_id_fk) REFERENCES user(user_id),
	FOREIGN KEY(resource_id_fk) REFERENCES aclResource(acl_resource_id),
	FOREIGN KEY(permission_id_fk) REFERENCES aclPermission(acl_permission_id)
);

CREATE INDEX idx_user_acl_user_id_fk ON userAcl(user_id_fk);
CREATE INDEX idx_user_acl_resource_id_fk ON userAcl(resource_id_fk);
CREATE INDEX idx_user_acl_permission_id_fk ON userAcl(permission_id_fk);