<?php
namespace Content;

/**
 * @Entity
 * @Table(name="comment")
 */
class Comment
{
        /** @Id @Column(type="integer") @GeneratedValue */
        private $comment_id;
        /**
	 * @OneToOne(targetEntity="Auth\User") 
	 * @JoinColumn(name="order_creation_user_id_fk", referencedColumnName="user_id")
	 */
        private $commentUser;
        /** @Id @Column(type="integer") */
        private $comment_is_active;
        /** @Id @Column(type="integer") */
        private $comment_is_spam;
        /** @Id @Column(type="string",length=160) */
        private $comment_text;
        
        /** @Id @Column(type="integer") */
        private $comment_timestamp_added;
        /** @Id @Column(type="integer") */
        private $comment_timestamp_modified;
        /** @Id @Column(type="integer") */
        private $comment_timestamp_deactivated;
        
        public function getCommentId() { return $this->comment_id; }
        public function getCommentUser() { return $this->commentUser; }
        public function getCommentIsActive() { return $this->comment_is_active; }
        public function getCommentIsSpam() { return $this->comment_is_spam; }
        public function getCommentText() { return $this->comment_text; }
        public function getCommentTimestampAdded() { return $this->comment_timestamp_added; }
        public function getCommentTimestampModified() { return $this->comment_timestamp_modified; }
        public function getCommentTimestampDeactivated() { return $this->comment_timestamp_deactivated; }
        
}