<?php

class ModuleEntryWithMenu extends cw\divi\module\Extension {
  public function init() {
    parent::init('cw-module-entry-with-menu', 'custom_entry_with_menu');

    $this->addDefaultFields();

    $group = $this->addGroup('main_module', 'Main')
                  ->tabGeneral();

    $group->addField('headline')
          ->label('Überschrift')
          ->typeText('Überschrift')
          ->addFontSettings('.module-headline');

    $group->addField('menu_entry')
          ->label('Name im Menü')
          ->typeText('Name im Menü');

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

    $group->addField('text')
          ->label('Text')
          ->typeHtml()
          ->addFontSettings('.text');

    $group->addField('image')
          ->label('Bild')
          ->typeUpload()
          ->description('Geben Sie ein Bild an!')
          ->basicOption();

      return $this;
  }

  protected function idFromHeadline($headline){
    return 'id.'.str_replace([' ', '-', '/', '&', '_'], '', $headline);
  }

  public function shortcode_callback( $atts, $content = null, $function_name ) {
    $variables = $this->shortcode_atts;

    $headline_id = $this->idFromHeadline($variables['headline']);
    $variables['text'] = $this->shortcode_content;
    $variables['headline_id'] = $headline_id;

    ModuleEntryWithMenuMenu::$renderedItems[] = [
      'name' => $variables['menu_entry'],
      'id' => $headline_id
    ];

    return $this->render(
      'views/module.php',
      $variables
    );
  }
}
new ModuleEntryWithMenu(__DIR__);
