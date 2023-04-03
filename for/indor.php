<!DOCTYPE html>
<html>
<head>
	<title>Exemplo FOR</title>
</head>
<body>
	<select>
		<?php for ($i=date("Y"); $i>=date("Y")-100; $i--) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php } ?>		
	</select>
</body>
</html>