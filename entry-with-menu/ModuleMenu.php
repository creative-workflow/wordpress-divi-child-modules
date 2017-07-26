<?php
class ModuleEntryWithMenuMenu extends cw\divi\module\Extension {
  public static $renderedItems = [];
  public function init() {
    parent::init('cw-module-therapy-method-menu', 'custom_therapy_method_menu');

    add_filter('the_content', [$this, 'renderMenu'], 10000);
  }

  public function shortcode_callback( $atts, $content = null, $function_name ) {
    return '[ModuleEntryWithMenuMenu]';
  }

  public function renderMenu($content){
    $menu = '<ul class="cw-module-therapy-method-menu">';
    foreach(static::$renderedItems as $item)
      $menu.='<li><a href="#'.$item['id'].'">'.$item['name'].'</a></li>';

    $menu.='</ul>';

    return str_replace('[ModuleEntryWithMenuMenu]', $menu, $content);
  }
}
new ModuleEntryWithMenuMenu(__DIR__);
