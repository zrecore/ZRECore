DROP TABLE IF EXISTS subscriptionCoupon;

CREATE TABLE subscriptionCoupon(
	subscription_id_fk INTEGER NOT NULL,
	coupon_id_fk INTEGER NOT NULL,

	UNIQUE(subscription_id_fk, coupon_id_fk),
	FOREIGN KEY(subscription_id_fk) REFERENCES subscription(subscription_id),
	FOREIGN KEY(coupon_id_fk) REFERENCES coupon(coupon_id)
);

CREATE INDEX idx_subscription_coupon_subscription_id ON subscriptionCoupon(subscription_id_fk);
CREATE INDEX idx_subscription_coupon_coupon_id ON subscriptionCoupon(coupon_id_fk);