<?php 
echo $this->BootstrapForm->create('User', array('class' => 'form-signin', 'novalidate' => 'novalidate', 'role' => 'form'));
echo '<h2 class="form-signin-heading">' . __('Please sign in', true) .  "</h2>";
echo $this->BootstrapForm->input(__('username', true), 
  array(
    'placeholder' => 'Username', 
    'class' => 'form-control', 
    'label' => false,
    'autofocus' => ''
  ));
echo $this->BootstrapForm->input(__('password', true), 
  array(
    'placeholder' => 'Password', 
    'class' => 'form-control', 
    'label' => false,
  ));
echo $this->BootstrapForm->submit(__('Login', true), array('class' => 'btn btn-lg btn-primary btn-block'));
echo $this->BootstrapForm->end();
