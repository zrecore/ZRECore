<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="userAcl")
 */
class UserAcl
{
	/** @Id @Column(type="integer")*/
	private $user_id_fk;
	/**
	 * @OneToOne(targetEntity="AclResource")
	 * @JoinColumn(name="resource_id_fk", referencedColumnName="acl_resource_id")
	 */
	private $resource;
	/**
	 * @OneToOne(targetEntity="AclPermission")
	 * @JoinColumn(name="permission_id_fk", referencedColumnName="acl_permission_id")
	 */
	private $permission;
	
	public function getUserIdFk()
	{
		return $this->user_id_fk;
	}
	public function setUserIdFk($value)
	{
		$this->user_id_fk = $value;
	}
	public function getResource()
	{
		return $this->resource;
	}
	public function setResource($value)
	{
		$this->resource = $value;
	}
	public function getPermission()
	{
		return $this->permission;
	}
	public function setPermission($value)
	{
		$this->permission = $value;
	}
}