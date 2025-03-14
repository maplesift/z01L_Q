<?php include_once "db.php"; 
$table=$_POST['table'];
$db=ucfirst($table);

unset($_POST['table']);

if(!empty($_FILES)){
    dd($_FILES);
}else{
    echo 0;
}

if(isset($_POST['pw2'])){
    unset($_POST['pw2']);
}

$$db->save($_POST);

to("../admin.php?do=$table");