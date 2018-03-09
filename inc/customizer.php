<?php
/**
 * Amigawp Theme Customizer
 *
 * @package Amigawp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amigawp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'amigawp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'amigawp_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_section('wbstyle', array (
		'title' => __('Workbench Style', 'amigawp'),
		'priority' => 130
	));
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '1',		
		'type' => 'theme_mod',
	));
	
	$wp_customize->add_control('color_scheme', array(
		'label' => __('Version', 'amigawp'),
		'section' => 'wbstyle',
		'type' => 'radio',
		'choices' => array(
			'1' => '1.0',
			'2' => '2.0',
		),
		'priority' => 1
	));

    $wp_customize->add_section('wbpadding', array (
		'title' => __('Content Spacing', 'amigawp'),
		'priority' => 140
	));
	
	$wp_customize->add_setting('padding_style', array(
		'default' => 'original',		
		'type' => 'theme_mod',
	));
	
	$wp_customize->add_control('padding_style', array(
		'label' => __('Content Padding', 'amigawp'),
		'section' => 'wbpadding',
		'type' => 'radio',
		'choices' => array(
			'original' => 'Original',
			'spaced' => 'Spaced',
		),
		'priority' => 1
	));
    
    $wp_customize->add_section('wbdisks', array (
		'title' => __('Disk Icons', 'amigawp'),
		'priority' => 150
	));
	
	$wp_customize->add_setting('disk_icons', array(
		'default' => 'yes',		
		'type' => 'theme_mod',
	));
	
	$wp_customize->add_control('disk_icons', array(
		'label' => __('Display Disk Icons', 'amigawp'),
		'section' => 'wbdisks',
		'type' => 'radio',
		'choices' => array(
			'yes' => 'Yes',
			'no' => 'No',
		),
		'priority' => 1
	));
	
	$wp_customize->add_section('guru', array (
		'title' => __('404/Guru Meditation', 'amigawp'),
		'priority' => 160
	));
	
	$wp_customize->add_setting('guru_meditation', array(
		'default' => 'enabled',		
		'type' => 'theme_mod',
	));
	
	$wp_customize->add_control('guru_meditation', array(
		'label' => __('Guru Meditation on 404 page', 'amigawp'),
		'section' => 'guru',
		'type' => 'radio',
		'choices' => array(
			'enabled' => 'Enabled',
			'disabled' => 'Disabled',
		),
		'priority' => 1
	));
	
	// footer text
	$txtcolors[] = array(
		'slug'=>'footer_text', 
		'default' => '#fff',
		'label' => 'Footer Text'
	);
	
	$wp_customize->add_section('custom_footer_text', array (
		'title' => __('Footer Text/Credits', 'amigawp'),
		'priority' => 500
	));
	
	$wp_customize->add_setting('footer_text_block', array(
		'default' => __('Copyright &copy; 2018 · AmigaWP Theme · By: <a href="https://www.sidneysacchi.com" target="_blank" title="Web Design &amp; Web Consulting">Sidney Sacchi</a> · A tribute to Amiga Workbench (Version 1 and 2) · Based on <a href="http://underscores.me/">Underscores.me</a> Theme<br />Credits and Thanks to:<br>patrick h. lauke aka redux [<a href="https://www.splintered.co.uk/" target="_blank">https://www.splintered.co.uk/</a>] for the fonts<br>and to <a href="http://www.amiga-look.org/" target="_blank">http://www.amiga-look.org/</a> and <a href="http://www.geekometry.com" target="_blank">http://www.geekometry.com/</a> for icons and cursors' , 'amigawp'),
		#'sanitize_callback' => 'sanitize_text'		
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_footer_text', array( 
		'label' => __( 'Footer Text/Credits', 'amigawp' ), 
		'section' => 'custom_footer_text', 
		'settings' => 'footer_text_block', 		
		'type' => 'text'
		))); 
		
	// Sanitize text 
	
		function sanitize_text( $text ) {
		return sanitize_text_field( $text ); 
		}
}
add_action( 'customize_register', 'amigawp_customize_register' );

function amigawp_customizer_css() {
    if( in_array(get_theme_mod('color_scheme'), array('1'))) { 
        wp_enqueue_style('workbench-style-one', get_template_directory_uri() . '/layouts/one.css'); // enqueueing the required CSS code
    } else {
        wp_enqueue_style('workbench-style-two', get_template_directory_uri() . '/layouts/two.css'); // enqueueing the required CSS code
    }  

    if( in_array(get_theme_mod('padding_style'), array('original'))) { 
        
    } else { ?>
    <style type="text/css">
        .spaced,#comments {
            padding:20px!important;        
        }
        #primary p,blockquote,#primary li {
        margin-bottom:20px!important;
        line-height:1.3;
        }
    </style>    
    <?php
    }  
    if( in_array(get_theme_mod('guru_meditation'), array('enabled'))) { 
	?>	
	
    <?php } else { ?>
    <style type="text/css">
        .guru {
            display:none!important;        
        }
    </style>    
    <?php
    }  
	
	if( in_array(get_theme_mod('disk_icons'), array('yes'))) { 
        
    } else { ?>
    <style type="text/css">
        .disks {
            display:none!important;        
        }
    </style>    
    <?php
    }  
}

add_action( 'wp_head', 'amigawp_customizer_css' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function amigawp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function amigawp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amigawp_customize_preview_js() {
	wp_enqueue_script( 'amigawp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'amigawp_customize_preview_js' );

function remove_customizer_settings( $wp_customize ){
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('background_image');

}
add_action( 'customize_register', 'remove_customizer_settings', 20 );

