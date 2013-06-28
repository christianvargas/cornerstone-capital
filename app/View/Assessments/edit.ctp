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
		<h4>Business Units</span></h4>
		<table class="table table-highlight table-condensed">
			<thead>
				<tr>
					<th>Name</th>
					<th>Environmental</th>
					<th>Social</th>
					<th>Governance</th>
					<th>Indicators</th>
					<th>Created</th>
					<th width="1%">&nbsp;</th>
				</tr>				
			</thead>
			<tbody>
				<?php foreach( $assessment['BusinessUnit'] as $business_unit ): ?>
				<tr>
					<td><?= $business_unit['name']; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?= count($business_unit['BusinessUnitIndicator']); ?></td>
					<td><?= $business_unit['created']; ?></td>
					<td style="white-space:nowrap;">
						<!--
						<a href="#" class="btn btn-mini btn-primary"><i class="icon-pencil"></i></a>
						&nbsp;
					-->
						<a href="#" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a>						
					</td>
				</tr>
				<?php endforeach; ?>
				<?php if( empty($assessment['BusinessUnit']) ): ?>
				<tr>
					<td colspan="10">No business units found.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<a href="#add_team" role="button" class="btn btn-small btn-success" data-toggle="modal"><i class="icon-plus"></i> Add New</a>
	</div>

	<div class="span7">

	</div>
</div>

<div id="add_team" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
	echo $this->Form->create('User', array(
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

	  	<div style="margin-bottom: 10px;">
	  		<input type="text" name="assessment[name]" placeholder="Name" required />
	  	</div>

        <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Environmental <span class="badge"><?= count($env_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $env_indicators as $indicator ): ?>
                  			<div style="margin-bottom: 4px;">
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('hiddenField' => false)); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Social <span class="badge"><?= count($soc_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $soc_indicators as $indicator ): ?>
                  			<div style="margin-bottom: 4px;">
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('hiddenField' => false)); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                    Governance <span class="badge"><?= count($gov_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $gov_indicators as $indicator ): ?>
                  			<div>
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('hiddenField' => false)); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
        </div>

	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <input type="submit" class="btn btn-success" value="Save" />
	  </div>
	</form>
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