<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $user_id;
	
	/**
	 * @OneToOne(targetEntity="AclRole") 
	 * @JoinColumn(name="acl_role_id_fk", referencedColumnName="acl_role_id")
	 */
	private $aclRole;
	/** @Column(type="string",length=255) */
	private $first_name;
	/** @Column(type="string",length=255) */
	private $last_name;
	/** @Column(type="string",length=255) */
	private $email;
	/** @Column(type="string") */
	private $handle;
	/** @Column(type="integer") */
	private $is_active;
	/** @Column(type="integer") */
	private $user_timestamp_added;
	/** @Column(type="integer",nullable=true) */
	private $user_timestamp_modified;
	/** @Column(type="integer",nullable=true) */
	private $user_timestamp_deactivated;
	/** @Column(type="string",length=60) */
	private $password_hash;
	/** @Column(type="integer") */
	private $password_is_temporary;
	/**
	 * @OneToMany(targetEntity="UserAcl",mappedBy="User")
	 * @JoinColumn(name="user_id", referencedColumnName="user_id_fk")
	 */
	private $userAcl;
	/**
	 * @OneToOne(targetEntity="UserProfile")
	 * @JoinColumn(name="user_id", referencedColumnName="user_id_fk")
	 */
	private $userProfile;
	
	public function __construct()
	{
		// Default values.
		$this->is_active = 0;
		$this->password_is_temporary = 1;
	}
	
	public function findOneByHandle($handle)
	{
		return $this->findOneBy(array('handle' => $handle));
	}
	public function getUserId()	{return $this->user_id;}
	public function getAclRole()	{ return $this->aclRole; }
	public function getFirstName()	{ return $this->first_name; }
	public function getLastName()	{ return $this->last_name; }
	public function getEmail()	{ return $this->email; }
	public function getHandle()	{ return $this->handle; }
	public function getIsActive()	{ return $this->is_active; }
	public function getUserTimestampAdded() { return $this->user_timestamp_added; }
	public function getUserTimestampModified() { return $this->user_timestamp_modified; }
	public function getUserTimestampDeactivated() { return $this->user_timestamp_deactivated; }
	public function getPasswordHash() { return $this->password_hash; }
	public function getPasswordIsTemporary() { return $this->password_is_temporary; }
	public function getUserAcl()	{ return $this->userAcl; }
	public function getUserProfile() { return $this->userProfile; }
	
	public function setAclRole($value)	{ $this->aclRole = $value; }
	public function setFirstName($value)	{ $this->first_name = $value; }
	public function setLastName($value)	{ $this->last_name = $value; }
	public function setEmail($value)	{ $this->email = $value; }
	public function setHandle($value)	{ $this->handle = $value; }
	public function setIsActive($value)	{ $this->is_active = $value; }
	public function setUserTimestampAdded($value) { $this->user_timestamp_added = $value; }
	public function setUserTimestampModified($value) { $this->user_timestamp_modified = $value; }
	public function setUserTimestampDeactivated($value) { $this->user_timestamp_deactivated = $value; }
	public function setPasswordHash($value) { $this->password_hash = $value; }
	public function setPasswordIsTemporary($value) { $this->password_is_temporary = $value; }
	public function setUserAcl($value) { $this->userAcl = $value; }
	public function setUserProfile($value) { $this->userProfile = $value; }
}