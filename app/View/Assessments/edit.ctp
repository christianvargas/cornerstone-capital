<div class="row-fluid header">
	<div class="span12">
		<h3>Assessment Details</h3>
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
				<span class="pull-right" style="font-weight:bold;">Name</span>
			</div>
			<div class="span9">
				<?= $assessment['Assessment']['name']; ?>
			</div>
		</div>
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Industry</span>
			</div>
			<div class="span9">
				<?= $assessment['Sector']['name']; ?>
			</div>
		</div>

		<div class ="row-fluid" style="margin-top: 8px;">
			<div class="span0 offset3">
			    <a href="#edit_assessment" role="button" class="btn btn-small btn-primary" data-toggle="modal">
			    	<i class="icon-pencil"></i> Edit
			    </a>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<h4>Business Units </span></h4>
		<table class="table table-highlight table-condensed">
			<thead>
				<tr>
					<th width="30%">Name</th>
					<th width="10%">Environmental</th>
					<th width="10%">Social</th>
					<th width="10%">Governance</th>
					<th width="10%">Custom</th>
					<th width="10%">Total KPI</th>
					<th>Created</th>
					<th width="1%">&nbsp;</th>
				</tr>				
			</thead>
			<tbody>
				<?php foreach( $bunits as $business_unit ): ?>
				<tr>
					<td><a class="edit_unit_link" data-target="#myModal" href="/assessments/bunit/<?= $business_unit['BusinessUnit']['id']; ?>" data-toggle="modal"><?= $business_unit['BusinessUnit']['name']; ?></a></td>
					<td><?= $business_unit['BusinessUnit']['num_e']; ?></td>
					<td><?= $business_unit['BusinessUnit']['num_s']; ?></td>
					<td><?= $business_unit['BusinessUnit']['num_g']; ?></td>
					<td><?= $business_unit['BusinessUnit']['num_custom']; ?></td>
					<td><?= $business_unit['BusinessUnit']['total_kpi']; ?></td>
					<td><?= $business_unit['BusinessUnit']['created']; ?></td>
					<td><a href="/assessments/delete_unit/<?= $business_unit['BusinessUnit']['id']; ?>" class="btn btn-mini btn-danger" onClick="return confirm('Are you sure you want to delete this business unit?')"><i class="icon-remove"></i></a></td>
				</tr>
				<?php endforeach; ?>
				<?php if( empty($assessment['BusinessUnit']) ): ?>
				<tr>
					<td colspan="10">No business units found.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
		
		<!-- Add new -->
		<a data-target="#myModal" href="/assessments/bunit" class="btn btn-small btn-success" data-toggle="modal"><i class="icon-plus"></i> Add New</a>

	</div>

	<div class="span7">

	</div>
</div>


<!-- EDIT ASSESSMENT -->
<div id="edit_assessment" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
  	<?= $this->Form->hidden('Assessment.id', array('default'=>$assessment['Assessment']['id'])); ?>

	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Edit Assessment</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="name">Name</label>
		    <div class="controls">
		      <?= $this->Form->input('Assessment.name', array('default'=>$assessment['Assessment']['name'], 'placeholder'=>'Assessment Name','required')); ?>
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
			    		<option value="<?= $industry['Sector']['id']; ?>" <?= $assessment['Assessment']['sector_id'] == $industry['Sector']['id'] ? 'selected="selected"' : ''; ?>><?= $industry['Sector']['name']; ?></option>
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
<!-- EDIT ASSESSMENT -->

<div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
	echo $this->Form->create('Assessment', array(
		'url' => '/assessments/add_unit',
	    'inputDefaults' => array(
	        'label' => false,
	        'div' => false
	    ),
	    'class' => 'form-inline'
	));
	?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Business Unit</h3>
  </div>
  <div class="modal-body" style="max-height:500px;">
    
  </div>
  <div class="modal-footer">
        <?= $this->Form->hidden('BusinessUnit.assessment_id', array('default'=>$assessment['Assessment']['id'])); ?>
	    <input type="submit" class="btn btn-success" value="Save" />
	    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>

<script>
	$('body').on('hidden', '.modal', function () {
	 	$(this).removeData('modal');
	});	
</script>