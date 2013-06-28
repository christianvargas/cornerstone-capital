<div class="row-fluid header">
	<div class="span12">
		<h3>Client Details</h3>
	</div>
</div>

<div class="row-fluid section">
	<div class="span5 well">
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Client</span>
			</div>
			<div class="span9">
				<?= $client['Client']['name']; ?>
			</div>
		</div>
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Address</span>
			</div>
			<div class="span9">
				<?= $client['Client']['address']; ?> <br />
				<?= $client['Client']['city']; ?>, <?= $client['Client']['state']; ?> <?= $client['Client']['zip']; ?> <br />
				<?= $client['Client']['country']; ?>
			</div>
		</div>

		<div class ="row-fluid" style="margin-top: 8px;">
			<div class="span0 offset3">
			    <a href="#add_client" role="button" class="btn btn-small btn-primary" data-toggle="modal">
			    	<i class="icon-pencil"></i> Edit
			    </a>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<ul class="nav nav-tabs" id="myTab">
		  <li class="active"><a href="#assessments">Assessments</a></li>
		  <li><a href="#projects">Projects</a></li>
		</ul>
		 
		<div class="tab-content">
		  <!-- ASSESSMENT TAB -->
		  <div class="tab-pane active" id="assessments"> 
		    <table class="table table-striped table-highlight">
		      <thead>
		        <tr>
					<th>Name</th>
					<th>Industry</th>
					<th>Business Units</th>
					<th>Status</th>
					<th>Created</th>
					<th width="1%">&nbsp;</th>
		        </tr>
		      </thead>
		      <tbody>
		      	<?php foreach( $client['Assessment'] as $assessment ): ?>
		      	<tr>
		      		<td><?= $this->Html->link($assessment['name'], '/assessments/edit/'.$assessment['id']); ?></td>
		      		<td><?= $assessment['Sector']['name']; ?></td>
		      		<td><?= count($assessment['BusinessUnit']); ?></td>
		      		<td><?= $assessment['status']; ?></td>
		      		<td><?= $assessment['created']; ?></td>
			  		<td>
			  			<a href="/assessments/delete/<?= $assessment['id']; ?>" class="btn btn-mini btn-danger" onClick="return confirm('Are you sure you want to delete this assessment?')"><i class="icon-remove"></i></a>
			  		</td>
		      	</tr>
		      	<?php endforeach; ?>
		      	<?php if( empty($client['Assessment']) ): ?>
		      	<tr>
		      		<td colspan="6">No assessments found.</td>
		      	</tr>
		      	<?php endif; ?>
		      </tbody>
		    </table>
		    <a href="#add_assessment" role="button" class="btn btn-small btn-success" data-toggle="modal">
		    	<i class="icon-plus"></i> Create Assessment
		    </a>
		  </div>
		  <!-- ASSESSMENT TAB -->


		  <!-- PROJECT TAB -->
		  <div class="tab-pane" id="projects"> 
		    <table class="table table-striped table-highlight">
		      <thead>
		        <tr>
					<th>Name</th>
					<th>Scope</th>
					<th>Category</th>
					<th>Status</th>
					<th>Created</th>
		        </tr>
		      </thead>
		      <tbody>
			  	<?php foreach( $client['Project'] as $project ): ?>
			  	<tr>
			  		<td><?= $this->Html->link($project['name'], '/projects/view/'.$project['id']); ?></td>
			  		<td><?= $project['scope']; ?></td>
			  		<td>Category <?= $project['category']; ?></td>
			  		<td><?= $project['status']; ?></td>
			  		<td><?= $project['created']; ?></td>
			  	</tr>
			  	<?php endforeach; ?>
			  	<?php if( empty($client['Project']) ): ?>
			  	<tr>
			  		<td colspan="6">No projects found.</td>
			  	</tr>
			  	<?php endif; ?>	
		      </tbody>
		    </table>
		    <a href="#add_team" role="button" class="btn btn-small btn-success" data-toggle="modal">
		    	<i class="icon-plus"></i> Create Project
		    </a>
		  </div>
		  <!-- PROJECT TAB -->

		</div>
	</div>
</div>

<!-- EDIT CLIENT -->
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
  	<?= $this->Form->hidden('Client.id', array('default'=>$client['Client']['id'])); ?>

	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Edit Client</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="name">Name</label>
		    <div class="controls">
		      <?= $this->Form->input('Client.name', array('default'=>$client['Client']['name'], 'placeholder'=>'Client Name')); ?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="address">Address</label>
		    <div class="controls">
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.address', array('default'=>$client['Client']['address'], 'placeholder'=>'Street Address')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.city', array('default'=>$client['Client']['city'], 'placeholder'=>'City')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.state', array('default'=>$client['Client']['state'], 'placeholder'=>'State/Province')); ?></div>
		      <div style="margin-bottom: 8px;"><?= $this->Form->input('Client.zip', array('default'=>$client['Client']['zip'], 'placeholder'=>'Postal Code')); ?></div>
		      <div style="margin-bottom: 8px;">
		      	<?php
					echo $this->Form->input('Client.country', array(
					    'options' => $countries,
					    'empty' => '-- Please Select --',
					    'selected' => $client['Client']['country'],
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
<!-- EDIT CLIENT -->


<!-- CREATE ASSESSMENT -->
<div id="add_assessment" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  	<?php 
		echo $this->Form->create(NULL, array(
		    'url' => '/assessments/add',
		    'class' => 'form-horizontal',
		    'inputDefaults' => array(
		        'label' => false,
		        'div' => false
		    )
		));
  	?>
  	<?= $this->Form->hidden('Assessment.client_id', array('default'=>$client['Client']['id'])); ?>

	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Create Assessment</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="name">Name</label>
		    <div class="controls">
		      <?= $this->Form->input('Assessment.name', array('placeholder'=>'Assessment Name','required')); ?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="address">Industry</label>
		    <div class="controls">
		    	<select name="Assessment[sector_id]" required>
		    		<option value="">-- Select Industry --</option>
			    	<?php foreach( $sectors as $sector ): ?>
			    	<optgroup label="<?= $sector['Sector']['name']; ?>">
			    		<?php foreach( $sector['children'] as $industry ): ?>
			    		<option value="<?= $industry['Sector']['id']; ?>"><?= $industry['Sector']['name']; ?></option>
			    		<?php endforeach; ?>
			    	</optgroup>
			    	<?php endforeach; ?>
		    	</select>
		    </div>
		  </div>

	  </div>
	  <div class="modal-footer">
	    <input type="submit" class="btn btn-success" value="Save" />
	    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
	  </div>
	</form>
</div>
<!-- CREATE ASSESSMENT -->