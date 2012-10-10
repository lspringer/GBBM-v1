<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($brewery->getName(), 'brewery_edit', $brewery) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_country">
  <?php echo $brewery->getCountry() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($brewery->getUpdatedAt()) ? format_date($brewery->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
