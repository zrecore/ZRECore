DROP TABLE IF EXISTS orderService;

CREATE TABLE orderService(
	order_id_fk INTEGER NOT NULL,
	service_id_fk INTEGER NOT NULL,
	order_service_price FLOAT NOT NULL,
	order_service_units FLOAT NOT NULL,
	order_service_date_start INTEGER NOT NULL,
	order_service_date_end INTEGER NOT NULL,
	
	UNIQUE(order_id_fk, service_id_fk),
	FOREIGN KEY(order_id_fk) REFERENCES `order`(order_id),
	FOREIGN KEY(service_id_fk) REFERENCES service(service_id)
);

CREATE INDEX idx_order_service_order_id_fk ON orderService(order_id_fk);
CREATE INDEX idx_order_service_service_id_fk ON orderService(service_id_fk);
CREATE INDEX idx_order_service_price ON orderService(order_service_price);
CREATE INDEX idx_order_service_units ON orderService(order_service_units);
CREATE INDEX idx_order_service_date_start ON orderService(order_service_date_start);
CREATE INDEX idx_order_service_date_end ON orderService(order_service_date_end);