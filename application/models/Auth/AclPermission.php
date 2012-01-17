<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="aclPermission")
 */
class AclPermission
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $acl_permission_id;
	/** @Column(type="string",length=255) */
	private $acl_permission_name;
	/** @Column(type="integer") */
	private $acl_permission_is_active;
	/** @Column(type="integer") */
	private $acl_permission_timestamp_added;
	/** @Column(type="integer",nullable=true) */
	private $acl_permission_timestamp_modified;
	/** @Column(type="integer",nullable=true) */
	private $acl_permission_timestamp_deactivated;
	
	public function getAclPermissionId() { return $this->acl_permission_id; }

	public function setAclPermissionId($value) { $this->acl_permission_id = $value; }

	public function getAclPermissionName() { return $this->acl_permission_name; }

	public function setAclPermissionName($value) { $this->acl_permission_name = $value; }

	public function getAclPermissionIsActive() { return $this->acl_permission_is_active; }

	public function setAclPermissionIsActive($value) { $this->acl_permission_is_active = $value; }

	public function getAclPermissionTimestampAdded() { return $this->acl_permission_timestamp_added; }

	public function setAclPermissionTimestampAdded($value) { $this->acl_permission_timestamp_added = $value; }

	public function getAclPermissionTimestampModified() { return $this->acl_permission_timestamp_modified; }

	public function setAclPermissionTimestampModified($value) { $this->acl_permission_timestamp_modified = $value; }

	public function getAclPermissionTimestampDeactivated() { return $this->acl_permission_timestamp_deactivated; }

	public function setAclPermissionTimestampDeactivated($value) { $this->acl_permission_timestamp_deactivated = $value; }


}