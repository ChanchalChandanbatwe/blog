<!-- File: /app/View/Posts/add.ctp -->
<div class="page-header">
  <div class="">
    <h3><?php echo __('Add Post'); ?></h3>
  </div>
    <div class="modal-body">
      <?php
      $userId = AuthComponent::user('id');
      echo $this->BootstrapForm->create('Post', $inputDefaults);
      echo $this->BootstrapForm->input('Post.user_id', array('type' => 'hidden', 'value' => $userId));

      echo $this->BootstrapForm->input('Post.title', array(
                'class' => 'form-control',
              ));
      echo $this->BootstrapForm->input('Post.body', array(
                'row' =>  3,
                'class' => 'form-control',
              ));
      ?>
    </div>
  </div>
  <div class="modal-footer">
      <?php
        echo $this->BootstrapForm->submit(
          __('Save'),
          array(
            'class'=>'btn btn-success',
            'div' => false
          )
        );
      ?>
    </div>
<?php echo $this->BootstrapForm->end(); ?>