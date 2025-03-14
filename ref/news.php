<?php

$total=$News->count();
$div=5;
$now=$_GET['p']??1;
$pages=ceil($total/$div);
$start=($now-1)*$div;

$all_news=$News->all(['sh'=>1]," limit $start,$div ");
?>



<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;">

    </div>
    <!--正中央-->
    <div style="text-align:center;">
        <ol class="ssaa" style="list-style-type:decimal;" start="<?=$start+1?>">
            <?php 
    foreach ($all_news as $news) :
    ?>
            <li>
                <?=mb_substr($news['text'],0,15);?>
                <span class="all" style="display: none;"><?=nl2br($news['text'])?></span>
            </li>
            <?php 
    endforeach ;
    ?>
        </ol>
    </div>
    <div class="cent">
        <?php
            if($now-1>0){
                echo "<a href='?do=news&p=".($now-1)."'> < </a>";
            }
            for ($i=1; $i<=$pages; $i++) { 
                $size=($now==$i)?'26px':'18px';
                echo "<a href='?do=news&p=$i' style='font-size: $size;'> $i </a>";
            }
            if($now+1<=$pages){
                echo "<a href='?do=news&p=".($now+1)."'> > </a>";
            }
            ?>

    </div>
</div>
<div id="altt"
    style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 600px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
$(".ssaa li").hover(
    function() {
        $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
        $("#altt").show()
    }
)
$(".ssaa li").mouseout(
    function() {
        $("#altt").hide()
    }
)
</script>