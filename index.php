<!DOCTYPE HTML>
<html lang = "ru">
<head>
    <title>Калькулятор</title>
    <meta charset = "UTF-8">
</head>
<body>
<form action = '' method = 'post'>
    <input type = "text" name = "number1" placeholder = "Первое число">
    <select name = "operation">
        <option value = 'plus'>+</option>
        <option value = 'minus'>-</option>
        <option value = "multiply">*</option>
        <option value = "divide">/</option>
    </select>
    <input type = "text" name = "number2" placeholder = "Второе число">
    <input type = "submit" name = "submit" value = "Получить ответ">
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $number1   = $_POST['number1'];
    $number2   = $_POST['number2'];
    $operation = $_POST['operation'];
    if (!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
        $error_result = 'Поля не заполнены';
    } else {
        if (!is_numeric($number1) || !is_numeric($number2)) {
            $error_result = "Здесь нужны числа";
        } else {
            if ($operation == 'plus')
                $result = $number1 + $number2;
            else if ($operation == 'minus')
                $result = $number1 - $number2;
            else if ($operation == 'multiply')
                $result = $number1 * $number2;
            else if ($operation == 'divide')
                if ($number2 == '0') {
                    $error_result = "На ноль делить нельзя!";
                } else {
                    $result = $number1 / $number2;
                }
        }
    }
}
if (isset($error_result)) {
    print("Ошибка: $error_result");
}
if (isset($result)) {
    print("Ответ: $result");
}
?>