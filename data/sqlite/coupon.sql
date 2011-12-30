DROP TABLE IF EXISTS coupon;

CREATE TABLE coupon(
	coupon_id INTEGER PRIMARY KEY AUTOINCREMENT,
	coupon_code VARCHAR(255) NOT NULL,
	coupon_start_date INTEGER NOT NULL,
	coupon_end_date INTEGER DEFAULT NULL,
	coupon_is_active INTEGER DEFAULT 0,
	coupon_item_price FLOAT NOT NULL,
	coupon_service_price_per_unit FLOAT DEFAULT NULL,
	coupon_subscription_signup_fee FLOAT DEFAULT NULL,
	coupon_subscription_price_per_unit FLOAT DEFAULT NULL,
	UNIQUE(coupon_code)
);

CREATE INDEX idx_coupon_code ON coupon(coupon_code);
CREATE INDEX idx_coupon_start_date ON coupon(coupon_start_date);
CREATE INDEX idx_coupon_end_date ON coupon(coupon_end_date);
CREATE INDEX idx_coupon_is_active ON coupon(coupon_is_active);
CREATE INDEX idx_coupon_item_price ON coupon(coupon_item_price);
CREATE INDEX idx_coupon_service_price_per_unit ON coupon(coupon_service_price_per_unit);
CREATE INDEX idx_coupon_subscription_signup_fee ON coupon(coupon_subscription_signup_fee);
CREATE INDEX idx_coupon_subscription_price_per_unit ON coupon(coupon_subscription_price_per_unit);