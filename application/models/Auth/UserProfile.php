<?php
namespace Auth;

/**
 * @Entity
 * @Table(name="userProfile")
 */
class UserProfile
{
	/** @Id @Column(type="integer") */
	private $user_id_fk;
	/** @Column(type="string",length=255) */
	private $user_about_me;
	/** @Column(type="string",length=255) */
	private $user_facebook_handle;
	/** @Column(type="string",length=255) */
	private $user_twitter_handle;
	
	public function getUserIdFk() { return $this->user_id_fk; }
	public function getUserAboutMe() { return $this->user_about_me; }
	public function getUserFacebookHandle() { return $this->user_facebook_handle; }
	public function getUserTwitterHandle() { return $this->user_twitter_handle; }
	
	public function setUserIdFk($value) { $this->user_id_fk = $value; }
	public function setUserAboutMe($value) { $this->user_about_me = $value; }
	public function setUserFacebookHandle($value) { $this->user_facebook_handle = $value; }
	public function setUserTwitterHandle($value) { $this->user_twitter_handle = $value; }
}