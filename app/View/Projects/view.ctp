<div class="row-fluid header">
	<div class="span12">
		<h3>Project Details</h3>
	</div>
</div>

<div class="row-fluid section">
	<div class="span5 well">
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Project</span>
			</div>
			<div class="span9">
				<?= $project['Project']['name']; ?>
			</div>
		</div>
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Client</span>
			</div>
			<div class="span9">
				<?= $project['Client']['name']; ?>
			</div>
		</div>
		<div class ="row-fluid">
			<div class="span3">
				<span class="pull-right" style="font-weight:bold;">Address</span>
			</div>
			<div class="span9">
				<?= $project['Client']['address']; ?> <br />
				<?= $project['Client']['city']; ?>, <?= $project['Client']['state']; ?> <?= $project['Client']['zip']; ?> <br />
				<?= $project['Client']['country']; ?>
			</div>
		</div>
		<div class ="row-fluid" style="margin-top: 8px;">
			<div class="span0 offset3">
			    <a href="#edit_project" role="button" class="btn btn-small btn-primary" data-toggle="modal">
			    	<i class="icon-pencil"></i> Edit
			    </a>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<ul class="nav nav-tabs" id="myTab">
		  <li class="active"><a href="#team">Team Members</a></li>
		  <li><a href="#files">Files</a></li>
		</ul>
		 
		<div class="tab-content">
		  <div class="tab-pane active" id="team"> 
		    <table class="table table-striped table-highlight">
		      <thead>
		        <tr>
					<th>Name</th>
					<th>Title</th>
					<th>Company</th>
					<th>Role</th>
					<th>Phone</th>
					<th>Email</th>
		        </tr>
		      </thead>
		      <tbody>
				<?php foreach( $team_members as $member ): ?>
				<tr>
					<td><?= $member['Team']['first'].' '.$member['Team']['last']; ?></td>
					<td><?= $member['Team']['title']; ?></td>
					<td><?= $member['Team']['company']; ?></td>
					<td><?= $member['Team']['role']; ?></td>
					<td><?= $member['Team']['phone']; ?></td>
					<td><?= $member['Team']['email']; ?></td>
				</tr>
		  		<?php endforeach; ?>
		      </tbody>
		    </table>
		    <a href="#add_team" role="button" class="btn btn-small btn-success" data-toggle="modal">
		    	<i class="icon-plus"></i> Add New
		    </a>
		  </div>
		  <div class="tab-pane" id="files">
			<?= $this->UploadForm->load($project['Project']['id']); ?>		
		  </div>
		</div>
	</div>
</div>

<div id="add_team" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<form action="/projects/add/<?= $project['Project']['id']; ?>" method="POST" class="form-horizontal">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Add Team Member</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="first">First</label>
		    <div class="controls">
		      <input type="text" name="Team[first]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="last">Last</label>
		    <div class="controls">
		      <input type="text" name="Team[last]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="title">Title</label>
		    <div class="controls">
		      <input type="text" name="Team[title]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="company">Company</label>
		    <div class="controls">
		      <input type="text" name="Team[company]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="role">Role</label>
		    <div class="controls">
		      <input type="text" name="Team[role]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="phone">Phone</label>
		    <div class="controls">
		      <input type="tel" name="Team[phone]" placeholder="">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="email">Email</label>
		    <div class="controls">
		      <input type="email" name="Team[email]" placeholder="">
		    </div>
		  </div>
		  <input type="hidden" name="Team[project_id]" value="<?= $project['Project']['id']; ?>" />

	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <input type="submit" class="btn btn-success" value="Save" />
	  </div>
	</form>
</div>


<!-- EDIT PROJECT -->
<div id="edit_project" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  	<?php 
		echo $this->Form->create(NULL, array(
		    'url' => '/projects/add',
		    'class' => 'form-horizontal',
		    'inputDefaults' => array(
		        'label' => false,
		        'div' => false
		    )
		));
  	?>
  	<?= $this->Form->hidden('Project.id', array('default'=>$project['Project']['id'])); ?>

	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Edit Project</h3>
	  </div>
	  <div class="modal-body">
	  	
		  <div class="control-group">
		    <label class="control-label" for="name">Name</label>
		    <div class="controls">
		      <?= $this->Form->input('Project.name', array('default'=>$project['Project']['name'], 'placeholder'=>'Project Name')); ?>
		    </div>
		  </div>

	  </div>
	  <div class="modal-footer">
	    <input type="submit" class="btn btn-success" value="Save" />
	    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
	  </div>
	</form>
</div>
<!-- EDIT PROJECT -->