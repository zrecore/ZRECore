DROP TABLE IF EXISTS servicePackageLevel;

CREATE TABLE servicePackageLevel(
	service_id_fk INTEGER NOT NULL,
	package_level_id_fk INTEGER NOT NULL,
	
	UNIQUE(service_id_fk, package_level_id_fk),
	FOREIGN KEY(service_id_fk) REFERENCES service(service_id),
	FOREIGN KEY(package_level_id_fk) REFERENCES packageLevel(package_level_id)
);

CREATE INDEX idx_service_package_level_service_id_fk ON servicePackageLevel(service_id_fk);
CREATE INDEX idx_service_package_level_package_level_id_fk ON servicePackageLevel(package_level_id_fk);