<div class="nhatros form">
<?php echo $this->Form->create('Nhatro',  array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Nhatro'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('created_by');
		echo $this->Form->input('created_at');
		echo $this->Form->input('end_at');
		echo $this->Form->input('price');
		echo $this->Form->input('city');
		echo $this->Form->input('district');
		echo $this->Form->input('precinct');
		echo $this->Form->input('street');
		echo $this->Form->input('address');
		echo $this->Form->input('area');
		echo $this->Form->input('info');
		echo $this->Form->input('imguploada', array('type' => 'file'));
		echo $this->Form->input('imgb', array('type' => 'file'));
		echo $this->Form->input('imgc', array('type' => 'file'));
		echo $this->Form->input('imgd', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Nhatros'), array('action' => 'index')); ?></li>
	</ul>
</div>
