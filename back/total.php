<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>

    <form method="post" action="./api/edit_total.php">
        <table width="100%">
            <tbody>
                <?php  
                $table=$_GET['do'];
                $db=ucfirst($table);
                // echo $$db;
                $rows=$$db->all(); 
                foreach ($rows as $row) :
                ?>
                <tr class="yel">
                    <!-- <td width="45%">進站總人數:</td> -->
                    <td width="30%">進站總人數:
                        
                    </td>
                    <td>
                    <input type="text" name="text" value="<?=$row['total'];?>">
                    </td>
                    <!-- <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td> -->
                </tr>
                <?php 
                endforeach ;
                ?>
                <?php 
                ?>
                <tr class="">
                    <!-- 圖片 -->
                    <!-- <td width="45%">
                        <img src="./upload/<?=$row['img'];?>" style="width: 300px;">
                    </td> -->
                    <!-- 文字區 -->
                    <!-- <td width="30%">
                        <input type="text" name="text[]" value="<?=$row['total'];?>">
                       
                    </td> -->
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')"
                            value="新增網站標題圖片">
                    </td> -->
                    <td class="cent">
                        <input type="hidden" name="table" value="<?=$do;?>">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>