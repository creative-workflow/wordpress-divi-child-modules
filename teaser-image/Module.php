<?php

class ModuleTeaserImage extends cw\divi\module\Extension {
  public function init() {
    parent::init('cw-module-teaser-image', 'custom_teaser_image');

    $this->addDefaultFields();

    $group = $this->addGroup('menu_module', 'Menu')
                  ->tabGeneral();

    $group->addField('teaser_image')
          ->label('Teaser-Bild')
          ->typeUpload()
          ->description('Geben Sie ein Bild an!')
          ->basicOption();

    $group->addField('headline')
          ->label('Überschrift')
          ->typeText('Überschrift')
          ->addFontSettings('.headline');

    $group->addField('headline_tag')
          ->label('Überschrift-Tag')
          ->typeSelect([
            'h1' => 'h1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6',
            'strong' => 'strong',
            'b' => 'b',
            'div' => 'div'
          ]);

    $group->addField('sub_headline')
          ->label('2. Überschrift')
          ->typeText('2. Überschrift')
          ->addFontSettings('.sub-headline');

    $group->addField('sub_headline_tag')
          ->label('2. Überschrift-Tag')
          ->typeSelect([
            'h1' => 'h1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6',
            'strong' => 'strong',
            'b' => 'b',
            'div' => 'div'
          ]);

      return $this;
  }

  public function shortcode_callback( $atts, $content = null, $function_name ) {
    $variables = $this->shortcode_atts;

    return $this->render(
      'views/module.php',
      $variables
    );
  }
}
new ModuleTeaserImage(__DIR__);
