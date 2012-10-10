<td class="sf_admin_text sf_admin_list_td_label">
  <?php echo link_to($beer->getLabel(), 'beer_edit', $beer) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_style">
  <?php echo $beer->getStyle() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_brewery">
  <?php echo $beer->getBrewery() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($beer->getUpdatedAt()) ? format_date($beer->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
