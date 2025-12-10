<?php

class Model {
    protected static $table;
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public static function all() {
        $instance = new static();
        $stmt = $instance->db->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll();
    }
    
    public static function find($id) {
        $instance = new static();
        $stmt = $instance->db->prepare("SELECT * FROM " . static::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
