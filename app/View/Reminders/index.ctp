<h1> Reminders </h1>

<?php echo $this->Html->link('Add reminder', array('controller' => 'reminders', 'action' => 'add'), array('class' => 'btn btn-mini btn-primary ')); ?>

	<h3> Reminders </h3>

<div class="table-responsive">

	<table class='table table-striped table-condensed table-hover'>

		<thead>
			<tr>
				<th> Reminder </th>
				<th> Date </th>
				<th> Customer </th>
				<th> Actions </th>
			</tr>
		</thead>

		<tbody>
			<?php if(!$toDoReminders) echo '<i> No reminders yet.</i>'; ?>
			<?php if($toDoReminders) ?>
			<?php foreach($toDoReminders as $reminder): ?>
				<tr>
					<!-- Reminder -->
					<td> 
						<?php echo $this->Html->link($reminder['Reminder']['title'], array('controller' => 'reminders', 'action' => 'view', $reminder['Reminder']['id'])); ?>
					</td>

					<!-- Date -->
					<td>
						<?php echo date('l jS \of F Y h:i:s A', strtotime($reminder['Reminder']['date'])); ?>
					</td>

					<!-- Costumer -->
					<td>
						<?php echo $reminder['User']['username']; ?>
					</td>

					<!-- Actions -->
					<td>
						<?php echo $this->Html->link('Close', array('controller' => 'reminders', 'action' => 'close', $reminder['Reminder']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Html->link('Edit', array('controller' => 'reminders', 'action' => 'edit', $reminder['Reminder']['id']), array('class' => 'btn btn-success btn-xs')); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>

	</table>
	<!-- End toDoReminders -->

	<h3> Closed reminders </h3>

<div class="table-responsive">

	<table class='table table-striped table-condensed table-hover'>
	
		<thead>
			<tr>
				<th> Reminder </th>
				<th> Date </th>
				<th> Customer </th>
				<th> Actions </th>
			</tr>
		</thead>
	
		<tbody>
			<?php foreach($closedReminders as $reminder): ?>
				<tr>
					<!-- Reminder -->
					<td> 
						<?php echo $this->Html->link($reminder['Reminder']['title'], array('controller' => 'reminders', 'action' => 'view', $reminder['Reminder']['id'])); ?>
					</td>

					<!-- Date -->
					<td>
						<?php echo date('l jS \of F Y h:i:s A', strtotime($reminder['Reminder']['date'])); ?>
					</td>

					<!-- Costumer -->
					<td>
						<?php echo $reminder['User']['username']; ?>
					</td>

					<!-- Actions -->
					<td>
						<?php echo $this->Html->link('Done', array('controller' => 'reminders', 'action' => 'reopen', $reminder['Reminder']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Html->link('Edit', array('controller' => 'reminders', 'action' => 'edit', $reminder['Reminder']['id']), array('class' => 'btn btn-success btn-xs')); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	
	</table>
	<!-- End doneReminders -->
</div>
<!-- End table-responsive -->

</div>
<!-- End responsive -->