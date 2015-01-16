<?php
	/*Connect to MySQL*/
	mysql_connect('host', 'database', 'password')
	or die(mysql_error());
	/*Select database*/
	mysql_select_db('database')
	or die(mysql_error());
	/*Create the table*/
	mysql_query("create table chat(time int(11) NOT NULL, name varchar(30) NOT NULL, ip varchar(15) NOT NULL, message varchar(500) NOT NULL, PRIMARY KEY (time)")or
	die (mysql_error());
	echo "Complete.";
?>
<html>
		<head>
			<style>
				.message{
					overflow:hidden;
					width:498;
					margin-bottom:5px;
					border:1px solid #999;
				}
				.messagehead{
					overflow:hidden;
					background:#FFC;
					width:500px;
				}
				.messagecontent{
					overflow:hidden;
					width:496px;
				}
			</style>
		</head>

		<body>
			<div id="chat" style="width:500px;margin:0 auto;overflow:hidden;">
				<!-- THIS div will contain the message -->
	        		<div id="messages"></div>	
				<!-- This div will contain an eventual error message --> 
				<div id="error" style="width:500px;text-align:center;color:red;"></div> 
				<!--This div contains the forms and the send button --> 
			<div id="write" style="text-align:center;"><textarea id="message" cols="50" rows="5"></textarea><br/>Name:<input type="text" id="name"/><input type="button" value="Send" onClick="send();"/></div>
		 </div>
	</body>

	<script type="text/javascript">
	//This function will display the messages
	function showmessages(){
		//Send an XMLHttpRequest to the 'show-message.php' file
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "show-messages.php", false);
			xmlhttp.send(null);
			}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.open("GET", "showmessages.php",false);
			xmlhttp.send();
			}
			//Replace the content of the messages with the response from the 'show-messages.php' file
		document.getElementById('messages').innerHTML = xmlhttp.responseText;
			//Repeat the function each 30 seconds
		setTimeout('showmessages()',30000);
			}
			//Start the showmessages() function
		showmessages();
			//This function will submit the message
		function send(){
			//Send an XMLHttpRequest to the 'send.php' file with all the required informations
		  var sendto = 'send.php?message=' +
		document.getElementById('message').value + '&name=' +
		document.getElementById('name').value;
			if(window.XMLHttpRequest(){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", sendto,false);
				xmlhttp.send(null);
		   }
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				xmlhttp.open("GET",sendto,false);
				xmlhttp.send();
		   }
		   var error=' ';
		 	//If an error occurs the 'send.php' file sends the number of the error
			//and based on that number a message is displayed
			switch(parseInt(xmlhttp.responseText)){
				case 1:
					error = 'The database is down!';
					break;
				case 2:
					error = 'The database is down!';
					break;
				case 3:
					error = 'Donnot forget the message!';
					break;
				case 4:
					error = 'The message is too long!';
					break;

				case 5:
					error = 'Donot forget the name!';
					break;
				case 6:
					error = 'The name is too long!';
					break;
				case 7:
					error = 'This name is already used by somebody else!;
					break;
				case 8:
					error = 'The database is down!';
			}
			if(error = ''){
				document.getElementById('error').innerHTML = '';
				showmessages();
			}
			else{

				document.getElementById('error').innerHTML = error;
			}
		}
	</script>
   </body>
</html>




	<?php
		//Connect to MySQL
		mysql_connect('host', 'database', 'password') or die(1);
		//Select database
		mysql_select_db('borcsa9_database') or die(2);
		//Check if message is empty and send the error code
		else if(strlen($message) < 1){
			echo 3;
		}
		//Check if name is too long
		else if(strlen($name) < 255){
			echo 4;
		}
		//Check if name is empty
		else if(strlen($name)<1){
			echo 5;
		}
		//Check if name is too long
		else if (strlen($name) > 29){
			echo 6;
		}
		














































