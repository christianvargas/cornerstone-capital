<div class="row-fluid header">
	<div class="span12">		
		<h3 style="float:none;">Clients</h3>
		<h5>List of all clients</h5>
	    <a href="#add_client" role="button" class="btn btn-small btn-success pull-right" data-toggle="modal">
	    	<i class="icon-plus"></i> Add New
	    </a>
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<table class="table table-striped table-highlight">
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Assessments</th>
		      <th>Projects</th>
		      <th>City</th>
		      <th>State/Province</th>
		      <th>Country</th>
		      <th width="1%">&nbsp;</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach( $clients as $client ): ?>
		  	<tr>
		  		<td><?= $this->Html->link($client['Client']['name'], '/clients/view/'.$client['Client']['id']); ?></td>
		  		<td><?= count($client['Assessment']); ?></td>
		  		<td><?= count($client['Project']); ?>
		  		<td><?= $client['Client']['city']; ?></td>
		  		<td><?= $client['Client']['state']; ?></td>
		  		<td><?= $client['Client']['country']; ?></td>
		  		<td>
		  			<a href="/clients/delete/<?= $client['Client']['id']; ?>" class="btn btn-mini btn-danger" onClick="return confirm('Are you sure you want to delete this client?')"><i class="icon-remove"></i></a>
		  		</td>
		  	</tr>
		  	<?php endforeach; ?>
		  	<?php if( empty($clients) ): ?>
		  	<tr>
		  		<td colspan="6">No clients found.</td>
		  	</tr>
		  	<?php endif; ?>
		  </tbody>
		</table>					
	</div>
</div>


<!-- ADD CLIENT MODAL -->
<div id="add_client" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  	<?php 
		echo $this->Form->create(NULL, array(
		    'url' => '/clients/add',
		    'class' => 'form-horizontal',
		    'inputDefaults' => array(
		        'label' => false,
		        'div' => false
		    )
		));
  	?>
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Add Client</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="name">Name</label>
		    <div class="controls">
		      <?= $this->Form->input('Client.name', array('placeholder'=>'Client Name')); ?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="address">Address</label>
		    <div class="controls">
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.address', array('placeholder'=>'Street Address')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.city', array('placeholder'=>'City')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.state', array('placeholder'=>'State/Province')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.zip', array('placeholder'=>'Postal Code')); ?></div>
		      <div style="margin-bottom: 8px;">
		      	<?php
					echo $this->Form->input('Client.country', array(
					    'options' => $countries,
					    'empty' => '-- Please Select --',
					    'selected' => 'US',
					));
		      	?>
		      </div>
		    </div>
		  </div>

	  </div>
	  <div class="modal-footer">
	    <input type="submit" class="btn btn-success" value="Save" />
	    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
	  </div>
	</form>
</div>
<!-- ADD CLIENT MODAL -->