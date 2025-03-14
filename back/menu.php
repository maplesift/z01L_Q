<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>

    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="7%">次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php  
                $table=$_GET['do'];
                $db=ucfirst($table);
                // echo $$db;
                $rows=$$db->all(['main_id'=>0]); 
                ?>
                <?php 
                foreach ($rows as $row) :
                ?>
                <tr class="">
                    <!-- 選單 -->
                    <td width="30%">
                    <input type="text" name="text[]" value="<?=$row['text'];?>">
                    </td>
                    <!-- 文字區 -->
                    <td width="30%">
                        <input type="text" name="link[]" value="<?=$row['link'];?>">
                    </td>
                    <!-- 次選單數 -->
                    <td width="7%">
                        <?=$Menu->count(['main_id'=>$row['id']]);?>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <!-- 刪除 -->
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <!-- 更新圖片 -->
                    <td>
                    <input type="button" onclick="op('#cover','#cvr','./modal/submenu.php?id=<?=$row['id'];?>')"
                    value="編輯次選單">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php 
                endforeach ;
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')"
                            value="新增主選單">
                    </td>
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