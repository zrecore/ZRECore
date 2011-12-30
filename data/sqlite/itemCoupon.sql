DROP TABLE IF EXISTS itemCoupon;

CREATE TABLE itemCoupon(
	item_id_fk INTEGER NOT NULL,
	coupon_id_fk INTEGER NOT NULL,

	UNIQUE(item_id_fk, coupon_id_fk),
	FOREIGN KEY(item_id_fk) REFERENCES item(item_id),
	FOREIGN KEY(coupon_id_fk) REFERENCES coupon(coupon_id)
);

CREATE INDEX idx_item_coupon_item_id ON itemCoupon(item_id_fk);
CREATE INDEX idx_item_coupon_coupon_id ON itemCoupon(coupon_id_fk);