<div class="row-fluid header">
	<div class="span12">		
		<h3 style="float:none;">Projects</h3>
		<h5>List of all projects</h5>
        <a href="/projects/new" class="btn-glow icon primary pull-right">
            <i class="icon-plus"></i> Add New Project
        </a>		
	</div>
</div>

<div class="row-fluid section">
	<div class="span12">
		<table class="table table-striped table-highlight">
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Client</th>
		      <th>Scope</th>
		      <th>Category</th>
		      <th>Status</th>
		      <th>Created</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach( $projects as $project ): ?>
		  	<tr>
		  		<td><?= $this->Html->link($project['Project']['name'], '/projects/view/'.$project['Project']['id']); ?></td>
		  		<td><?=$this->Html->link($project['Client']['name'], '/clients/view/'.$project['Project']['client_id']); ?></td>
		  		<td><?= $project['Project']['scope']; ?></td>
		  		<td>Category <?= $project['Project']['category']; ?></td>
		  		<td><?= $project['Project']['status']; ?></td>
		  		<td><?= $project['Project']['created']; ?></td>
		  	</tr>
		  	<?php endforeach; ?>
		  	<?php if( empty($projects) ): ?>
		  	<tr>
		  		<td colspan="6">No projects found.</td>
		  	</tr>
		  	<?php endif; ?>	
		  </tbody>
		</table>					
	</div>
</div>
