      <div class="control-group">
        <label class="control-label" for="name">Code</label>
        <div class="controls">
          <?= $this->Form->input('Indicator.indicator', array('default'=>$indicator['Indicator']['indicator'], 'placeholder'=>'Unique Code','required','label'=>false, 'style'=>'width:60px;')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
          <?= $this->Form->textarea('Indicator.name', array('default'=>$indicator['Indicator']['name'],'required','label'=>false, 'style'=>'width:300px;')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name">Description</label>
        <div class="controls">
          <?= $this->Form->textarea('Indicator.description', array('default'=>$indicator['Indicator']['description'],'required','label'=>false, 'rows'=>'5', 'style'=>'width:300px;')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name">Notes</label>
        <div class="controls">
          <?= $this->Form->textarea('Indicator.notes', array('default'=>$indicator['Indicator']['notes'],'label'=>false, 'rows'=>'5', 'style'=>'width:300px;')); ?>
        </div>
      </div>
      
      <?= $this->Form->hidden('Indicator.id', array('default'=>$indicator['Indicator']['id'])); ?>