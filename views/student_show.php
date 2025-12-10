<?php
$studentModel = new Student();
$student = $studentModel->find($id);
$courses = $studentModel->getCourses($id);
$title = $student['name'];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> - Course Management System</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Course Management System</h1>
            <p>Система управління курсами та студентами</p>
        </header>
        
        <nav>
            <a href="index.php?page=courses">
                📖 Курси
            </a>
            <a href="index.php?page=students" class="active">
                👥 Студенти
            </a>
        </nav>
        
        <main>
            <div class="breadcrumb">
                <a href="index.php?page=students">← Назад до списку студентів</a>
            </div>

            <div class="student-detail">
                <h2>👤 <?php echo htmlspecialchars($student['name']); ?></h2>
                <div class="meta">
                    <span>📧 Email: <?php echo htmlspecialchars($student['email']); ?></span>
                    <span>🎓 Номер: <?php echo htmlspecialchars($student['student_number']); ?></span>
                    <span>📚 Курсів: <?php echo count($courses); ?></span>
                </div>
            </div>

            <h3>📖 Курси студента</h3>

            <?php if (empty($courses)): ?>
                <div class="empty-state">
                    <p>Студент ще не записаний на жоден курс</p>
                </div>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Назва курсу</th>
                            <th>Опис</th>
                            <th>Викладач</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo htmlspecialchars($course['name']); ?></td>
                                <td><?php echo htmlspecialchars(substr($course['description'], 0, 100)) . '...'; ?></td>
                                <td><?php echo htmlspecialchars($course['instructor']); ?></td>
                                <td>
                                    <a href="index.php?page=courses&id=<?php echo $course['id']; ?>" class="btn-small">
                                        Переглянути →
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </main>
        
        <footer>
            <p>© 2025 Course Management System | Варіант 8: Зв'язки між сутностями та DRY принцип</p>
        </footer>
    </div>
</body>
</html>
