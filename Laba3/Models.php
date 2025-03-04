<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP Database CRUD Interface</title>
    <link rel="stylesheet" href="styles/models.css">
</head>

<body>
    <?php
    // Подключение к базе данных
    include "db.php";

    // Функция для выполнения запросов к базе данных
    include "fnck/executeQuery.php";

    // Функция для отображения данных из таблицы
    //Модели
    function displayDataModels()
    {
        $table = 'Models';
        $sql = "SELECT * FROM $table";
        global $conn;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";

            echo "<tr>";
            echo "<th>Название модели</th>";
            echo "<th>Цвет</th>";
            echo "<th>Обивка</th>";
            echo "<th>Мощность двигателя</th>";
            echo "<th>Кол-во дверей</th>";
            echo "<th>Коробка передач</th>";
            echo "<th>номер поставщика</th>";
            echo "<th>Действия</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["model_name"] . "</td>";
                echo "<td>" . $row["color"] . "</td>";
                echo "<td>" . $row["obivka"] . "</td>";
                echo "<td>" . $row["engine_power"] . "</td>";
                echo "<td>" . $row["door_number"] . "</td>";
                echo "<td>" . $row["korobka_peredach"] . "</td>";
                echo "<td>" . $row["id_postavshika"] . "</td>";
                echo "<td><a href='edit.php?table=$table&id=" . $row["id"] . "'>Изменить</a> | <a href='delete.php?table=$table&id=" . $row["id"] . "'>Удалить</a> </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data to display.";
        }
    }

    // Отображение данных таблицы 'models'
    echo "<h2>Модели машин</h2>";
    displayDataModels('models');

    $table = 'models';
    echo "<a href='create.php?table=$table' style='display: inline-block; width: 150px; height: 50px; background-color: #ccc; text-align: center; line-height: 50px; border-radius: 5px;'>Добавить запись</a>";

    $conn->close();
    ?>

</body>

</html>