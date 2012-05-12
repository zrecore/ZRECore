<?php
namespace Content;

/**
 * @Entity
 * @Table(name="folder")
 */
class Folder
{
        /** @Column(type="integer") @GeneratedValue */
        private $folder_id;
        /** @Column(type="string",length=255) */
        private $folder_name;
        /** @Column(type="string",length=255) */
        private $folder_slug;
        /**
	 * @OneToOne(targetEntity="Folder") 
	 * @JoinColumn(name="folder_parent_id", referencedColumnName="folder_id")
	 */
        private $folderParent;
        
        
        public function getFolderId() { return $this->folder_id; }
        public function getFolderName() { return $this->folder_name; }
        public function getFolderSlug() { return $this->folder_slug; }
        public function getFolderParent() { return $this->folderParent; }
        
        public function setFolderId( $value ) { $this->folder_id = $value; }
        public function setFolderName( $value ) { $this->folder_name = $value; }
        public function setFolderSlug( $value ) { $this->folder_slug = $value; }
        public function setFolderParent( $value ) { $this->folderParent = $value; }
}