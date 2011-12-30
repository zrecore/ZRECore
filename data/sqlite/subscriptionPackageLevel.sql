DROP TABLE IF EXISTS subscriptionPackageLevel;

CREATE TABLE subscriptionPackageLevel(
	subscription_id_fk INTEGER NOT NULL,
	package_level_id_fk INTEGER NOT NULL,
	
	UNIQUE(subscription_id_fk, package_level_id_fk),
	FOREIGN KEY(subscription_id_fk) REFERENCES subscription(subscription_id),
	FOREIGN KEY(package_level_id_fk) REFERENCES packageLevel(package_level_id)
);

CREATE INDEX idx_subscription_package_level_subscription_id_fk ON subscriptionPackageLevel(subscription_id_fk);
CREATE INDEX idx_subscription_package_level_package_level_id_fk ON subscriptionPackageLevel(package_level_id_fk);