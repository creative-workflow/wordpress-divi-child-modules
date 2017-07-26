
<span class="menu-anchor" id="<?= $headline_id ?>"></span>
<div class="content-wrapper">
  <div class="headline-wrapper">
    <?= $this->tag($headline_tag, $headline, ['class' => 'module-headline']) ?>
  </div>

  <div class="text et_pb_text">
    <?= $text ?>
  </div>
</div>

<?

  if($image)
    echo $this->image($image, ['class' => 'image']);

?>
