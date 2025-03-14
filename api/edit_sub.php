<?php include_once "db.php"; 
// dd($_POST);

if(isset($_POST['id'])){
 foreach ($_POST['id'] as $idx => $id) {
    if(isset($_POST['del']) && in_array ($id,$_POST['del'])){
        $Menu->del($id);
    }else{
        $row=$Menu->find($id);
        $row['text']=$_POST['text'][$idx];
        $row['link']=$_POST['link'][$idx];
        $Menu->save($row);
    }
 }   
}

if(isset($_POST['text2'])){
    foreach ($_POST['text2'] as $idx => $text) {
        if($_POST['text2']!=''){
            $row=[];
            $row['text']=$text;
            $row['link']=$_POST['link2'][$idx];
            $row['main_id']=$_POST['main_id'];
            $Menu->save($row);
        }
    }
}
to("../admin.php?do=menu");