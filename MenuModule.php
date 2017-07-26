<?php

class MenuModule extends cw\divi\module\Extension {
  public function init() {
    parent::init('cw-module-menu', 'custom_menu');

    $this->addDefaultFields();

    $group = $this->addGroup('menu_module', 'Menu')
                  ->tabGeneral();

    $group->addField('menu_selection')
          ->label('Menu')
          ->typeText('Menü-Name')
          ->description('*geben Sie den Menü-Namen an');

      return $this;
  }

  public function shortcode_callback( $atts, $content = null, $function_name ) {
    extract(shortcode_atts(array( 'menu_selection' => null, ), $atts));

    return wp_nav_menu([
                    'theme_location'  => $menu_selection,
                    'container_class' => $this->main_css_class,
                    'echo'            => false
                  ]);
  }
}
new MenuModule;
