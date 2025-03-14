// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});

function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}


$(".sswww").hover(
	function () {
		$("#alt").html("" + $(this).children(".all").html() + "").css({ "top": $(this).offset().top - 50 })
		$("#alt").show()
	},function(){
		
	}
)
$(".sswww").mouseout(
	function () {
		$("#alt").hide()
	}
)

// alert('帳號或密碼錯誤')
// location.href='index.php?do=login'