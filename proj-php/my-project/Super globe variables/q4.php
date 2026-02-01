<?php
session_start();

if (isset($_POST['task'])) {
    $_SESSION['tasks'][] = $_POST['task'];
}
?>

<form method="post">
    <input type="text" name="task">
    <input type="submit" value="Add">
</form>

<ul>
<?php
if (!empty($_SESSION['tasks'])) {
    foreach ($_SESSION['tasks'] as $task) {
        echo "<li>$task</li>";
    }
}
?>
</ul>
