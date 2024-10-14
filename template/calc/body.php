<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Калькулятор ааа </title>
</head>

<form name="calc" action="/calculator.php" method="get">
    <label> Введите первое число: <input type="text" name="number1"></label>
    <select class="operations" name="operation">
        <option value="plus">+</option>
        <option value="minus">-</option>
    </select>
    <label> Введите второе число: <input type="text" name="number2"></label>
    <button class="btn btn-outline-success text-white" type="submit">=</button>
</form>

<?php
echo getNumber()
?>
