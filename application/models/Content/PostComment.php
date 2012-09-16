<?php
namespace Content;

/**
 * @Entity
 * @Table(name="postComment")
 */
class PostComment
{
	/**
         * @OneToOne(targetEntity="Content\Post",mappedBy="Post") 
         * @JoinColumn(name="post_id_fk", referencedColumnName="post_id")
         */
	private $post;
	/**
         * @OneToOne(targetEntity="Content\Comment",mappedBy="Comment") 
         * @JoinColumn(name="comment_id_fk", referencedColumnName="comment_id")
         */
	private $comment;
	
	public function getPost() { return $this->post; }
	public function getComment() { return $this->comment; }
	
	public function setPost( $value ) { $this->post = $value; }
	public function setComment( $value ) { $this->comment = $value; }
}