<html>
<head>
<title>Halaman Masuk</title>
<!--/. menggunakan css yang berasal dari folder assets/css  -->
<link type="text/css" href="assets/css/index.css" rel="stylesheet" /> 
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="kotaklogin">
		<div class="kotakloginh">
            				<b>	Aplikasi Kasir
							<!--/. akan mengkoneksi database dengan menggunkan controller masuk class login  -->
            				<?php echo form_open('masuk/login'); ?>					
		<div class="kotakloginb"><center>
						<table border="0"> <!--/. table  -->
                				<tr><td align="left" align="center"></td><span><input type="text" name="username" class="textbox" id="active" placeholder="Username"></td></tr>
					        <tr><td align="left" align="center"></td><td align="right"><input type="password" name="password" class="password" placeholder="Password"></td></tr>
			    				<div class="sign">
						<div class="submit">
						  <tr><td colspan="2" align="right"><input type="submit" name="submit"  value="Masuk" ></td></tr>						
						</div>
						</div>
							<div class="clear"> </div>
							</table></center>
	  </form></div>
	  <!--/. footer  -->
	  <div class="copy-right">
<center><font face="Consolas" size="1">&copy; Copyright Politeknik Negeri Batam 2016</font></center>
</div>
</body>
</html>