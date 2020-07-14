<?php
/** Theme Name	: Enigma
* Theme Core Functions and Codes
*/

	/**Includes required resources here**/
	define('WL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('WL_TEMPLATE_DIR', get_template_directory());
	define('WL_TEMPLATE_DIR_CORE' , WL_TEMPLATE_DIR . '/core');
	require( WL_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' );
	require( WL_TEMPLATE_DIR_CORE . '/menu/weblizar_nav_walker.php' );

	require( WL_TEMPLATE_DIR_CORE . '/scripts/css_js.php' ); //Enquiring Resources here
	require( WL_TEMPLATE_DIR_CORE . '/comment-function.php' );
	require(dirname(__FILE__).'/customizer.php');
	require get_template_directory() . '/core/custom-header.php';
		require( get_template_directory() . '/class-tgm-plugin-activation.php' );
	//Sane Defaults
	function weblizar_default_settings()
{
	$ImageUrl =  esc_url(get_template_directory_uri() ."/images/1.png");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/2.png");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/3.png");
	$ImageUrl4 = esc_url(get_template_directory_uri() ."/images/portfolio1.png");
	$ImageUrl5 = esc_url(get_template_directory_uri() ."/images/portfolio2.png");
	$ImageUrl6 = esc_url(get_template_directory_uri() ."/images/portfolio3.png");
	$ImageUrl7 = esc_url(get_template_directory_uri() ."/images/portfolio4.png");
	$wl_theme_options=array(
			//Logo and Fevicon header
			'title_position'=>'',
			'search_box'=>'',
			'upload__header_image'=>'',
			'upload_image_logo'=>'',
			'height'=>'55',
			'width'=>'150',
			'_frontpage' => '1',
			'blog_count'=>'3',
			'custom_css'=>'',
			'excerpt_blog'=>'55',
			'home_reorder'=>'',
			'upload_image_favicon'=>'',
			'snoweffect'=>'',
			'read_more'=>__('Read More', 'enigma' ),
			'autoplay'=>'1',
			'breadcrumb'=>'1',
			'box_layout'=>'1',

			'slider_image_speed' => '',
			'slide_image_1' => $ImageUrl,
			'slide_title_1' => __('Slide Title', 'enigma' ),
			'slide_desc_1' => __('Lorem Ipsum is simply dummy text of the printing', 'enigma' ),
			'slide_btn_text_1' => __('Read More', 'enigma' ),
			'slide_btn_link_1' => '#',
			'slide_image_2' => $ImageUrl2,
			'slide_title_2' => __('variations of passages', 'enigma' ),
			'slide_desc_2' => __('Contrary to popular belief, Lorem Ipsum is not simply random text', 'enigma' ),
			'slide_btn_text_2' => __('Read More', 'enigma' ),
			'slide_btn_link_2' => '#',
			'slide_image_3' => $ImageUrl3,
			'slide_title_3' => __('Contrary to popular ', 'enigma' ),
			'slide_desc_3' => __('Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'enigma' ),
			'slide_btn_text_3' => __('Read More', 'enigma' ),
			'slide_btn_link_3' => '#',
			'slider_anim'=>'',
			'animate_type_title'=>'',
			'animate_type_desc'=>'',
			// Footer Call-Out
			'fc_home'=>'1',
			'fc_title' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'enigma' ),
			'fc_btn_txt' => __('More Features', 'enigma' ),
			'fc_btn_link' =>"#",
			'fc_icon' => 'fa fa-thumbs-up',
			//Social media links
			'header_social_media_in_enabled'=>'1',
			'footer_section_social_media_enbled'=>'1',
			'twitter_link' =>"#",
			'fb_link' =>"#",
			'linkedin_link' =>"#",
			'youtube_link' =>"#",
			'instagram' =>"#",
			'gplus' =>"#",
			'vk_link' =>"#",
			'qq_link' => "#",
			'whatsapp_link' => "#",

			'email_id' => 'example@mymail.com',
			'phone_no' => '0159753586',
			'footer_customizations' => __(' &#169; 2016 Enigma Theme', 'enigma' ),
			'developed_by_text' => __('Theme Developed By', 'enigma' ),
			'developed_by_weblizar_text' => __('Weblizar Themes', 'enigma' ),
			'developed_by_link' => 'http://weblizar.com/',
			'services_home'=>'1',
			'home_service_heading' => __('Our Services', 'enigma' ),
			'service_1_title'=>__("Idea",'enigma' ),
			'service_1_icons'=>"fa-google",
			'service_1_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
			'service_1_link'=>"#",

			'service_2_title'=>__('Records', 'enigma' ),
			'service_2_icons'=>"fa-database",
			'service_2_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
			'service_2_link'=>"#",

			'service_3_title'=>__("WordPress", 'enigma' ),
			'service_3_icons'=>"fa-wordpress",
			'service_3_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
			'service_3_link'=>"#",
			'product_title'=>'',


			//Portfolio Settings:
			'portfolio_home'=>'1',
			'port_heading' => __('Recent Works', 'enigma' ),
			'port_1_img'=> $ImageUrl4,
			'port_1_title'=>__('Bonorum', 'enigma' ),
			'port_1_link'=>'#',
			'port_2_img'=> $ImageUrl5,
			'port_2_title'=>__('Content', 'enigma' ),
			'port_2_link'=>'#',
			'port_3_img'=> $ImageUrl6,
			'port_3_title'=>__('dictionary', 'enigma' ),
			'port_3_link'=>'#',
			'port_4_img'=> $ImageUrl7,
			'port_4_title'=>__('randomised', 'enigma' ),
			'port_4_link'=>'#',
			//BLOG Settings
			'blog_home' => '1',
			'blog_title'=>__('Latest Blog', 'enigma' ),
			'blog_speed'=>'2000',
			'blog_category'=>'',

			//Google font style
			'main_heading_font' => 'Open Sans',
			'menu_font' => 'Open Sans',
			'theme_title' => 'Open Sans',
			'desc_font_all' => 'Open Sans'


		);
		return apply_filters( 'enigma_options', $wl_theme_options );
}
	function weblizar_get_options() {
    // Options API
    return wp_parse_args(
        get_option( 'enigma_options', array() ),
        weblizar_default_settings()
    );
	}

	$args = array(
	'flex-width'    => true,
	'width'         => 2000,
	'flex-height'    => true,
	'height'        => 100,
	'default-image' => get_template_directory_uri() . '/images/header-bg.jpg',
	'wp-head-callback'   => 'enigma_header_style',
);
add_theme_support( 'custom-header', $args );


	/*After Theme Setup*/
	add_action( 'after_setup_theme', 'weblizar_head_setup' );
	function weblizar_head_setup()
	{
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 550; //px

	    //Blog Thumb Image Sizes
		add_image_size('home_post_thumb',340,210,true);
		//Blogs thumbs
		add_image_size('wl_page_thumb',730,350,true);
		add_image_size('blog_2c_thumb',570,350,true);
		add_theme_support( 'title-tag' );

		// Logo
		add_theme_support( 'custom-logo', array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
			'flex-height'  => true,
		));

		// Load text domain for translation-ready
		load_theme_textdomain( 'enigma', WL_TEMPLATE_DIR_CORE . '/lang' );

		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'enigma' ) );
		// theme support
		$args = array('default-color' => 'ffffff',);
		add_theme_support( 'custom-background', $args);
		add_theme_support( 'automatic-feed-links');
		$defaults = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style('css/editor-style.css');
		require( WL_TEMPLATE_DIR . '/options-reset.php'); //Reset Theme Options Here
	}


	// Read more tag to formatting in blog page
	function weblizar_content_more($more)
	{
	   return '<div class="blog-post-details-item"><a class="enigma_blog_read_btn" href="'.get_permalink().'"><i class="fa fa-plus-circle"></i>"'.__('Read More', 'enigma' ).'"</a></div>';
	}
	add_filter( 'the_content_more_link', 'weblizar_content_more' );


	// Replaces the excerpt "more" text by a link
	function weblizar_excerpt_more($more) {
	return '';
	}
	add_filter('excerpt_more', 'weblizar_excerpt_more');

	if ( ! function_exists( 'enigma_header_style' ) ) :
	function enigma_header_style() {
		$header_text_color = get_header_textcolor();
	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) == $header_text_color ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="fashionair-custom-header-styles" type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.head-contact-info li a{
		color:#fff;
		}
		.hd_cover {
		color: #fff;
		}
		.logo p {
		color: #fff;
		}
		.social i {
		color: #fff;
		}
		.social li {
		border: 2px solid #ffffff;
		}
		.logo a {
			color: #fff;
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.head-contact-info li a, .hd_cover, .logo p, .social i, .logo a{
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.social li {
			border:2px solid #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;


	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'enigma' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'enigma' ),
			'before_widget' => '<div class="enigma_sidebar_widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="enigma_sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'enigma' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'enigma' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 enigma_footer_widget_column">',
			'after_widget' => '</div>',
			'before_title' => '<div class="enigma_footer_widget_title">',
			'after_title' => '<div class="enigma-footer-separator"></div></div>',
		) );
	}

	/* Breadcrumbs  */
	function weblizar_breadcrumbs() {
    $delimiter = '';
    $home = __('Home', 'enigma' ); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<ul class="breadcrumb">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . ' _e("Archive by category","enigma") "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        //$cat = $cat[0];
       // echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . _e("Search results for","enigma")  . get_search_query() . '"' . $after;

    } elseif (is_tag()) {
		echo $before . _e('Tag','enigma') . single_tag_title('', false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . _e("Articles posted by","enigma") . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . _e("Error 404","enigma") . $after;
    }

    echo '</ul>';
	}


	//PAGINATION
		/*function weblizar_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='enigma_blog_pagination'><div class='enigma_blog_pagi'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link(1))."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged - 1))."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                echo ($paged == $i)? "<a class='active'>".esc_attr($i)."</a>":"<a href='".esc_url(get_pagenum_link($i))."'>".esc_attr($i)."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged + 1))."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($pages))."'>&raquo;</a>";
         echo "</div></div>";
     }
} */
	/*===================================================================================
	* Add Author Links
	* =================================================================================*/
	function weblizar_author_profile( $contactmethods ) {

	$contactmethods['youtube_profile'] = __('Youtube Profile URL','enigma');
	$contactmethods['twitter_profile'] = __('Twitter Profile URL','enigma');
	$contactmethods['facebook_profile'] = __('Facebook Profile URL','enigma');
	$contactmethods['linkedin_profile'] = __('Linkedin Profile URL','enigma');

	return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'weblizar_author_profile', 10, 1);
	/*===================================================================================
	* Add Class Gravtar
	* =================================================================================*/
	add_filter('get_avatar','weblizar_gravatar_class');

	function weblizar_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='author_detail_img", $class);
    return $class;
	}
	/****--- Navigation for Author, Category , Tag , Archive ---***/
	function weblizar_navigation() { ?>
	<div class="enigma_blog_pagination">
	<div class="enigma_blog_pagi">
	<?php posts_nav_link(); ?>
	</div>
	</div>
	<?php }

	/****--- Navigation for Single ---***/
	function weblizar_navigation_posts() { ?>
	<div class="navigation_en">
	<nav id="wblizar_nav">
	<span class="nav-previous">
	<?php previous_post_link('&laquo; %link'); ?>
	</span>
	<span class="nav-next">
	<?php next_post_link('%link &raquo;'); ?>
	</span>
	</nav>
	</div>
<?php
	}



