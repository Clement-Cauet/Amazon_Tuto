<?php

class Product {

    private $db;

    private $id;
    private $title;
    private $description;
    private $price;
    private $score;

    /**
     * Product constructor
     * @param Database $db
     */

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Getters and setters
     */

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->author;
    }

    public function setPrice($author) {
        $this->author = $author;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    /**
     * Get all information about a Product
     */

    public function getProductById() {
        $row = $this->db->getProductById($this->id);

        $this->setId($row["id"]);
        $this->setTitle($row["title"]);
        $this->setDescription($row["description"]);
        $this->setPrice($row["price"]);
        $this->setScore($row["score"]);

        return $this;
    }

    /**
     * Create, update and delete a Product
     */

    public function createProduct($title, $description, $price, $score) {
        $this->db->createProduct($title, $description, $author, $score);
    }

    public function updateProduct($title, $description, $price, $score) {
        $this->db->updateProduct($title, $description, $price, $score);
    }

    public function deleteProduct() {
        $this->db->deleteProduct($this->id);
    }
}

?>