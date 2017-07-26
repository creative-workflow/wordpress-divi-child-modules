<div class="<?= $main_css_class ?> data-container et_pb_module" <?= $data ?> <?= $module_id ?>>

  <?= $this->render(
        $module_view_file,
        $view_attributes
      );
  ?>

</div>
