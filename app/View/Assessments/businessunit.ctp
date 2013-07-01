  	<div style="margin-bottom: 10px;">
	  		<?= $this->Form->input('BusinessUnit.name', array('default'=>$business_unit['BusinessUnit']['name'], 'placeholder'=>'Name', 'required')); ?>
	  	</div>

		<div><em style="color: #AA0000;">Expand each section below to select the KPIs for this Business Unit</em></div>

        <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Environmental <span class="badge"><span id="E_selected">0</span> / <?= count($env_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $env_indicators as $indicator ): ?>
                  			<div style="margin-bottom: 4px;">
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('data-type'=>'E', 'hiddenField' => false, 'checked'=>(array_key_exists($indicator['Indicator']['id'], $indicators) ? TRUE : FALSE))); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                    Social <span class="badge"><span id="S_selected">0</span> / <?= count($soc_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $soc_indicators as $indicator ): ?>
                  			<div style="margin-bottom: 4px;">
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('data-type'=>'S', 'hiddenField' => false, 'checked'=>(array_key_exists($indicator['Indicator']['id'], $indicators) ? TRUE : FALSE))); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
              <div class="accordion-group">
                <div class="accordion-heading relative">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                    Governance <span class="badge"><span id="G_selected">0</span> / <?= count($gov_indicators); ?></span>
                  </a>
                </div>
                <div id="collapseThree" class="accordion-body collapse">
                  <div class="accordion-inner">

                  		<?php foreach( $gov_indicators as $indicator ): ?>
                  			<div>
                  				<?= $this->Form->checkbox('indicator.'.$indicator['Indicator']['id'], array('data-type'=>'G', 'hiddenField' => false, 'checked'=>(array_key_exists($indicator['Indicator']['id'], $indicators) ? TRUE : FALSE))); ?>
                  				<?= $this->Form->label('indicator.'.$indicator['Indicator']['id'], '<span class="label" style="font-size: 12px;">'.$indicator['Indicator']['indicator'].'</span> '.$indicator['Indicator']['name'], array('style'=>'display:inline; font-size:12px;')); ?>
                  			</div>
                  		<?php endforeach; ?>

                  </div>
                </div>
              </div>
        </div>

        <?= $this->Form->hidden('BusinessUnit.id', array('default'=>$business_unit['BusinessUnit']['id'])); ?>


<script>
var countChecked = function() {
  $('#E_selected').html($( "input[data-type=E]:checked" ).length);
  $('#S_selected').html($( "input[data-type=S]:checked" ).length);
  $('#G_selected').html($( "input[data-type=G]:checked" ).length);
};
countChecked();
 
$( "input[type=checkbox]" ).on( "click", countChecked );
</script>