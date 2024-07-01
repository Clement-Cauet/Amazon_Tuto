<?php

class Database {

    private $db;

    public function __construct($host, $login, $mdp, $dbname) {
        $this->db = mysqli_connect($host, $login, $mdp, $dbname);
        if (!$this->db) {
            throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
        }

    }

    /**
     * Get all products from the database
     */

    public function getProducts() {
        $query  = 
        "SELECT * 
        FROM product";
        $result = mysqli_query($this->db, $query);
        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product = new product($this->db);
                $product->setId($row["id"]);
                $product->setTitle($row["title"]);
                $product->setDescription($row["description"]);
                $product->setPrice($row["price"]);
                $product->setScore($row["score"]);

                $resultArray[] = $product;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get a product by its ID
     * @param int $id
     */

    public function getProductById($id) {
        $query  = "SELECT * FROM product WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new product
     * @param string $title
     * @param string $description
     * @param float $price
     * @param int $score
     */

    public function createProduct($title, $description, $price, $score) {
        $query  = "INSERT INTO product (title, description, price, score) VALUES ('$title', '$description', '$price', '$score')";
        $result = mysqli_query($this->db, $query);
    }

    /**
     * Update a product
     * @param string $title
     * @param string $description
     * @param float $price
     * @param int $score
     * @param int $id
     */

    public function updateProduct($title, $description, $price, $score, $id) {
        $query  = "UPDATE product SET title = '$title', description = '$description', price = '$price', score = '$score' WHERE id = $id";
        $result = mysqli_query($this->db, $query);
    }

    /**
     * Delete a product
     */

    public function deleteProduct($id) {
        $query  = "DELETE FROM product WHERE id = $id";
        $result = mysqli_query($this->db, $query);
    }

    ///////////////////////////////

    /**
     * Get all users from the database
     */

    public function getUsers() {
        $query  = "SELECT * FROM user";
        $result = mysqli_query($this->db, $query);

        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new User($this->db);
                $user->setId($row["id"]);
                $user->setName($row["name"]);
                $user->setPassword($row["password"]);
                $user->setAdmin($row["admin"]);

                $resultArray[] = $user;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get a user by its ID
     * @param int $id
     */

    public function getUserById($id) {
        $query  = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new user
     * @param string $name
     * @param string $password
     */

    public function createUser($name, $password, $admin) {
        $query = "INSERT INTO user (name, password, admin) VALUES ('$name', '$password', '$admin')";
        mysqli_query($this->db, $query);
    }

    /**
     * Update a user
     * @param string $name
     * @param string $password
     * @param int $id
     */

    public function updateUser($name, $password, $admin, $id) {
        $query = "UPDATE user SET name = '$name', password = '$password', admin = '$admin' WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Delete a user
     * @param int $id
     */

    public function deleteUser($id) {
        $query = "DELETE FROM user WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Login a user
     * @param string $name
     * @param string $password
     */

    public function login($name, $password) {
        $query  = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
        $result = mysqli_query($this->db, $query);
        
        return mysqli_fetch_assoc($result);
    }

}
?>