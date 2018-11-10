<HTML>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
	<title>QR Code Generator</title>
	</head>
	<?php
	$no1 = $_REQUEST['no1'];

?>

<?php
 include("menu.php");
 ?>
<HR>
<H1 align="center">QR Code Generator</H1><HR><BR>
	<form id="qrcode-data-form" method="post" action="page2.php">
		<table align="center">
		<tr><td>Select Type:</td><td><select name="no1">
			<option value="Null" <?php if($no1 == 'Null') echo "Selected"; ?> >---Select One---</option>
  			<option value="Text" <?php if($no1 == 'Text') echo "Selected"; ?> >Simple Text</option>
  			<option value="Link" <?php if($no1 == 'Link') echo "Selected"; ?> >Link</option>
  			<option value="Bookmark" <?php if($no1 == 'Bookmark') echo "Selected"; ?> >Bookmark</option>
  			<option value="SMS" <?php if($no1 == 'SMS') echo "Selected"; ?> >SMS</option>
  			<option value="Phone" <?php if($no1 == 'Phone') echo "Selected"; ?> >Phone Number</option>
  			<option value="C-Info" <?php if($no1 == 'C-Info') echo "Selected"; ?> >Contact Info</option>
  			<option value="Email" <?php if($no1 == 'Email') echo "Selected"; ?> >E-Mail</option>
  			<option value="WiFi" <?php if($no1 == 'WiFi') echo "Selected"; ?> >WiFi Network Connection</option>
  </select> </td></tr>

  		<tr><td colspan="2" align="left"><input type="Submit" value="Submit" name="page1"></td></tr>
  	</form>

  	<form id="qr-data" method="post" action="final.php">
  		<table align="center">
  		<?php 
  			switch($no1) {
  				case 'Text':
  					echo '<tr><td valign="top">Enter the text</td><td><textarea rows ="4" cols="50" value="" name="2Text" placeholder="Enter the text"> 
  					</textarea></td>
            		<input type="hidden" name="Type" value="Text">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'Link':
  					echo '<tr><td>Link</td><td><input type="text" name="2Link" placeholder="Enter the link here"></td></tr>
            		<input type="hidden" name="Type" value="Link">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'Bookmark':
  					echo '<tr><td>Name</td><td><input type="text" name="2bname" placeholder="Bookmark Name"></td></tr>
  					<tr><td>Link</td><td><input type="text" name="2blink" placeholder="Bookmark Link"></td></tr>
            		<input type="hidden" name="Type" value="Bookmark">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'SMS':
  					echo '<tr><td>Number</td><td><input type="text" name="2smsno" placeholder="Phone Number"></td></tr>
  					<tr><td valign="top">Message</td><td><textarea rows = "4" cols = "50" name ="2smsmsg">
  					</textarea></td></tr>
            		<input type="hidden" name="Type" value="SMS">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'Phone':
  					echo '<tr><td>Number</td><td><input type="text" name="2smsno" placeholder="Phone Number"></td></tr>
            		<input type="hidden" name="Type" value="Phone">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'C-Info':
  					echo '<tr><td>First Name</td><td><input type="text" name="2fname" placeholder="First Name"></td></tr>
  					<tr><td>Last Name</td><td><input type="Text" name="2lname" placeholder="Last Name"></td></tr>
  					<tr><td>Number</td><td><input type = "text" name="2cphone" placeholder="Phone Number"></td></tr>
  					<tr><td>E-Mail</td><td><input type = "text" name="2cemail" placeholder="E-Mail"></td></tr>
  					<tr><td valign="top">Address</td><td><textarea rows = "4" cols = "50" name="2cadd"></textarea></td></tr>
            		<input type="hidden" name="Type" value="C-Info">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'Email':
  					echo '<tr><td>E-Mail</td><td><input type="text" name="2eadd" placeholder="E-Mail"></td></tr>
  					<tr><td>Subject</td><td><input type="text" name="2esub" placeholder="E-Mail Subject"></td></tr>
  					<tr><td valign="top">Meassage</td><td><textarea rows = "10" cols = "90" name="2emsg"> </textarea></td></tr> 
            <input type="hidden" name="Type" value="Email">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;

  				case 'WiFi':
  					echo '<tr><td>Name</td><td><input type="text" name="2wname" placeholder="WiFi Name"></td></tr>
  					<tr><td>Network Type</td>
  					<td><select name="2wenc">
  						<option value="WEP">WEP</option>
  						<option value="WPA">WPA/WPA2</option>
  					</select></td></tr>
  					<tr><td>Password</td><td><input type="Password" name="2wpass" placeholder="Password"></td></tr>
            <input type="hidden" name="Type" value="WiFi">
  					<tr><td colspan="2" align="left"><input type="Submit" value="Generate" name="page2"></td></tr></table> ';
  					break;
  				default:
  					echo '<tr><td><font color="red">Please select a valid option from the list above</font></td></tr></table>';
  			}
  		?>
  	</form>
</HTML>

<?php
include("footer.php");
?>