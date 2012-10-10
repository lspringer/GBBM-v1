<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($movie->getTitle(), 'movie_edit', $movie) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_year">
  <?php echo $movie->getYear() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_runtime">
  <?php echo $movie->getRuntime() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($movie->getUpdatedAt()) ? format_date($movie->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
