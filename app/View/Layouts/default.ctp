<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = "Blogs";//__d('cake_dev', 'Home');
?>
<!DOCTYPE html>
<head>
	<?php //echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->script(array('jquery-1.11.2.min', 'bootstrap'));
		echo $this->Html->css(array('bootstrap.min', 'style', 'bootstrap-responsive.min','signin'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>



	<?php echo $this->element('Common' . DS . 'header'); ?>
	<div class="container">

		<?php echo $this->Session->flash(); ?>
		
		<?php echo $this->fetch('content'); ?>
	</div>
	<div id="footer">
		
	</div>
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
