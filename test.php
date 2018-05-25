<?php

$file = $_POST['test'];

$json = file_get_contents(__DIR__ . '/' . $file);
$data = json_decode($json, true);

if ($data[0]['number'] == false) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo "Ошибка 404!!! Загрузите сначала соответствующие тесты!!!!";
    exit;
}

?>

<h2>Дайте ответы на вопроссы</h2>
<form action="test.php" method="post">
    <label>
        <p>Введите ваше имя</p>
        <input type="hidden" name="test" value="<?php echo $file ?>"><br>
        <input type="text" name="FirstName" required><br>
    </label>
        <?php for ($i = 0; $i < count($data); $i++): ?>
            <p><?php echo$data[$i]['number'] . ") " . $data[$i]['question'] ?></p>

            <?php foreach ($data[$i]['variants'] as $k => $v) : ?>
                <input type="radio" name="<?php echo $data[$i]['number'] ?>" value="<?php echo $v ?>">
                <?php echo $v ?><br>
            <?php endforeach; ?>
            <br>
        <?php endfor; ?>
    <button type="submit">Проверить</button>
</form>

<?php

$v = 1;
$mark = 0;

if (isset($_POST['FirstName'])) {
    echo $_POST['FirstName'];
    echo "<br><br>";

    for ($i = 0; $i < count($data); $i++) {

        $num_answer = $data[$i]['number'];
        $answer = $data[$i]['answer'];

        if (isset($_POST[$v]) == null) {
            echo "$num_answer" . ") " . "ОТВЕТ НЕ ВЫБРАН!!!!" . "<br>";
        } else if ($_POST[$v] == $answer) {
            echo "$num_answer" . ") " . "Правильно, ответ = " . "$answer" . "<br>";
            $mark++;
        } else {
            echo "$num_answer" . ") " . "Не правильно!" . "<br>";
        }

        $v++;
    }
    echo "<br>" . "Оценка: " . $mark. "<br>";

    $conclusion = strval($_POST['FirstName'] . "! Your mark is: " . $mark);
}
?>

