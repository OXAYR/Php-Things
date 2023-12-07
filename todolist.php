<?php
session_start();


if (!isset($_SESSION['todoList'])) {
    $_SESSION['todoList'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $_SESSION['todoList'] = $task;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Todo List</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Add Task: <input type="text" name="task" required>
        <button type="submit">Add</button>
    </form>
    <h1>Todo List</h1>
    <?php if (!empty($_SESSION['todoList'])) : ?>
        <ul>
            <?php foreach ($_SESSION['todoList'] as $task) : ?>
                <li><?php echo htmlspecialchars($task); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No tasks yet.</p>
    <?php endif; ?>

</body>
</html>
