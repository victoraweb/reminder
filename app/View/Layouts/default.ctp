<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('Kalax', 'Reminder System');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		// echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="container">
		<div id="header">
			<h1>
				<?php echo $this->Html->link('home', array('controller' => 'reminders', 'action' => 'index')); ?>

				<?php $user = $this->Session->read('Auth.user'); ?>
			</h1>

			<!-- If user NOT logged in -->
			<?php if(!$this->Session->read('Auth.User')): ?>
					<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?>
					<?php echo $this->Html->link('Sign up', array('controller' => 'users', 'action' => 'add')); ?>
			<?php endif; ?> 
			
			<!-- If user logged in -->
			<?php if($this->Session->read('Auth.User')): ?>
				<?php echo 'Hello, ' . AuthComponent::user('username') . ' (' . AuthComponent::user('role') . ')'; ?>

				<br />
				<br />

				<?php echo $this->Html->link('Reminders', array('controller' => 'reminders', 'action' => 'index')); ?>

				<?php if($user['role'] === 'admin') echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?>


				<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>

			<?php endif; ?>
		
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
