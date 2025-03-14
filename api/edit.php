<?php include_once "db.php"; 
$table=$_POST['table'];
$db=ucfirst($table);

if(isset($_POST['id'])){
    foreach ($_POST['id'] as $idx => $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $$db->del($id);
        }else{
            $row=$$db->find($id);
            if(isset($_POST['sh'])){
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            }
            if(isset($_POST['text'])){
                $row['text']=$_POST['text'][$idx];
            }
            if(isset($_POST['acc'])){
                $row['acc']=$_POST['acc'][$idx];
            }
            if(isset($_POST['pw'])){
                $row['pw']=$_POST['pw'][$idx];
            }

        }
        $$db->save($row);
    }
}
to("../admin.php?do=$table");