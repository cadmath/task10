<?php
$dns = 'mysql:host=localhost;dbname=home';
$db = new PDO($dns, 'root', '');

//получаем данные
$name = trim(htmlspecialchars($_POST['name']));
$text = trim(htmlspecialchars($_POST['text']));

//Если запись существует $select_val принимает ассоциативный массив (true) 
//Если запись не существует $select_val принимает пустой массив (false) 
if(!empty($name) and !empty($text)){
    $select = 'SELECT * FROM text WHERE text=:text';
    $select_prepare = $db->prepare($select);
    $select_prepare->execute(['text'=>$text]);
    $select_val = $select_prepare->fetchAll(PDO::FETCH_ASSOC);
}
var_dump($select_val);

//Записываем данные в БД
    if(!$select_val){
    $insert = 'INSERT INTO text (name, text, date) VALUES (:name, :text, :date)';
    $date = $db->prepare($insert);
    $date->execute(['name'=>$name, 'text'=>$text, 'date'=>date('Y/m/d h:i:s', time())]);
    setcookie('alert', 'off');
    header('Location: task_10.php');
    }else{
        setcookie('alert', 'on');
        header('Location: task_10.php');
    }

?>