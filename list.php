<?php

move_uploaded_file($_FILES['userfile']['tmp_name'], 'test/test.json');

$json = file_get_contents(__DIR__ . '/test/test.json');
$data = json_decode($json, true);

for ($i = 0; $i < count($data); $i++) {
    echo $data[$i]['number'] . ")" . "<br>";
    echo $data[$i]['question'] . "<br>";
    echo $data[$i]['variant1'] . "; ";
    echo $data[$i]['variant2'] . "; ";
    echo $data[$i]['variant3'] . "<br>";
    echo "Answer is: ";
    echo $data[$i]['answer'] . "<br><br>";
}

echo "<a href='test.php'><h1>Go to test</h1></a>";


echo "<a href='testttt.php'><h1>Go to wrong test</h1></a>";