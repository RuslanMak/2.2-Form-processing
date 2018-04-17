<?php

$json = file_get_contents(__DIR__ . '/test/test.json');
$data = json_decode($json, true);
?>

<h2>Дайте ответы на вопроссы</h2>
<form action="test.php" method="post">
    <?php for ($i = 0; $i < count($data); $i++): ?>
    <p><?php echo$data[$i]['number'] . ") " . $data[$i]['question'] ?></p>
    <input type="radio" name="<?php echo $data[$i]['number'] ?>" value="<?php echo $data[$i]['variant1'] ?>">
        <?php echo $data[$i]['variant1'] ?><br>
    <input type="radio" name="<?php echo $data[$i]['number'] ?>" value="<?php echo $data[$i]['variant2'] ?>">
        <?php echo $data[$i]['variant2'] ?><br>
    <input type="radio" name="<?php echo $data[$i]['number'] ?>" value="<?php echo $data[$i]['variant3'] ?>">
        <?php echo $data[$i]['variant3'] ?><br>
    <br>
    <?php endfor; ?>
    <button type="submit">Проверить</button>
</form>

<?php

$v = 1;

if ($_POST[$v] != null) {
    for ($i = 0; $i < count($data); $i++) {
        $nun_answer = $data[$i]['number'];
        $answer = $data[$i]['answer'];
        $question = "$data[$i]['question']";
        if ($_POST[$v] == $answer) {
            echo "$nun_answer" . ") " . "Правильно, ответ = " . "$answer" . "<br>";
        } else {
            echo "$nun_answer" . ") " ."НЕ ПРАВИЛЬНО!!!" . "<br>";
        }
        $v++;
    }
}
?>



