<h2 class="cent">新增最新消息資料</h2>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
<table>
    <!-- <tr>
        <td>標題區圖片</td>
        <td><input type="file" name="img"></td>
    </tr> -->
    <tr>
        <td>最新消息資料</td>
        <td>
            <textarea name="text" ></textarea>
        </td>
    </tr>

</table>
<div class="cent">

    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>