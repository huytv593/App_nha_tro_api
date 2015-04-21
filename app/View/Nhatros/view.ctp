<div class="nhatros view">
<h2><?php echo __('Nhatro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End At'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['end_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precinct'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['precinct']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Info'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['info']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imga'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['imga']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imgb'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['imgb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imgc'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['imgc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imgd'); ?></dt>
		<dd>
			<?php echo h($nhatro['Nhatro']['imgd']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nhatro'), array('action' => 'edit', $nhatro['Nhatro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nhatro'), array('action' => 'delete', $nhatro['Nhatro']['id']), array(), __('Are you sure you want to delete # %s?', $nhatro['Nhatro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nhatros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nhatro'), array('action' => 'add')); ?> </li>
	</ul>
</div>
