DROP TABLE IF EXISTS orderStatusHistory;

CREATE TABLE orderStatusHistory(
	order_status_history_id INTEGER PRIMARY KEY AUTOINCREMENT,
	status_id_fk INTEGER NOT NULL,
	change_date INTEGER NOT NULL,

	UNIQUE(status_id_fk,change_date),
	FOREIGN KEY(status_id_fk) REFERENCES status(status_id)
);

CREATE INDEX idx_order_status_history_id ON `orderStatusHistory`(order_status_history_id);
CREATE INDEX idx_order_status_history_status_id_fk ON `orderStatusHistory`(status_id_fk);
CREATE INDEX idx_order_status_history_change_date_fk ON `orderStatusHistory`(change_date);