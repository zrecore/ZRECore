DROP TABLE IF EXISTS orderItem;

CREATE TABLE orderItem(
	order_id_fk INTEGER NOT NULL,
	item_id_fk INTEGER NOT NULL,
	order_item_price FLOAT NOT NULL,
	order_item_quantity FLOAT NOT NULL,
	order_item_ship_date INTEGER NOT NULL,
	
	FOREIGN KEY(order_id_fk) REFERENCES `order`(order_id),
	FOREIGN KEY(item_id_fk) REFERENCES item(item_id)
);

CREATE INDEX idx_order_id_fk ON orderItem(order_id_fk);
CREATE INDEX idx_order_item_item_id_fk ON orderItem(item_id_fk);
CREATE INDEX idx_order_item_price ON orderItem(order_item_price);
CREATE INDEX idx_order_item_quantity ON orderItem(order_item_quantity);
CREATE INDEX idx_order_item_ship_date ON orderItem(order_item_ship_date);