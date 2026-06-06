<?php 

namespace WPC;

// use Elementor\Plugin;

class Widget_Loader{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self(); 
		}
		return self::$_instance;
	}


	private function include_widgets_files(){
		// require_once(__DIR__ . '/widgets/obposts.php');
		// //require_once(__DIR__ . '/widgets/tnews.php');
		// require_once(__DIR__ . '/widgets/titles.php');
		// require_once(__DIR__ . '/widgets/btn.php');
		// require_once(__DIR__ . '/widgets/list.php');
		// require_once(__DIR__ . '/widgets/four.php');
		// require_once(__DIR__ . '/widgets/video.php');
		// require_once(__DIR__ . '/widgets/circle.php');
		// require_once(__DIR__ . '/widgets/logos.php');
		// require_once(__DIR__ . '/widgets/testimonials.php');
		// require_once(__DIR__ . '/widgets/testimonialsv2.php');
		// require_once(__DIR__ . '/widgets/features.php');
		// require_once(__DIR__ . '/widgets/feature-page.php');
		// require_once(__DIR__ . '/widgets/product-features.php');
		// require_once(__DIR__ . '/widgets/condown.php');
		// require_once(__DIR__ . '/widgets/slidertabs.php');
		// require_once(__DIR__ . '/widgets/faq.php');
		// require_once(__DIR__ . '/widgets/people.php');
		// require_once(__DIR__ . '/widgets/card.php');
		// require_once(__DIR__ . '/widgets/cardv2.php');
		require_once(__DIR__ . '/widgets/share.php');
		// require_once(__DIR__ . '/widgets/insight.php');
		// require_once(__DIR__ . '/widgets/infiniteSlider.php');
		require_once(__DIR__ . '/widgets/globe.php');
		require_once(__DIR__ . '/widgets/post-category.php');
		require_once(__DIR__ . '/widgets/sidebar-blog-rlated.php');
		require_once(__DIR__ . '/widgets/testimonials.php');
		require_once(__DIR__ . '/widgets/ascend.php');
		require_once(__DIR__ . '/widgets/platform.php');
		require_once(__DIR__ . '/widgets/casestudies-category.php');	
		require_once(__DIR__ . '/widgets/sidebar-casestudies-rlated.php');
		//require_once(__DIR__ . '/widgets/casestudies-summery.php');
	
	}
	public function register_widgets(){

		$this->include_widgets_files();

		// //\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Advertisement());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ObPost());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Titles());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Btn());
		// //\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Tnews());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Listtree());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Four());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Video());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Circle());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Logos());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Testimonials());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Testimonialsv2());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Features());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Feature());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ProductFeatures());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Condown());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SliderTabs());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Faq());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\People());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Card());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Cardv2());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Share());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Insight());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\InfiniteSlider());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Globe());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Primary_Category_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Casestudy_Category_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Related_Articles_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Related_Casestudy_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Testimonials_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Subscribe_To_Asc_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Unified_Platform_Widget());
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Elementor_Casestudy_Summery_Widget())

	} 

	public function __construct(){
		add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
	}
}

// Instantiate Plugin Class
Widget_Loader::instance();