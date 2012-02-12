<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="category")
 */
class Category
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $category_id;
	/** @Column(type="string",length=255) */
	private $category_name;
	/** @Column(type="string",length=255) */
	private $category_slug;
	/**
	 * @OneToOne(targetEntity="Category") 
	 * @JoinColumn(name="category_parent_id", referencedColumnName="category_id")
	 */
	private $categoryParent;
	
	public function getCategoryId() { return $this->category_id; }
	public function getCategoryName() { return $this->category_name; }
	public function getCategorySlug() { return $this->category_slug; }
	public function getCategoryParent() { return $this->categoryParent; }
	
	public function setCategoryId($value) { $this->category_id = $value; }
	public function setCategoryName($value) { $this->category_name = $value; }
	public function setCategorySlug($value) { $this->category_slug = $value; }
	public function setCategoryParent($value) { $this->categoryParent = $value; }
}