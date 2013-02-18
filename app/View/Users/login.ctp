
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password', array('type' => 'password'));
echo $this->Form->end('Login');
echo $this->Html->link(__('Register'), array('action' => 'add'));
?>
