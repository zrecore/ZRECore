DROP TABLE IF EXISTS subscriptionService;

CREATE TABLE subscriptionService(
	subscription_id_fk INTEGER NOT NULL,
	service_id_fk INTEGER NOT NULL,

	UNIQUE(subscription_id_fk, service_id_fk),
	FOREIGN KEY(subscription_id_fk) REFERENCES subscription(subscription_id),
	FOREIGN KEY(service_id_fk) REFERENCES service(service_id)
);

CREATE INDEX idx_subscription_service_subscription_id_fk ON subscriptionService(subscription_id_fk);
CREATE INDEX idx_subscription_service_service_id_fk ON subscriptionService(service_id_fk);