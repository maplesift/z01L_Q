<style>
    .t-area{
        width: 350px;
        height: 100px;
    }
</style>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>

    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <!-- <td width="45%">網站標題</td> -->
                    <td width="35%">最新消息資料內容</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <!-- <td></td> -->
                </tr>
                <?php  
                $table=$_GET['do'];
                $db=ucfirst($table);
                // echo $$db;
                $total=$$db->count();
                $div=5;
                $now=$_GET['p']??1;
                $pages=ceil($total/$div);
                $start=($now-1)*$div;


                $rows=$$db->all(" limit $start,$div "); 
                ?>
                <?php 
                foreach ($rows as $row) :
                ?>
                <tr class="">

                    <!-- 文字區 -->
                    <td width="35%">
                        <textarea name="text[]" id="" class="t-area">
                        <?=$row['text'];?>
                        </textarea>
                        <!-- <input type="text" name="text[]" > -->
                       
                    </td>
                    <!-- 顯示 -->
                    <td width="7%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <!-- 刪除 -->
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <!-- 更新圖片 -->
 
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php 
                endforeach ;
                ?>
            </tbody>
        </table>
        <div class="cent">

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
                            value="新增最新消息資料">
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