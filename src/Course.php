<?php

class Course extends Model {
    protected static $table = 'courses';
    
    public function getStudents($courseId) {
        $stmt = $this->db->prepare("
            SELECT s.* FROM students s
            INNER JOIN enrollments e ON s.id = e.student_id
            WHERE e.course_id = ?
            ORDER BY s.name
        ");
        $stmt->execute([$courseId]);
        return $stmt->fetchAll();
    }
}
