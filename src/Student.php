<?php

class Student extends Model {
    protected static $table = 'students';
    
    public function getCourses($studentId) {
        $stmt = $this->db->prepare("
            SELECT c.* FROM courses c
            INNER JOIN enrollments e ON c.id = e.course_id
            WHERE e.student_id = ?
            ORDER BY c.name
        ");
        $stmt->execute([$studentId]);
        return $stmt->fetchAll();
    }
}
