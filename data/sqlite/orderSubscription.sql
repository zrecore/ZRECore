DROP TABLE IF EXISTS orderSubscription;

CREATE TABLE orderSubscription(
	order_id_fk INTEGER NOT NULL,
	subscription_id_fk INTEGER NOT NULL,
	order_subscription_price FLOAT NOT NULL,
	order_subscription_date_start INTEGER NOT NULL,
	order_subscription_date_end INTEGER DEFAULT NULL,
	
	UNIQUE(order_id_fk, subscription_id_fk),
	FOREIGN KEY(order_id_fk) REFERENCES `order`(order_id),
	FOREIGN KEY(subscription_id_fk) REFERENCES subscription(subscription_id)
);

CREATE INDEX idx_order_subscription_order_id_fk ON orderSubscription(order_id_fk);
CREATE INDEX idx_order_subscription_subscription_id_fk ON orderSubscription(subscription_id_fk);
CREATE INDEX idx_order_subscription_price ON orderSubscription(order_subscription_price);
CREATE INDEX idx_order_subscription_date_start ON orderSubscription(order_subscription_date_start);
CREATE INDEX idx_order_subscription_date_end ON orderSubscription(order_subscription_date_end);