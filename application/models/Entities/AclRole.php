<?php
namespace Entities;

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
		
	}
}