<div class="row-fluid header">
	<div class="span12">		
		<h3 style="float:none;">Key Performance Indicators</h3>
		<h5>List of all KPIs</h5>
	    <a href="#add_client" role="button" class="btn btn-small btn-success pull-right" data-toggle="modal">
	    	<i class="icon-plus"></i> Add New
	    </a>
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<ul class="nav nav-tabs" id="myTab">
		 	<?php foreach( $indicators as $type => $group ): ?>
			<li><a href="#<?= $type; ?>"><?= ucwords($type); ?></a></li>
			<?php endforeach; ?>
		</ul>

		<div class="tab-content">
			<?php foreach( $indicators as $type => $group ): ?>		 
				<div class="tab-pane" id="<?= $type; ?>"> 
					<table class="table table-striped table-highlight">
					  <thead>
					    <tr>
					      <th width="1%">Code</th>
					      <th width="30%">Name</th>
					      <th width="70%">Description</th>
					      <th width="1%">Notes</th>
					      <th width="1%">&nbsp;</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach( $group as $indicator ): ?>
					  	<tr>
							<td><a data-target="#myModal" href="/indicators/add/<?= $indicator['Indicator']['id']; ?>" data-toggle="modal"><?= $indicator['Indicator']['indicator']; ?></a></td>
					  		<td><?= $indicator['Indicator']['name']; ?></td>
					  		<td><?= $indicator['Indicator']['description']; ?></td>
					  		<td><?= strlen(trim($indicator['Indicator']['notes'])) > 0 ? '<i class="icon-ok"></i>' : '&nbsp;'; ?></td>
					  		<td>
					  			<a href="/indicators/delete/<?= $indicator['Indicator']['id']; ?>" class="btn btn-mini btn-danger" onClick="return confirm('Are you sure you want to delete this KPI?')"><i class="icon-remove"></i></a>
					  		</td>
					  	</tr>
					  	<?php endforeach; ?>
					  	<?php if( empty($group) ): ?>
					  	<tr>
					  		<td colspan="6">No indicators found.</td>
					  	</tr>
					  	<?php endif; ?>
					  </tbody>
					</table>
				</div>
			<?php endforeach; ?>
		</div>					
	</div>
</div>


<div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
	echo $this->Form->create('Indicator', array(
		'url' => '/indicators/save',
	    'inputDefaults' => array(
	        'label' => false,
	        'div' => false
	    ),
	    'class' => 'form-horizontal'
	));
	?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit KPI</h3>
  </div>
  <div class="modal-body" style="max-height:500px;">
    
  </div>
  <div class="modal-footer">
	    <input type="submit" class="btn btn-success" value="Save" />
	    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>


<script>
	$('#myTab a:first').tab('show'); // Select first tab

	$('body').on('hidden', '.modal', function () {
	 	$(this).removeData('modal');
	});	
</script>

