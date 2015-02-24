<script type="text/javascript">
$(function() {
	$("#CommentViewForm").submit(function(data) {
		var url = $(this).attr("action");
		// make post request to add comment
		$.post(url, $(this).serialize(), function(response) {
			// if comment added successfully then prepend in html
			if(response.success == true) {
				var commentHtml = "<div><p><h3>" + response.first_name + " " + response.last_name  + "</h3></p><div>" + response.comment + "</div><hr></div>";
				$("#comments").prepend(commentHtml);
				// reset comment field
				$('#comment').val('');
				alert("Successful Request!");
				
			} else {
				alert("Unable to add the comment");

			}
		}, "json");
		return false;
	});
});  
</script>

	<div class="row-fluid" style="margin-top:60px;">
	<div class="span3">
	<?php 
	// show edit, delete menu to post owner only
	$userId = AuthComponent::user('id'); 
	if(!empty($userId) and $userId == $post['Post']['user_id']) {

	?>
	
		<div class="well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Menu</li>
				<li>
				<?php 
				echo $this->Form->postLink('Delete',  array(
				                                            'controller' => 'posts', 
				                                            'action' => 'delete', $post['Post']['id'],
				                                            ), 
				                                        array( 
				                                            'confirm' => 'Are you sure?',
				                                            ));
				?>
				</li><li>
				<?php
				echo $this->Html->link('Edit', array(
				                                    'controller' => 'posts',
				                                    'action' => 'edit', $post['Post']['id']
				                                    ));
				?>
				</li>
			</ul>
		</div>
	
	<?php } ?>
	</div>
	<!-- display post -->
	<div class="span6 offset3">
	<h1><?php echo h($post['Post']['title']); ?></h1>
	<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
	<p><?php echo h($post['Post']['body']); ?></p>

<div>
	<?php 
	//comment form
	$userId = AuthComponent::user('id');
	if(!empty($userId)) { 
		echo $this->BootstrapForm->create('Comment', array('url' => array(	'controller'	=> 'Comments',
																		'action' 	=>	'add',

																	)),
											$inputDefaults);
		echo $this->BootstrapForm->input('post_id', array(	'type'	=> 'hidden',
													'value'	=> $post['Post']['id'],
													'id' 	=> 'post_id',
													'div'	=> false,
												));
		echo $this->BootstrapForm->input('user_id', array(	'type'	=> 'hidden',
													'id' 	=> 'user_id', 
													'value' => $userId,
												)); 
		echo $this->BootstrapForm->input('comment', array(
													'rows'	=> '3',
													'id'	=> 'comment',
													'class' => 'form-control',
												));
		echo $this->BootstrapForm->submit('Submit', array(	'id'	=> 'Submit', 
													'name'	=> 'Submit',
													'class'	=>	'btn btn-success',	
												)); 
		echo $this->BootstrapForm->end(); 
	} ?>
</div>
<div class="container-fluid" id="comments">
	<?php
	// display comments
	foreach($post['Comment'] as $key => $post) : 

			 echo  "<div><h3>" . $post['User']['first_name'] . " " . $post['User']['last_name'] . "</h3>";
			 echo "<div>" . $post['comment'] . "</div><hr></div>";
	endforeach;	
	?>
</div>


		</div>
</div>