<?php echo $this->Form->create(null); ?>

<table>
  <tr>
    <th>Site Name</th>
    <td><?php echo $this->Form->input('sitename', array('label'=>false)); ?></td>
  </tr>
  <tr>
    <th>Row 1: Col 1</th>
    <td>Row 1: Col 2</td>
  </tr>
</table>

<?php echo $this->Js->submit('Update Site Information', array('url'=>'/DrexCartInstall/runStep2', 'buffer'=>false, 'update'=>'#panel_step2')); ?>
<?php echo $this->Form->end(); ?>