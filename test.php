<?php

$json = file_get_contents(__DIR__ . '/test/test.json');
$data = json_decode($json, true);
?>

<h2>Дайте ответы на вопроссы</h2>
<form action="test.php" method="post">
    <?php for ($i = 0; $i < count($data); $i++): ?>
    <label><?php echo$data[$i]['number'] . ") " . $data[$i]['question'] ?></label>
    <input name="<?php echo $data[$i]['number'] ?>" type="text">
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

