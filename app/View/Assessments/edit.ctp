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
			    <a href="#add_client" role="button" class="btn btn-small btn-primary" data-toggle="modal">
			    	<i class="icon-pencil"></i> Edit
			    </a>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid section">
	<div class="span5">
		<h4>Business Units <span class="badge"><?= isset($assessment['BusinessUnit']) ? count($assessment['BusinessUnit']) : 0; ?></span></h4>
		<a href="#add_team" role="button" class="btn btn-small btn-success" data-toggle="modal"><i class="icon-plus"></i> Add New</a>
	</div>

	<div class="span7">
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

<div class="modal-backdrop hide"></div>