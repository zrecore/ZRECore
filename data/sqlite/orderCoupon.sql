DROP TABLE IF EXISTS orderCoupon;

CREATE TABLE orderCoupon(
	order_id_fk INTEGER NOT NULL,
	coupon_id_fk INTEGER NOT NULL,

	UNIQUE(order_id_fk, coupon_id_fk),
	FOREIGN KEY(order_id_fk) REFERENCES `order`(order_id),
	FOREIGN KEY(coupon_id_fk) REFERENCES coupon(coupon_id)
);

CREATE INDEX idx_order_coupon_order_id ON orderCoupon(order_id_fk);
CREATE INDEX idx_order_coupon_coupon_id ON orderCoupon(coupon_id_fk);