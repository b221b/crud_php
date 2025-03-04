<?php

// Функция для выполнения запросов к базе данных
function executeQuery($sql)
{
    global $conn;
    $result = $conn->query($sql);

    if ($result === TRUE) {
        return true;
    } elseif ($result === FALSE) {
        echo "Ошибка выполнения запроса: " . $conn->error;
        return false;
    } else {
        return $result;
    }
}
