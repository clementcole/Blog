<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

function showComment($arr)
{
	echo '
		<div class="waveComment com-".$arr['id'].'">
				<div class="comment">
					<div class="waveTime">'.waveTime($arr['dt']).'</div>
				
					<div class="commentAvatar">
					<img src="img/'.strtolower($arr['usr']).'.png" width="30" height="30" alt="'.$arr['usr'].'"/>
					</div>

					<div class="commentText">
					<span class="name">'.$arr['usr'].':</span> '.$arr['comment'].'
					</div>

					<div class="replyLink">
					<a href="" onclick="addComment(this, '.$arr['id'].');return false;">add a reply &raquo;</a>
					</div>
					<div class="clear"></div>
				</div>

	//Output the comment, and it replies, if any
	if($arr['replies'])
	{
		foreach($arr['replies'] as $r)
			showComment($r);
	}
	echo '</div>';
}

function waveTime($t)
{
	$t = strtotime($t);

	if(date('d')==date('d',, $t)) return date('h:i A', $t);
	return date('F jS Y h:i A', $t);
	//If the comment was written today, output only the hour and minute
	//if it was not, output a full date/time

}
?>
