<?php

class ModuleTeaserCite extends cw\divi\module\Extension {
  public function init() {
    parent::init('cw-module-teaser-cite', 'custom_teaser_cite');

    $this->addDefaultFields();

    $group = $this->addGroup('menu_module', 'Menu')
                  ->tabGeneral();

    $group->addField('image')
          ->label('Bild')
          ->typeUpload()
          ->description('Geben Sie ein Bild an!')
          ->basicOption();

    $group->addField('headline')
          ->label('Überschrift')
          ->typeText('Überschrift')
          ->addFontSettings('.module-headline');

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

    $group->addField('cite_text')
          ->label('Zitat')
          ->typeText('Zitat')
          ->addFontSettings('.cite-text');

    $group->addField('cite_author')
          ->label('Zitat Author')
          ->typeText('Zitat Author')
          ->addFontSettings('.cite-author');

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
new ModuleTeaserCite(__DIR__);