//Plugin Recommend
add_action('tgmpa_register','enigma_plugin_recommend');
function enigma_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'Responsive Coming Soon',
            'slug'      => 'responsive-coming-soon-page',
            'required'  => false,
        ),
	array(
            'name'      => 'Appointment Scheduler',
            'slug'      => 'appointment-scheduler-weblizar',
            'required'  => false,
        ),
	array(
            'name'      => 'Admin Custom Login',
            'slug'      => 'admin-custom-login',
            'required'  => false,
        )

	);
    tgmpa( $plugins );
}
function enigma_custom_admin_notice() {
	wp_register_style( 'custom_admin_css', get_template_directory_uri() . '/core/admin/admin-rating.css');
    wp_enqueue_style( 'custom_admin_css' );
	wp_enqueue_style('custom-bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.css');
	wp_enqueue_script('custom-bootstrap-js',get_template_directory_uri() .'/core/admin/bootstrap/js/bootstrap.js');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome-4.7.0/css/font-awesome.css');
	$wl_th_info = wp_get_theme();
	$currentversion = str_replace('.','',(esc_html( $wl_th_info->get('Version') )));
	$isitdismissed = 'enigma_notice_dismissed'.$currentversion;
	if ( !get_user_meta( get_current_user_id() , $isitdismissed ) ) { ?>

				  <!-- rating -->
	<div class="col-md-12 main-div">
		<div class="notice-box notice-success is-dismissible flat_responsive_notice" data-dismissible="disable-done-notice-forever">
			<p>
				<?php  esc_html_e('Thank you for using the free version of ','enigma'); ?>
				<?php echo esc_html( $wl_th_info->get('Name') );?> -
				<?php echo esc_html( $wl_th_info->get('Version') ); ?>
				<?php esc_html_e('Please give your reviews and ratings on ','enigma'); echo esc_attr($wl_th_info->get('Name')); esc_html_e(' theme. Your ratings will help us to improve our themes.', 'enigma'); ?>
				<script type="text/javascript">alert(<?php echo esc_attr($isitdismissed)?>);</script>
				<?php if($wl_th_info->get('Name')=="Enigma") { ?>
				<a class="rateme" href="<?php echo esc_url('https://wordpress.org/support/theme/enigma/reviews/?filter=5');  ?>" target="_blank" aria-label="Dismiss the welcome panel"> <?php } elseif($wl_th_info->get('Name')=="Greenigma") { ?>
				<a class="rateme" href="<?php echo esc_url('https://wordpress.org/support/theme/greenigma/reviews/?filter=5');  ?>" target="_blank" aria-label="Dismiss the welcome panel"> <?php } elseif($wl_th_info->get('Name')=="Inferno") { ?>
				<a class="rateme" href="<?php echo esc_url('https://wordpress.org/support/theme/inferno/reviews/?filter=5');  ?>" target="_blank" aria-label="Dismiss the welcome panel">
				<?php } else { ?>
				<a class="rateme" href="<?php echo esc_url('https://wordpress.org/support/theme/cista/reviews/?filter=5');  ?>" target="_blank" aria-label="Dismiss the welcome panel">
				<?php } ?>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				</a>
			</p>

		</div>

		<div class="wb_plugin_feature">
			<div class="wb_plugin_feature_banner default_pattern pattern_ ">
			<div class="wb-col-md-6 wb-col-sm-12 wb-text-center institute_banner_img">
			<h1>  Enigma Premium </h1>
				<img class="wp-img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/EP.png" alt="img">
			</div>
				<div class="wb-col-md-6 wb-col-sm-12 wb_banner_featurs-list">
					<span><h1> Features</h1></span>
					<ul>    <li> Selling WordPress Theme </li>
						<li> Parallax Design Included</li>
						<li> Theme Option Panel </li>
						<li> Unlimited Color Skins </li>
						<li> Mega Menu Support </li>
						<li> 6 Portfolio Layout </li>
						<li> 6 Blog Layout </li>
						<li> Multilingual </li>
						<li> Woocommerce Support </li>
						<li> All Leading Page Builder Support</li>
						<li> Inbuilt Shortcodes </li>
						<li> SEO Friendly </li>
						<li> Well Documented Code</li>
						<li> 24*7 Live Support </li>
					</ul>
				<div class="wp_btn-grup">
					<a class="wb_button-primary "  href="https://weblizar.com/themes/enigma-premium/" target="_blank">View Demo</a>
					<a class="wb_button-primary" href="https://weblizar.com/themes/enigma-premium/" target="_blank">Buy Now $39</a>
				</div>
				<div class="plugin_vrsion"> <a class="dismiss" href="?-notice-dismissed<?php echo esc_attr($currentversion);?>"><span> <?php esc_html_e("Dismiss","enigma");?> </a> </span> </div>
				</div>
		</div>
	</div>
</div>
<?php
	}
 }
