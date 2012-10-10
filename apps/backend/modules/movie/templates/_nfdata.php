<div class="sf_admin_form_row">
	<div>
		<label>API ID:</label> <?php echo $form->getObject()->nfid ?>
	</div>
</div>
<div class="sf_admin_form_row">
	<div>
		<label>API Similar:</label> <?php echo $form->getObject()->nfsimilar ?>
	</div>
</div>
<div class="sf_admin_form_row">
	<div>
		<label>Link:</label> <?php echo link_to($form->getObject()->nflink, $form->getObject()->nflink, array('target' => '_new')) ?>
	</div>
</div>