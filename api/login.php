<?php include_once "db.php"; 
$chk=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    $_SESSION['user']=1;
    to("../admin.php?do=title");
}else{
  echo  "<script>
        alert('帳號或密碼錯誤');
        location.href='../index.php?do=login';
        </script>";
}
?>
