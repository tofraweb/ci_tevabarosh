<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<title><?php echo $_SESSION['title'];?></title>
</head>
<body>
	<div>
		<a href='<?php echo site_url('home')?>'>דף הבית</a> |
		<!--
		<a href='<?php //echo site_url('admin/customers_management')?>'>Customers</a> |
		<a href='<?php //echo site_url('admin/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('admin/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('admin/offices_management')?>'>Offices</a> |
		<a href='<?php echo site_url('admin/employees_management')?>'>Employees</a> |
		<a href='<?php echo site_url('admin/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('admin/multigrids')?>'>Multigrid [BETA]</a>|
		-->
		<a href='<?php echo site_url('admin/species_management')?>'>ניהול מינים</a>|
		<a href='<?php echo site_url('admin/genus_management')?>'>ניהול סוגים</a>|
		<a href='<?php echo site_url('admin/family_management')?>'>ניהול משפחות</a>|
		<a href='<?php echo site_url('admin/orders')?>'>ניהול סדרות</a>|
		<a href='<?php echo site_url('admin/plant_properties_management')?>'>ניהול מאפייני צמיים</a>|
		<a href='<?php echo site_url('admin/pictures_management')?>'>ניהול תמונות</a>|
		<a href='<?php echo site_url('admin/audio_management')?>'>ניהול אודיו</a>|
		<a href='<?php echo site_url('login/logout')?>'>יציאה</a>

	</div>
	<div style='height:20px;'></div>
    <div>
		<?php
		echo $output; ?>
    </div>
</body>
</html>
