DROP TABLE IF EXISTS serviceCoupon;

CREATE TABLE serviceCoupon(
	service_id_fk INTEGER NOT NULL,
	coupon_id_fk INTEGER NOT NULL,

	UNIQUE(service_id_fk, coupon_id_fk),
	FOREIGN KEY(service_id_fk) REFERENCES service(service_id),
	FOREIGN KEY(coupon_id_fk) REFERENCES coupon(coupon_id)
);

CREATE INDEX idx_service_coupon_service_id ON serviceCoupon(service_id_fk);
CREATE INDEX idx_service_coupon_coupon_id ON serviceCoupon(coupon_id_fk);