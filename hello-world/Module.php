<?php

class ModuleHelloWorld extends cw\divi\module\Extension {
  public function init() {
    parent::init('cw-module-hello-world', 'custom_hello_world');

    $this->addDefaultFields();

    $group = $this->addGroup('main', 'Main')
                  ->tabGeneral();

    $group->addField('headline')
          ->label('Überschrift')
          ->typeText('Überschrift');

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
new ModuleHelloWorld(__DIR__);
