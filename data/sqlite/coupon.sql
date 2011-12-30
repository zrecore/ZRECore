DROP TABLE IF EXISTS coupon;

CREATE TABLE coupon(
	coupon_id INTEGER PRIMARY KEY AUTOINCREMENT,
	coupon_code VARCHAR(255) NOT NULL,
	coupon_start_date INTEGER NOT NULL,
	coupon_end_date INTEGER DEFAULT NULL,
	coupon_is_active INTEGER DEFAULT 0,

	UNIQUE(coupon_code)
);

CREATE INDEX idx_coupon_code ON coupon(coupon_code);
CREATE INDEX idx_coupon_start_date ON coupon(coupon_start_date);
CREATE INDEX idx_coupon_end_date ON coupon(coupon_end_date);
CREATE INDEX idx_coupon_is_active ON coupon(coupon_is_active);