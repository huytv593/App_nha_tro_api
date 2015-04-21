<div class="nhatros form">
<?php echo $this->Form->create('Nhatro'); ?>
	<fieldset>
		<legend><?php echo __('Edit Nhatro'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
		echo $this->Form->input('imga');
		echo $this->Form->input('imgb');
		echo $this->Form->input('imgc');
		echo $this->Form->input('imgd');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Nhatro.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Nhatro.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Nhatros'), array('action' => 'index')); ?></li>
	</ul>
</div>
