<?php 
if ($email_count>0) {
?>
<b class="text-success">Email exists. Would you like to <?php echo $this->Html->link('login', '/DrexCartUsers/login'); ?>?</b>
<script type="text/javascript">
$('#email').addClass('
</script>
<?php 
}
?>