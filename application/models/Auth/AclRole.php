<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="aclRole")
 */
class AclRole
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $acl_role_id;
	/** @Column(type="string",length=255) */
	private $acl_role_name;
	/** @Column(type="integer") */
	private $acl_role_is_active;
	/** @Column(type="integer") */
	private $acl_role_timestamp_added;
	/** @Column(type="integer",nullable=true) */
	private $acl_role_timestamp_modified;
	/** @Column(type="integer",nullable=true) */
	private $acl_role_timestamp_deactivated;
	/**
	 * @Column(type="integer",nullable=true)
	 * @OneToOne(targetEntity="AclRole")
	 * @JoinColumn(name="acl_inherit_role_id", referencedColumnName="acl_role_id")
	 */
	private $acl_inherit_role_id;
	
	public function __construct()
	{
		$this->acl_role_timestamp_added = time();
	}
	
	public function getAclRoleId()	{ return $this->acl_role_id; }
	public function getAclRoleName() { return $this->acl_role_name; }
	public function getAclRoleIsActive() { return $this->acl_role_is_active; }
	public function getAclRoleTimestampAdded() { return $this->acl_role_timestamp_added; }
	public function getAclRoleTimestampModified() { return $this->acl_role_timestamp_modified; }
	public function getAclRoleTimestampDeactivated() { return $this->acl_role_timestamp_deactivated; }
	public function getAclInheritRoleId() { return $this->acl_inherit_role_id; }
	
	public function setAclRoleName($value) { $this->acl_role_name = $value; }
	public function setAclRoleIsActive($value) { $this->acl_role_is_active = $value; }
	public function setAclRoleTimestampAdded($value) { $this->acl_role_timestamp_added = $value; }
	
	public function setAclInheritRoleId($value) { $this->acl_inherit_role_id = $value; }
}