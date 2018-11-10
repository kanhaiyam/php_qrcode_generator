<HTML>
<Head>
<link rel="stylesheet" type="text/css" href="styles.css">
<Title>QR Code Generator </Title>
</Head>
<?php
 include("menu.php");
 ?>

<HR>
<H1 align="center">QR Code Generator</H1><HR><BR>

	<form id="qrcode-data-form" method="post" action="page2.php">
		<table align="center" border="0">
		<tr><td>Select Type:</td><td><select name="no1">
			<option value="Null" Selected>---Select One---</option>
  			<option value="Text">Simple Text</option>
  			<option value="Link">Link</option>
  			<option value="Bookmark">Bookmark</option>
  			<option value="SMS">SMS</option>
  			<option value="Phone">Phone Number</option>
  			<option value="C-Info">Contact Info</option>
  			<option value="Email">E-Mail</option>
  			<option value="WiFi">WiFi Network Connection</option>
  		</select></td></tr> 
  		<tr><td colspan="2" align="left"><input type="Submit" value="Submit" name="page1"></td></tr>
        </table>  	
  	</form>

<HTML>

<?php
include("footer.php");
?>