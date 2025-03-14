<?php include_once "../api/db.php";
$rows=$Menu->all(['main_id'=>$_GET['id']]);
?>
<h2 class="cent">編輯次選單</h2>
<hr>
<form action="./api/edit_sub.php" method="post" enctype="multipart/form-data">
<table id="more">
    <tr>
        <td>次選單名稱</td>
        <td>次選單連結網址</td>
        <td>刪除</td>
    </tr>
    <?php foreach ($rows as $row) :?>
    <tr>
        <td><input type="text" name="text[]" value="<?=$row['text'];?>"></td>
        <td><input type="text" name="link[]" value="<?=$row['link'];?>"></td>
        <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
    </tr>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    <?php 
endforeach ;
?>

</table>
<div class="cent">

    <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
    <!-- <input type="hidden" name="table" value="<?=$_GET['table'];?>"> -->
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>

</form>
<script>
    function more(){
        let more=   `
                    <tr>
                        <td><input type="text" name="text2[]"></td>
                        <td><input type="text" name="link2[]"></td>
                        <td></td>
                    </tr>
                    `
        $("#more").append(more);
    }
</script>