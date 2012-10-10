<?php use_helper('I18N', 'Date') ?>
<?php include_partial('movie/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Movie', array(), 'messages') ?></h1>

  <?php include_partial('movie/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('movie/form_header', array('movie' => $movie, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('movie/form', array('movie' => $movie, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('movie/form_footer', array('movie' => $movie, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
