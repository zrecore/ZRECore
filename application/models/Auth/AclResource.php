<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="aclResource")
 */
class aclResource
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $acl_resource_id;
	
	/** @Column(type="string",length=255) */
	private $acl_resource_name;
	/** @Column(type="integer") */
	private $acl_resource_is_active;
	/** @Column(type="integer") */
	private $acl_resource_timestamp_added;
	/** @Column(type="integer",nullable=true) */
	private $acl_resource_timestamp_modified;
	/** @Column(type="integer",nullable=true) */
	private $acl_resource_timestamp_deactivated;
	
	public function __construct()
	{
		$this->acl_resource_is_active = 0;
		$this->acl_resource_timestamp_added = time();
	}
	
	public function getAclResourceId() { return $this->acl_resource_id; }
	public function getAclResourceName() { return $this->acl_resource_name; }
	public function getAclResourceIsActive() { return $this->acl_resource_is_active; }
	public function getAclResourceTimestampAdded() { return $this->acl_resource_timestamp_added; }
	public function getAclResourceTimestampModified() { return $this->acl_resource_timestamp_modified; }
	public function getAclResourceTimestampDeactivated() { return $this->acl_resource_timestamp_deactivated; }
	
	public function setAclResourceName($value) { $this->acl_resource_name = $value; }
	public function setAclResourceIsActive($value) { $this->acl_resource_is_active = $value; }
	public function setAclResourceTimestampAdded($value) { $this->acl_resource_timestamp_added = $value; }
	public function setAclResourceTimestampModified($value) { $this->acl_resource_timestamp_modified = $value; }
	public function setAclResourceTimestampDeactivated($value) { $this->acl_resource_timestamp_deactivated = $value; }
}