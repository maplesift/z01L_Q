<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>

    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">校園映像資料圖片</td>
                    <!-- <td width="23%">替代文字</td> -->
                    <td width="15%">顯示</td>
                    <td width="15%">刪除</td>
                    <td></td>
                </tr>
                <?php  
                $table=$_GET['do'];
                $db=ucfirst($table);
                // echo $$db;

                $total=$$db->count();
                $div=3;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;
                
                $rows=$$db->all(" limit $start,$div "); 
                ?>
                <?php 
                foreach ($rows as $row) :
                ?>
                <tr class="">
                    <!-- 圖片 -->
                    <td width="45%">
                        <img src="./upload/<?=$row['img'];?>" style="width: 100px;">
                    </td>
                    <!-- 文字區 -->
                    <!-- <td width="23%">
                        <input type="text" name="text[]" value="<?=$row['text'];?>">
                       
                    </td> -->
                    <!-- 顯示 -->
                    <td width="15%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <!-- 刪除 -->
                    <td width="15%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <!-- 更新圖片 -->
                    <td>
                    <input type="button" onclick="op('#cover','#cvr','./modal/update_<?=$do;?>.php?table=<?=$do?>&id=<?=$row['id'];?>')"
                    value="更新圖片">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php 
                endforeach ;
                ?>
            </tbody>
        </table>
        <div class="cent" >
            <?php
            if($now-1>0){
                echo "<a href='?do=table&p=".($now-1)."'> < </a>";
            }
            for ($i=1; $i<=$pages; $i++) { 
                $size=($now==$i)?'26px':'18px';
                echo "<a href='?do=table&p=$i' style='font-size: $size;'> $i </a>";
            }
            if($now+1<=$pages){
                echo "<a href='?do=table&p=".($now+1)."'> > </a>";
            }
            ?>
        </div>  


        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')"
                            value="新增校園映像圖片">
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