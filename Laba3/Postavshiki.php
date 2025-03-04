<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP Database CRUD Interface</title>
    <link rel="stylesheet" href="styles/main_style.css">

</head>

<body>
    <?php
    // Подключение к базе данных
    include "db.php";

    // Функция для выполнения запросов к базе данных
    include "fnck/executeQuery.php";

    // Функция для отображения данных из таблицы
    //Поставщики
    function displayDataPostavshiki()
    {
        $table = 'postavshiki';
        $sql = "SELECT * FROM $table";
        global $conn;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Название фирмы</th>";
            echo "<th>Телефон</th>";
            echo "<th>Почта</th>";
            echo "<th>Сайт</th>";
            echo "<th>Город</th>";
            echo "<th>Действия</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name_firma"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["website"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td><a href='edit.php?table=$table&id=" . $row["id"] . "'>Изменить</a> | <a href='delete.php?table=$table&id=" . $row["id"] . "'>Удалить</a> </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data to display.";
        }
    }

    // Отображение данных таблицы 'postavshiki'
    echo "<h2>Поставщики</h2>";
    displayDataPostavshiki('postavshiki');

    $table = 'Postavshiki';
    echo "<a href='create.php?table=$table' style='display: inline-block; width: 150px; height: 50px; background-color: #ccc; text-align: center; line-height: 50px; border-radius: 5px;'>Добавить запись</a>";

    $conn->close();
    ?>

</body>

</html>