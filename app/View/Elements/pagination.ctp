<?php if (isset($this->Paginator)) : ?>
<?php $params = $this->Paginator->params();?>
<?php
//Check if user have more than one page to show previous and next in pagination
if ($params['pageCount'] > 1) {
  ?>

  <ul class="pagination">
<?php
    $model = @key($this->params->paging);
    echo $this->Paginator->first(__('Beginning'), array('tag' => 'li'));
    echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), '<a onclick="return false;">Prev</a>', array('class' => 'prev disabled','tag' => 'li', 'escape' => false));


    $options = array(
                'tag'          => 'li',
                'separator'    => false,
                'currentClass' => 'active',
                'class'        => 'pointer',
               );
    echo $this->Paginator->numbers($options);

    echo $this->Paginator->next(__('Next'), array('tag' => 'li'), '<a onclick="return false;">Next</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));

    echo $this->Paginator->last(__('End'), array('tag' => 'li'));

?>
  </ul>


<?php
}
?>
<?php endif; ?>