<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description" content="BALANGA CITY Disaster Risk Reduction Management Office (CDRRMO), as known today, was established year 2008 as City Disaster Operation Center headed by Engr. Noli Dizon, with around 12 personnel.">
	<meta name="author" content="AMA Students">

	<meta name="base_url" content="<?php echo BASE_URL() ;?>">

	<title>
		<?= $title ;?>
	</title>

    <!-- vendor css -->
	<link href="<?php echo base_url() . 'assets/lib/font-awesome/css/font-awesome.css' ;?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/lib/Ionicons/css/ionicons.css" rel="stylesheet' ;?>">
	

	<!-- AdditionalCSS -->
	<?php if(isset($additional_css)) : ?>
	<?php foreach($additional_css as $css): ?>
	<link rel="stylesheet" href="<?php echo base_url() . $css ;?>">
	<?php endforeach; ?>
	<?php endif; ?>

	<!-- Starlight CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/starlight.css' ;?>">
</head>

<body>

    <?= $content ;?>

    <script src="<?php echo base_url() . 'assets/lib/jquery/jquery.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/popper.js/popper.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/bootstrap/bootstrap.js' ;?>"></script>

</body>

</html>