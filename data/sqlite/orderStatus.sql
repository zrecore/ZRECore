DROP TABLE IF EXISTS orderStatus;

CREATE TABLE orderStatus(
	order_status_id INTEGER PRIMARY KEY AUTOINCREMENT,
	status_name VARCHAR(255) NOT NULL,
	status_is_available INTEGER DEFAULT 1
);

CREATE INDEX idx_status_name ON orderStatus(status_name);
CREATE INDEX idx_status_is_available ON orderStatus(status_is_available);