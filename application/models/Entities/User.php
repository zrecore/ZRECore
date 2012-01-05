<?php
namespace Entities;

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
	
	
	public function __construct()
	{
		$this->is_active = 0;
		$this->password_is_temporary = 1;
	}
}