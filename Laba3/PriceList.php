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
    //Прайс лист
    function displayDataPriceList()
    {
        $table = 'price_list';
        $sql = "SELECT * FROM $table";
        global $conn;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";

            echo "<tr>";
            echo "<th>Год выпуска</th>";
            echo "<th>Цена</th>";
            echo "<th>Предпродажная подготовка</th>";
            echo "<th>Транспортные издержки</th>";
            echo "<th>Действия</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["year_start"] . "</td>";
                echo "<td>" . $row["coast"] . "</td>";
                echo "<td>" . $row["podgotovka"] . "</td>";
                echo "<td>" . $row["transport_coast"] . "</td>";
                echo "<td><a href='edit.php?table=$table&id=" . $row["id"] . "'>Изменить</a> | <a href='delete.php?table=$table&id=" . $row["id"] . "'>Удалить</a> </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data to display.";
        }
    }

    // Отображение данных таблицы 'price_list'
    echo "<h2>Прайс лист</h2>";
    displayDataPriceList('price_list');

    $table = 'price_list';
    echo "<a href='create.php?table=$table' style='display: inline-block; width: 150px; height: 50px; background-color: #ccc; text-align: center; line-height: 50px; border-radius: 5px;'>Добавить запись</a>";

    $conn->close();
    ?>

</body>

</html>