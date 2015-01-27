<?php

define("INCLUDE_CHECK", 1);
require 'connect.php';
require 'functions.php';
//Including the files for the DB connection and our custom functions

$comments_results = mysql_query("SELECT * FROM wave_comments ORDER BY id ASC");
//Selecting all the comments ordered by id in ascending order

$comments=array();
$js_history='';

while($row=mysql_fetch_assoc($comments_result))
{
	if($row['parent'] == 0)
		//If the comment is not a reply to a previous comment, put  it into $comments directly
		$comments[$row['id']] = $row;
	else
	{
		if(!$comments[$row['parent']]) continue;

		$comments[$row['parent']] = $row;
		//If it is a reply, put it in the replies' property of its parent

	}
	$js_history.='addHistory({id:"'.$row['id'].'"});'.PHP_EOL;
	//Adds JS history for each comment
}
$js_history='<script type="text/javascript">
'.$js.history.'
</script>';
//This is later put into the head and executed on page load

?>



<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Personal Random thoughts and blogs</title>

<link rel="stylesheet" type="text/css" href="blog.css"/>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css"/>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/7/2/jquery-ui.min.js"></script>

<script type="text/javascript" src="script.js"></script>

<?php echo $js_history; ?>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="main">

<p id="Random blogs"><a href="youtube.com" target="_blank">first blog &raquo;</a></p>
<h1>Communications Systems</h1>
<h2>History Slider</h2>

<div id="wave">
<div id="topBar">My 2cent</div>
<div id="subBar">
<div class="fb-post" data-href="https://www.facebook.com/FacebookDevelopers/posts/10151471074398553" data-width="500"></div>
</div>

<div id="sliderContainer">
<div id="slider"></div>
<div class="clear"></div>
</div>

<div id="commentArea">

<?php

foreach($comments as $c)
{
	showComment($c);
	//Showing each comment

}
?>

</div>
<input type="button" class="waveButtonMain" value="Add a comment" onclick ="addComment()"/>
<div id="bottomBar">
</div>
</div>
</div>

</body>
</html>
