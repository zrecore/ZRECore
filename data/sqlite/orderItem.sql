DROP TABLE IF EXISTS orderItem;

CREATE TABLE orderItem(
	order_id_fk INTEGER NOT NULL,
	item_id_fk INTEGER NOT NULL,
	sale_price FLOAT NOT NULL,
	sale_quantity FLOAT NOT NULL,
	ship_date INTEGER NOT NULL,
	
	FOREIGN KEY(order_id_fk) REFERENCES `order`(order_id),
	FOREIGN KEY(item_id_fk) REFERENCES item(item_id)
);

CREATE INDEX idx_order_id_fk ON orderItem(order_id_fk);
CREATE INDEX idx_order_item_item_id_fk ON orderItem(item_id_fk);
CREATE INDEX idx_sale_price ON orderItem(sale_price);
CREATE INDEX idx_sale_quantity ON orderItem(sale_quantity);
CREATE INDEX idx_ship_date ON orderItem(ship_date);