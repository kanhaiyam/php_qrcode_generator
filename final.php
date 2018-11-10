<html>
	<head>
<link rel="stylesheet" type="text/css" href="styles.css">


		<title>QR Code Generator</title>
	</head>
	<body>
<?php
 include("menu.php");
 ?>
<HR>
<H1 align="center">QR Code Generator</H1><HR><BR>

		<center>
			<table border="0">
			<?php
			include("qrcode.php");

			$qr = new qrcode();
			
	switch ($_POST['Type']) {
		case 'Text':$qr->text($_POST['2Text']);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Text</td><td>"; echo nl2br($_POST['2Text']); echo "</td></tr></table>";
			break;
		
		case 'Link':$qr->link($_POST['2Link']);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Link</td><td>"; echo $_POST['2Link']; echo "</td></tr></table>";
			break;
			
		case 'Bookmark':$qr->bookmark($_POST['2bname'], $_POST['2blink']);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Name</td><td>"; echo $_POST['2bname']; echo "</td></tr>
		<tr><td>Link</td><td>"; echo $_POST['2blink']; echo "</td></tr></table>";
			break;
			
		case 'SMS':$qr->sms($_POST['2smsno'], $_POST['2smsmsg']);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Number</td><td>"; echo $_POST['2smsno']; echo "</td></tr>
		<tr><td valign='top'>Message</td><td>"; echo nl2br($_POST['2smsmsg']); echo "</td></tr></table>";
			break;
			
		case 'Phone':$qr->phone_number($_POST['2smsno']);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Number</td><td>"; echo $_POST['2smsno']; echo "</td></tr></table>";
			break;
			
		case 'C-Info': $name = $_POST['2fname'] . $_POST['2lname'];
		$qr->contact_info($name, $_POST["2cadd"], $_POST["2cphone"], $_POST["2cemail"]);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>First Name</td><td>"; echo $_POST['2fname']; echo "</td></tr>
		<tr><td>Last Name</td><td>"; echo $_POST['2lname']; echo "</td></tr>
		<tr><td>Phone Number</td><td>"; echo $_POST['2cphone']; echo "</td></tr>
		<tr><td>E-Mail</td><td>"; echo $_POST['2cemail']; echo "</td></tr>
		<tr><td valign='top'>Address</td><td>"; echo nl2br($_POST['2cadd']) ; echo "</td></tr></table>";
			break;
			
		case 'Email':$qr->email($_POST["2eadd"], $_POST["2esub"], $_POST["2emsg"]);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>E-Mail</td><td>"; echo $_POST['2eadd']; echo "</td></tr>
		<tr><td>Subject</td><td>"; echo $_POST['2esub']; echo "</td></tr>
		<tr><td>Message</td><td>"; echo nl2br($_POST['2emsg']); echo "</td></tr></table>";
			break;
			
		case 'WiFi':$qr->wifi($_POST["2wenc"], $_POST["2wname"], $_POST["2wpass"]);
		echo "<tr><td colspan=2 align=center><img src='".$qr->get_link()."' border='0'/></td></tr>
		<tr><td>Name</td><td>"; echo $_POST['2wname']; echo "</td></tr>
		<tr><td>Encryption</td><td>"; echo $_POST['2wenc']; echo "</td></tr>
		<tr><td>Password</td><td>"; echo $_POST['2wpass']; echo "</td></tr></table>";
			break;
		
		default:
			echo "<tr><td><font color='red'>Please Select the correct option</font></td></tr></table>";
			break;
	}
	?>
			
		</center>
</body>
</html>

<?php
include("footer.php");
?>