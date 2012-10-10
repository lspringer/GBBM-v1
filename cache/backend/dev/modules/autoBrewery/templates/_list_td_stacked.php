<td colspan="3">
  <?php echo __('%%name%% - %%country%% - %%updated_at%%', array('%%name%%' => link_to($brewery->getName(), 'brewery_edit', $brewery), '%%country%%' => $brewery->getCountry(), '%%updated_at%%' => false !== strtotime($brewery->getUpdatedAt()) ? format_date($brewery->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
