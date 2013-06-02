<?php

class Unodor_Router{
	
	private static $_menus;
	private static $_ajax;
	
	public static function add_menu($slug, $link, $title, $route, $permission){
		self::$_menus[] = array('slug' => $slug, 'link' => $link, 'title' => $title, 'route' => $route, 'permission' => $permission);

		return $slug;
	}

	public static function add_submenu($parent, $slug, $link, $title, $route, $permission){
		self::$_menus[] = array('slug' => $slug, 'link' => $link, 'title' => $title, 'route' => $route, 'permission' => $permission, 'parent' => $parent);
	}
	
	public static function add_ajax($controller, $action){
		self::$_ajax[] = array('controller' => $controller, 'action' => $action);
	}
	
	public function register_ajax(){
		foreach(self::$_ajax as $ajax){
			$controller = self::_get_controller($ajax);
			$controller->controller = $ajax['controller'];
			add_action('wp_ajax_'.$ajax['controller'].'_'.$ajax['action'], array($controller, $ajax['action'] . '_action'));
		}
	}

	public function register_menu(){
		$registry = array();

		foreach(self::$_menus as $menu){
			$controller = self::_get_controller($menu['route']);
			$controller->controller[$menu['slug']] = $menu['route']['controller'];

			if(!isset($menu['parent'])){
				$icon = UNOSLIDER_PATH . '/public/images/16ico.png';
				$main_menu = add_menu_page($menu['title'], $menu['link'], $menu['permission'], $menu['slug'], array($controller, $menu['route']['action']), $icon);
				$registry[] = $main_menu;
			}else{
				$sub_menu = add_submenu_page($menu['parent'], $menu['title'], $menu['link'], $menu['permission'], $menu['slug'], array($controller, $menu['route']['action']));
				$registry[] = $sub_menu;
			}

			if(isset($_GET['_r']) && $_GET['_r'] == 1){
				if($menu['slug'] == $_GET['page']){
					call_user_func(array($controller, '_call'));
					wp_redirect($_SERVER["HTTP_REFERER"]);
					exit;
				}
			}
		}

		require_once UNOSLIDER_BASE.'/library/Unodor/Registry.php';
		Unodor_Registry::set('plugin_pages', $registry);
	}

	private function _get_controller($item){
		$class = ucfirst($item['controller'] . '_Controller');
		
		$filename = UNOSLIDER_BASE . '/application/controllers/'.strtolower($item['controller']).'_controller.php';
		if (file_exists($filename)) {
			require_once $filename;
		}else{
			wp_die('<strong>ERROR: </strong>File "' . strtolower($item['controller']) . '_controller.php" does not exist');
		}

		if(class_exists($class)){
			$controller = new $class;
		}else{
			wp_die('<strong>ERROR: </strong>Controller "' . $class . '" does not exist');
		}

		return $controller;
	}
}