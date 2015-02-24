<?php 
    $userId = AuthComponent::user('id'); 
?>
<div class="row-fluid" style="margin-top:60px;">

<table class="table table-hover table-bordered">
    <?php if (!empty($posts)) { ?>
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('title', 'Title'); ?></th>
            <th><?php echo __('Body'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Created Date'); ?></th>
            <?php  
            if(!empty($userId)) { ?> <th>Action</th> <?php } ?>
        </tr>
    </thead>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tbody>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php 
                echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); 
                ?>
            </td>
            <td>
              <?php
                $subBlog = substr($post['Post']['body'], 0, 50);
                echo $subBlog." ...";
              ?>
            </td>
            <td><?php echo $post['Post']['created']; ?></td>
            <?php 
                if(!empty($userId)) { ?>
            <td>
            <?php 
                if($userId == $post['Post']['user_id']) {
                    echo $this->Form->postLink('Delete', array(
                                                               'controller' => 'posts', 
                                                               'action' => 'delete', $post['Post']['id'],
                                                               ), 
                                                               array( 
                                                                    'class' =>  'btn btn-xs btn-danger',
                                                                    'confirm' => 'Are you sure?',
                                                                    ),
                                                               array('form' => array('class' => 'inline-form'
                                                                    )));
                    echo $this->Html->link('Edit', array(
                                                        'controller' => 'posts',
                                                        'action' => 'edit', $post['Post']['id']
                                                        ),
                                                        array(
                                                              'class' => 'btn btn-xs btn-primary',
                                                              ));
                    }
            ?>
            </td>
            <?php  } ?>
            
            
        </tr>
    </tbody>
    <?php endforeach; 
      } else { ?>
      <tr>
        <td colspan="5">
          No one created post yet, you can add post by clicking 
          <?php 
            echo $this->Html->link('Add post', array(
                                            'controller' => 'posts',
                                            'action' => 'add'
                                          ),
                                          array(
                                            'class' => 'btn btn-xs btn-primary',
                                          ));
          ?>
        </td></tr>
    <?php  } ?>

</table>
<?php echo $this->element('pagination'); ?>
</div>