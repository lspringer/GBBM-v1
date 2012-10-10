<td colspan="4">
  <?php echo __('%%label%% - %%style%% - %%brewery%% - %%updated_at%%', array('%%label%%' => link_to($beer->getLabel(), 'beer_edit', $beer), '%%style%%' => $beer->getStyle(), '%%brewery%%' => $beer->getBrewery(), '%%updated_at%%' => false !== strtotime($beer->getUpdatedAt()) ? format_date($beer->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
