<?php

namespace Content;

/**
 * @Entity
 * @Table(name="page")
 */
class Page 
{
        /** @Column(type="integer") @GeneratedValue */
        private $page_id;
        /**
         * @OneToOne(targetEntity="Content\Folder") 
         * @JoinColumn(name="folder_id_fk", referencedColumnName="folder_id")
         */
        private $folder;
        /**
         * @OneToOne(targetEntity="Auth\User") 
         * @JoinColumn(name="user_id_fk", referencedColumnName="user_id")
         */
        private $pageUser;
        /** @Column(type="string",length=255) */
        private $page_title;
        /** @Column(type="string",length=255) */
        private $page_slug;
        /** @Column(type="integer") */
        private $page_date_added;
        /** @Column(type="integer") */
        private $page_date_modified;
        /** @Column(type="integer") */
        private $page_date_deactivated;
        /** @Column(type="integer") */
        private $page_is_active;
        /** @Column(type="string") */
        private $page_content;
        
        public function getPageId() { return $this->page_id; }
        public function getFolder() { return $this->folder; }
        public function getPageUser() { return $this->pageUser; }
        public function getPageTitle() { return $this->page_title; }
        public function getPageSlug() { return $this->page_slug; }
        public function getPageDateAdded() { return $this->page_date_added; }
        public function getPageDateModified() { return $this->page_date_modified; }
        public function getPageDateDeactivated() { return $this->page_date_deactivated; }
        public function getPageIsActive() { return $this->page_is_active; }
        public function getPageContent() { return $this->page_content; }
        
        public function setPageId( $value ) { $this->page_id = $value; }
        public function setFolder( $value ) { $this->folder = $value; }
        public function setPageUser( $value ) { $this->pageUser = $value; }
        public function setPageTitle( $value ) { $this->page_title = $value; }
        public function setPageSlug( $value ) { $this->page_slug = $value; }
        public function setPageDateAdded( $value ) { $this->page_date_added = $value; }
        public function setPageDateModified( $value ) { $this->page_date_modified = $value; }
        public function setPageDateDeactivated( $value ) { $this->page_date_deactivated = $value; }
        public function setPageIsActive( $value ) { $this->page_is_active = $value; }
        public function setPageContent( $value ) { $this->page_content = $value; }
}