add_action('admin_notices', 'enigma_custom_admin_notice');

function enigma_notice_dismissed() {
	$wl_th_info = wp_get_theme();
	$currentversion = str_replace('.','',(esc_html( $wl_th_info->get('Version') )));
	$dismissurl = '-notice-dismissed'.$currentversion;
	$isitdismissed = 'enigma_notice_dismissed'.$currentversion;
    $user_id = get_current_user_id();
    if ( isset( $_GET[$dismissurl] ) )
        add_user_meta( $user_id, $isitdismissed, 'true', true );
}
add_action( 'admin_init', 'enigma_notice_dismissed' );

$theme_options = weblizar_get_options();
if($theme_options['snoweffect'] =='1'){
	function snow_script() {
	wp_dequeue_script('snow', get_template_directory_uri() .'/js/snowstorm.js');
	}
	add_action( 'wp_enqueue_scripts', 'snow_script' );
}


function redirect_to_custom_login_page()
{
		wp_redirect(site_url() . "/index.php/sign-in");
		exit();
}

add_action("wp_logout", "redirect_to_custom_login_page");


add_filter( 'edit_profile_url', 'modify_profile_url_wpse_94075', 10, 3 );//defualt priority10
																																				 //3 argument
/**
 * http://core.trac.wordpress.org/browser/tags/3.5.1/wp-includes/link-template.php#L2284
 *
 * @param string $scheme The scheme to use. รูปแบบแถบbar User
 * Default is 'admin'. 'http' or 'https' can be passed to force those schemes.
*/
function modify_profile_url_wpse_94075( $url, $user_id, $scheme )
{
    // Makes the link to http://example.com/custom-profile
    $url = site_url('/index.php/change-user-password');
    return $url;
}



