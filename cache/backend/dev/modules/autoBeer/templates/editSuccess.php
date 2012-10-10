<?php use_helper('I18N', 'Date') ?>
<?php include_partial('beer/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Beer', array(), 'messages') ?></h1>

  <?php include_partial('beer/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('beer/form_header', array('beer' => $beer, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('beer/form', array('beer' => $beer, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('beer/form_footer', array('beer' => $beer, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
