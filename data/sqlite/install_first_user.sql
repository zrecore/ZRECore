BEGIN TRANSACTION;
.read aclPermission.sql
.read aclResource.sql
.read aclRole.sql
.read comment.sql
.read page.sql
.read postComment.sql
.read user.sql
.read userAclResource.sql
.read userProfile.sql

INSERT INTO user VALUES (1, 2, 'System', 'Administrator', 'user@example.com', 'admin', 1, strftime('%s', 'now'), NULL, NULL, '$2a$08$uwHMTEDDmgU.rZDektNlneybiYIDz2pFlx4FGjP8tC698eFRO7tAu', 1);
INSERT INTO userProfile VALUES (1, 1, NULL, NULL, NULL);

INSERT INTO userAclResource VALUES (1, 1, 1);
INSERT INTO userAclResource VALUES (1, 2, 1);
INSERT INTO userAclResource VALUES (1, 3, 1);
INSERT INTO userAclResource VALUES (1, 4, 1);
INSERT INTO userAclResource VALUES (1, 5, 1);
INSERT INTO userAclResource VALUES (1, 6, 1);
INSERT INTO userAclResource VALUES (1, 7, 1);
INSERT INTO userAclResource VALUES (1, 8, 1);
INSERT INTO userAclResource VALUES (1, 9, 1);

COMMIT;