<?php
$courseModel = new Course();
$course = $courseModel->find($id);
$students = $courseModel->getStudents($id);
$title = $course['name'];
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
            <a href="index.php?page=courses" class="active">
                📖 Курси
            </a>
            <a href="index.php?page=students">
                👥 Студенти
            </a>
        </nav>
        
        <main>
            <div class="breadcrumb">
                <a href="index.php?page=courses">← Назад до списку курсів</a>
            </div>

            <div class="course-detail">
                <h2>📖 <?php echo htmlspecialchars($course['name']); ?></h2>
                <p class="description"><?php echo htmlspecialchars($course['description']); ?></p>
                <div class="meta">
                    <span>👨‍🏫 Викладач: <?php echo htmlspecialchars($course['instructor']); ?></span>
                    <span>👥 Студентів: <?php echo count($students); ?></span>
                </div>
            </div>

            <h3>👥 Студенти на курсі</h3>

            <?php if (empty($students)): ?>
                <div class="empty-state">
                    <p>На цей курс ще не записано жодного студента</p>
                </div>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ім'я</th>
                            <th>Email</th>
                            <th>Номер студента</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['email']); ?></td>
                                <td><?php echo htmlspecialchars($student['student_number']); ?></td>
                                <td>
                                    <a href="index.php?page=students&id=<?php echo $student['id']; ?>" class="btn-small">
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
