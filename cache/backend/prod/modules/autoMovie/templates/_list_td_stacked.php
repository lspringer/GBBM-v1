<td colspan="4">
  <?php echo __('%%title%% - %%year%% - %%runtime%% - %%updated_at%%', array('%%title%%' => link_to($movie->getTitle(), 'movie_edit', $movie), '%%year%%' => $movie->getYear(), '%%runtime%%' => $movie->getRuntime(), '%%updated_at%%' => false !== strtotime($movie->getUpdatedAt()) ? format_date($movie->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