add_action( 'admin_bar_menu', function( $admin_bar ){
    $profile = $admin_bar->get_node('edit-profile');
    $profile->title = __('Change Password');
    $admin_bar->add_node($profile);
});



/*start : I(POP) add it myself*/
if(isset($_POST['yes_create_project']))
{
	$name1 =$_POST['n1'];
	$description1 =$_POST['n2'];
	$start1 =$_POST['n3'];
	$finish1 =$_POST['n4'];
	$place1 =$_POST['n5'];
	$type1 =$_POST['n6'];


	global $wpdb;
	$data_array = array(
						'project_name' => $name1,
						'project_description' => $description1,
						'project_start_date' => $start1,
						'project_finish_date' => $finish1,
						'project_address' => $place1,
						'project_type' => $type1
						);
	$table_name = 'wp_createproject';
	$count1 = 0;
	$retrieved_data = $wpdb->get_results("SELECT * FROM wp_createproject");
	foreach($retrieved_data as $print)
	{

			$print->project_name;
			$print->project_description;
			$print->project_start_date;
			$print->project_finish_date;
			$print->project_address;
			$print->project_type;

			if($name1 == $print->project_name &&  $start1 == $print->project_start_date && $finish1 == $print->project_finish_date )
			{
				$count1++;
			}
	}
	if($name1 == NULL || $description1 == NULL || $start1 == NULL || $finish1 == NULL || $place1 == NULL || $type1 == NULL )
	{

		echo "<script type='text/javascript'>alert('Please fill in all information.');window.location.href='".site_url(). "/index.php/create-project". "';</script>";

	}
	else if($name1 == " " || $description1 == " " || $start1 == " " || $finish1 == " " || $place1 == " " || $type1 == " ")
	{
		echo "<script type='text/javascript'>alert('You put a space, please enter new information');window.location.href='".site_url(). "/index.php/create-project". "';</script>";
	}
	else if($name1 == "-" || $description1 == "-" || $start1 == "-" || $finish1 == "-" || $place1 == "-" || $type1 == "-")
	{
		echo "<script type='text/javascript'>alert('You put a dash(-), please enter new information');window.location.href='".site_url(). "/index.php/create-project". "';</script>";
	}
	else if($count1 > 0)
	{
		echo "<script type='text/javascript'>alert('You put the duplicate name and date, please enter new information');window.location.href='".site_url(). "/index.php/create-project". "';</script>";
	}
	else if($name1 != NULL && $description1 != NULL && $start1 != NULL && $finish1 != NULL && $place1 != NULL && $type1 != NULL && ($finish1 >= $start1) )
	{
		$currentDate = date('Y-m-d');
		//echo $currentDate;
		if($start1 >= $currentDate)
		{
			$rowResult = $wpdb->insert($table_name,$data_array,$format=NULL);
			if($rowResult == 1)
			{
				echo "<script type='text/javascript'>alert('Your submission has been successful!!!');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error!!!');window.location.href='".site_url(). "/index.php/create-project". "';</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Please enter the current date.');window.location.href='".site_url(). "/index.php/create-project". "';</script>";

		}


	}
	else
	{
		echo "<script type='text/javascript'>alert('You select End Date before Start Date,please select new date.');window.location.href='".site_url(). "/index.php/create-project". "';</script>";
	}

	die;
}




if (isset($_POST['yes_delete_project'])) {

	global $wpdb;
	$data1 =$_POST['prjid3'];
	$wpdb->delete( 'wp_createproject', array( 'project_id' => $data1 ) );




}


if (isset($_POST['yes_delete_project']))
{

	global $wpdb;
	$data1 =$_POST['prjid3'];
	$wpdb->delete( 'wp_createproject', array( 'project_id' => $data1 ) );



}


	if(isset($_POST['yes_edit_project']))
	{  	 $oldid = $_POST['prjid8'];
		 $oldname = $_POST['prjid9'];

		 $na = $_POST['prjid10'];
		 $desc = $_POST['prjid11'];
		 $start = $_POST['prjid12'];
		 $end = $_POST['prjid13'];
		 $address = $_POST['prjid14'];
		 $type = $_POST['prjid15'];

		global $wpdb;
		$count2 = 0;
		$retrieved_data2 = $wpdb->get_results("SELECT * FROM wp_createproject");
		foreach($retrieved_data2 as $print2)
		{
				$print2->project_id;
				$print2->project_name;
				$print2->project_description;
				$print2->project_start_date;
				$print2->project_finish_date;
				$print2->project_address;
				$print2->project_type;

				if($na == $print2->project_name &&  $start == $print2->project_start_date && $end == $print2->project_finish_date && $oldid != $print2->project_id)
				{
					$count2++;
				}
		}

		if($na == NULL ||$desc == NULL || $start == NULL || $end == NULL || $address == NULL || $type== NULL)
		{
			echo "<script type='text/javascript'>alert('Please fill in all information.');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
		}
		else if($na == " " || $desc == " " || $start == " " || $end == " " || $address == " " || $type == " ")
		{
			echo "<script type='text/javascript'>alert('You put a space, please enter new information');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
		}
		else if($na == "-" || $desc == "-" || $start == "-" || $end == "-" || $address == "-" || $type == "-")
		{
			echo "<script type='text/javascript'>alert('You put a dash(-), please enter new information');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
		}
		else if($count2 > 0)
		{
			echo "<script type='text/javascript'>alert('You put the duplicate name and date, please enter new information');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
		}
		else if($na != NULL && $desc != NULL && $start != NULL && $end != NULL && $address!= NULL && $type != NULL)
		{
			$currentDate = date('Y-m-d');

			if( $end >= $start && $start >= $currentDate)
			{
				$wpdb->update(
					'wp_createproject',
					array(
						'project_name' =>  $na,
						'project_description' => $desc,
						'project_start_date' => $start,
						'project_finish_date' => $end,
						'project_address' => $address,
						'project_type' => $type
					),
					array( 'project_id' =>$oldid),
					array(
						'%s'

					),
					array( '%d' )
					);

			}
			else if($end < $start)
			{
				echo "<script type='text/javascript'>alert('You select End Date before Start Date,please select new date.');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";
			}
			else if($start < $currentDate)
			{
				echo "<script type='text/javascript'>alert('Please enter the current date.');window.location.href='".site_url(). "/index.php/data-of-project". "';</script>";

			}

		}

	}



/*enqueue semantic CSS and JS*/
 function wpsaas_frontend_scripts(){
	wp_enqueue_style('wpsaas-semantic-css', get_template_directory_uri() . '/semantic/dist/semantic.min.css' );
	wp_enqueue_script('wpsaas-semantic-js', get_template_directory_uri() . '/semantic/dist/semantic.min.js', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'wpsaas_frontend_scripts' );
/*end : I(POP) add it myself*/



	function getUserID()
	{
	    global $current_user;
	    return $current_user->user_login;
	}

	function getEmailUser()
	{
	    global $current_user;
	    return $current_user->user_email;
	}

	function getTelUser()
	{
	    global $current_user;
	    return $current_user->user_tel;
	}

	function getNameUser()
	{
	    global $current_user;
	    return $current_user->display_name;
	}
	function getUserIDNumber()
	{
	    global $current_user;
	    return $current_user->ID;
	}



	function getDIDMMail()
	{
		global $wpdb;
		$result_didm_mail = $wpdb->get_results("SELECT * FROM wp_didm_email");
		foreach ($result_didm_mail as $print)
		{
			$didm = $print->email;
		}
		return $didm;
	}


add_action( 'template_redirect', 'redirect_to_specific_page' );

function redirect_to_specific_page()
{

			if ( is_page('training-personal') && ! is_user_logged_in() )
			{

					echo "<script type='text/javascript'>alert('You must logging in');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
					exit;
			}
			else if ( is_page('trainning-company') && ! is_user_logged_in() )
			{

					echo "<script type='text/javascript'>alert('You must logging in');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
					exit;
			}
			else if ( is_page('model-3d') && ! is_user_logged_in() )
			{

					echo "<script type='text/javascript'>alert('You must logging in');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
					exit;
			}
			else if ( is_page('create-project') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('data-of-project') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('manage-order') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('change-didm-email') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('training-company-success') && ! is_user_logged_in() )
			{

					echo "<script type='text/javascript'>alert('You must logging in');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
					exit;
			}
			else if ( is_page('update-status') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('update-status-edit') && getUserID() != 'admin')
			{

					echo "<script type='text/javascript'>alert('You must logging in as Admin');window.location.href='".site_url(). "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
			  	exit;
			}
			else if ( is_page('change-user-password') && ! is_user_logged_in() )
			{

					echo "<script type='text/javascript'>alert('You must logging in');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
					//wp_redirect( site_url() . "/index.php/sign-in", 301 );
					exit;
			}
}


?>
