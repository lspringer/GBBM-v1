<?php use_helper('I18N', 'Date') ?>
<?php include_partial('brewery/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Brewery', array(), 'messages') ?></h1>

  <?php include_partial('brewery/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('brewery/form_header', array('brewery' => $brewery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('brewery/form', array('brewery' => $brewery, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('brewery/form_footer', array('brewery' => $brewery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
