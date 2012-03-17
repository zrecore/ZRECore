BEGIN TRANSACTION;
.read aclPermission.sql
.read aclResource.sql
.read aclRole.sql
.read category.sql
.read comment.sql
.read coupon.sql
.read currency.sql
.read folder.sql
.read item.sql
.read itemCoupon.sql
.read itemProperty.sql
.read merchantGateway.sql
.read order.sql
.read orderCoupon.sql
.read orderItem.sql
.read orderService.sql
.read orderStatusHistory.sql
.read orderSubscription.sql
.read packageLevel.sql
.read page.sql
.read post.sql
.read postComment.sql
.read property.sql
.read propertyType.sql
.read propertyValue.sql
.read service.sql
.read serviceCoupon.sql
.read servicePackageLevel.sql
.read status.sql
.read subscription.sql
.read subscriptionCoupon.sql
.read subscriptionPackageLevel.sql
.read subscriptionService.sql
.read user.sql
.read userAcl.sql
.read userProfile.sql

INSERT INTO user VALUES (1, 2, 'System', 'Administrator', 'user@example.com', 'admin', 1, strftime('%s', 'now'), NULL, NULL, '$2a$08$uwHMTEDDmgU.rZDektNlneybiYIDz2pFlx4FGjP8tC698eFRO7tAu', 1);
INSERT INTO userProfile VALUES (1, "This is the system administrator profile.", NULL, NULL);

INSERT INTO userAcl VALUES (1, 1, 1);
INSERT INTO userAcl VALUES (1, 2, 1);
INSERT INTO userAcl VALUES (1, 3, 1);
INSERT INTO userAcl VALUES (1, 4, 1);
INSERT INTO userAcl VALUES (1, 5, 1);
INSERT INTO userAcl VALUES (1, 6, 1);
INSERT INTO userAcl VALUES (1, 7, 1);
INSERT INTO userAcl VALUES (1, 8, 1);
INSERT INTO userAcl VALUES (1, 9, 1);

COMMIT;