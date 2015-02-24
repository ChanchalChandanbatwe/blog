<!-- File: /app/View/Posts/add.ctp -->
<div class="page-header">
  <div class="">
    <h3><?php echo __('Edit profile'); ?></h3>
  </div>
    <div class="modal-body">
      <?php
      echo $this->BootstrapForm->create('User', $inputDefaults);
      //echo $this->BootstrapForm->input('User.id', array('type' => 'hidden', 'value' => $userId));

      echo $this->BootstrapForm->input('User.first_name', array(
                'class' => 'form-control',
              ));
      echo $this->BootstrapForm->input('User.last_name', array(
                'class' => 'form-control',
              ));
      ?>
    </div>
  </div>
  <div class="modal-footer">
      <?php
        echo $this->BootstrapForm->submit(
          __('Update'),
          array(
            'class'=>'btn btn-success',
            'div' => false
          )
        );
      ?>
    </div>
<?php echo $this->BootstrapForm->end(); ?>