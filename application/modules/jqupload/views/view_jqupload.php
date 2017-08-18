<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Mail Apps</title>
 
</head>
<body>

<div id="container">
	  <form action="<?php echo base_url('mail/pro');?>" method="post" enctype="multipart/form-data">
	  <label> <h2> Silahkan Pilih Penerima THR Sesuai Keinginan Kamu (Yang gak disebut jangan marah ya, kan judul judulan): </h2> </label>
	  <br>
	  <h2> <input type="checkbox" name="rec[]" value="okkisetyawan@gmail.com"> OKKI <br> </h2>
	  <h2> <input type="checkbox" name="rec[]" value="nurmaulanimelis@gmail.com"> MELIS <br> </h2>
	  <h2> <input type="checkbox" name="rec[]" value="blekedeg@gmail.com"> TATANG <br> </h2>
	   <h2> <input type="checkbox" name="rec[]" value="file.princes@gmail.com"> PUTRI <br> </h2>
 
	  <br>
	  <button type="submit" name="submit"> Process </button>
	  </form>
</div>

</body>
</html>