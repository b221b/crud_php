<?php
    // Проверка наличия параметров
    if (!isset($_GET['table']) || !isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }

    $table = $_GET['table'];
    $id = $_GET['id'];

    // Подключение к базе данных
    include "db.php";

    // Удаление записи из таблицы (delete)
    $deleteQuery = "DELETE FROM $table WHERE id = $id";
    $conn->query($deleteQuery);

    // Перенаправление на главную страницу
    header("Location: Laba3.php");
    exit();

    $conn->close();
?>
