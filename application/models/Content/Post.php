<?php
namespace Content;

/**
 * @Entity
 * @Table(name="post")
 */
class Post
{
	/** @Column(type="integer") @GeneratedValue */
	private $post_id;
	/**
         * @OneToOne(targetEntity="Auth\User") 
         * @JoinColumn(name="post_user_id_fk", referencedColumnName="user_id")
         */
	private $postUser;
	/** @Column(type="string",length=255) */
	private $post_title;
	/** @Column(type="string",length=255) */
	private $post_slug;
	/** @Column(type="integer") */
	private $post_date_added;
	/** @Column(type="integer") */
	private $post_date_modified;
	/** @Column(type="integer") */
	private $post_is_published;
	/** @Column(type="string") */
	private $post_content;
	
	/**
         * @OneToMany(targetEntity="Content\PostComment") 
         * @JoinColumn(name="post_id", referencedColumnName="post_id")
         */
	private $postComment = null;
	
	public function getPostId() { return $this->post_id; }
	public function getPostUser() { return $this->postUser; }
	public function getPostTitle() { return $this->post_title; }
	public function getPostSlug() { return $this->post_slug; }
	public function getPostDateAdded() { return $this->post_date_added; }
	public function getPostDateModified() { return $this->post_date_modified; }
	public function getPostIsPublished() { return $this->post_is_published; }
	public function getPostContent() { return $this->post_content; }
	public function getPostComment() { return $this->postComment; }
	
	public function setPostId( $value ) { $this->post_id = $value; }
	public function setPostUser( $value ) { $this->postUser = $value; }
	public function setPostTitle( $value ) { $this->post_title = $value; }
	public function setPostSlug( $value ) { $this->post_slug = $value; }
	public function setPostDateAdded( $value ) { $this->post_date_added = $value; }
	public function setPostDateModified( $value ) { $this->post_date_modified = $value; }
	public function setPostIsPublished( $value ) { $this->post_is_published = $value; }
	public function setPostContent( $value ) { $this->post_content = $value; }
	public function setPostComment( $value ) { $this->postComment = $value; }
	
}