<?php
/**
 * ************************************************************
 *
 * @package adblock-notify
 * SECURITY : Exit if accessed directly
 ***************************************************************/
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct acces not allowed!' );
}

add_action( 'tf_create_options', 'an_create_options' );
/**
 * Create admin options panel
 */
function an_create_options() {

	remove_filter( 'admin_footer_text', 'addTitanCreditText' );

	/**
	 *************************************************************
	 * Launch options framework instance
	 */
	$an_option = TitanFramework::getInstance( 'adblocker_notify' );

	/**
	 *************************************************************
	 * Create option menu item
	 */
	$an_panel = $an_option->createAdminPanel(
		array(
		'name' => AN_NAME,
		'icon' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QzdGQzA2NkQ5NkM0MTFFNkJGQzE5M0VGMzhDQjZCN0UiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QzdGQzA2NkU5NkM0MTFFNkJGQzE5M0VGMzhDQjZCN0UiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDN0ZDMDY2Qjk2QzQxMUU2QkZDMTkzRUYzOENCNkI3RSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDN0ZDMDY2Qzk2QzQxMUU2QkZDMTkzRUYzOENCNkI3RSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pitcy+EAAAULSURBVEjHlZZbTFRXFIZ3X/vgWzWNMelDH+oFERC5zcitCgXSNu2DaVKwQMMQ0CJUMU2NxqQNveE1iEWt2phqHYxaASGCFi8g2mhbHOUyUObMDGIRhjPMBRhm/q61zwBaodWTLHI4e6/vX3vttdcecftcrWhtbhHtZd8Jc2a26M4rFPf2V4qODZvy/t5YbBravvPB0Oc7TLMajQ1v2dprKind/NuRE6I7O0+Ys3Iki5nMFk8J0GAXCXRmZm9SKyonvY1NGDlQCbXq8Kw2UlEJV10dnMd+RMcHWVu6cgzCvD53DoGvykU3CfSsSfvSefAQ3BdqoEREo2/xclhCwjRbHj7zTta3ZLn8NnrqZ7iOn/CZUzI2dGfmSNbTAldvij/LykVvcmqeevgHv+vseSirYmGNioNVn6hZXDxBw6GsjIF1ddLM9xg9lLBIjJ6uhvOnUxO9ySl5zGKmJvDLRdHS3Cru5+YXuY4d941WnyGHVRpclwAlRgfL0lD5Plz2NQaystG3dAWU8FXym7Ronfx/1FgNZjCLmcwWbTUNor2kdKvr6DG4GB4epUWvi4dCjrY1b2Hwk2IMlmwGP676Bjz8cD0efWyAwkHQytjYh31dxjNgFjOZLR5sLC5yVh2iPBphoaVyNNKJBDi/HDU/7oZLCIyPw3P1OiYUK3w2mwYm6JMrsayIlCxmMlsMFhV3esjZEhohI5YTg1GxgGP3XingudKMwNgYvDda4evvh89uhz3tbdhTM7SgdPFaSlmEWJ6GRgwWlXSKx9t33h+pOAALVYRVPwOfFijfowk0XUHAOwbP9RvwWa2Y6P2LVnMNPlqNLTlFSyv7EYNZXMLMFo+37TCN0HK47Kajj10tq0MK7AoKNF7WBCRUkSkaJxG/1wv7O+9RdUUHU5sgWcxk9iwCtMyIKFjI+t5YBseefTMCY154mq/KFXDkE11d8I+Owp7xrla+/yvAaaFNG/5mF7y3bsP2ZiqGviiTAv4Rlf744VdVudnSaE8mHY4XFFixkjayRYua0uHYux8IBDDXM+lwvYAAnUxuDwOZH8HvdGqRU8SzCfjp0+Q4pa3/EmxraQ8iY55zD3jCklA8/mwb/uvxTQyho20x+i+F4mF8Oh06/ewC3HId1DEti0Ome441Np4aWSj1F+OscD9ZwPktjpa/hMaz8+AujaDaTwqWaaJkMZPZgnp+B9e4EhkdbBEJwaMfJw/Q2N0/nhHwuBUEel/HzTPz0NnyCgKtr2kHLTpRaxmULmYyW5g+3Zqr7tnn89TUyYFpET6V1Dr6318Hd9NleFvb5Cl2XbsFtSsPsLyM3hvz8ejOAmBwPkbKQtC3TK/BicVMZos7xrPCVLDRoB446HNfrKdc6rQNmxKhd64s2QRDotAZFwb11wWYbF8Ec82rsDcuhM+0CN7ahTQ/ju6RBjCLmcwWd09VkxnFA0Nhrlr5vddT1yBbtRJs19Otg0837Y2i11PV6GBfo8OjND0GUlfDlhAFexJFXl9P8CovszRuNQmcNIrfSeDe7v2iZ236OvXQEbe79qJW11MXzlS3nLIoyjXnOzqJVsYdNBau8wSvOuJmBrOYyWxN4ORpYSrfK8y5+aInJT1Lrawac1+offbK/JfxGM/huezTk5KRZc41SBYznxHooUFzfgFd+jn5z3Xp05iXepRacXCSfcz5hZIxt0AO/ewwFIj2F/jZwnN4LvuYDYWS8aTAP7yvEN4lmMhKAAAAAElFTkSuQmCC',
		'id'   => AN_ID,
		)
	);

	/**
	 *************************************************************
	 * Create option panel tabs
	 */
	$generalTab       = $an_panel->createTab(
		array(
		'name' => __( 'Ad Blocker Notify Options', 'an-translate' ),
		)
	);
	$modalTab         = $an_panel->createTab(
		array(
		'name' => __( 'Modal Visual Options', 'an-translate' ),
		)
	);
	$redirectTab      = $an_panel->createTab(
		array(
		'name' => __( 'Redirection Options', 'an-translate' ),
		)
	);
	$alternativeTab   = $an_panel->createTab(
		array(
		'name' => __( 'Alternative Message', 'an-translate' ),
		)
	);
	$advancedSettings = $an_panel->createTab(
		array(
		'name' => __( 'Advanced Settings', 'an-translate' ),
		)
	);

	/**
	 *************************************************************
	 * Create tab's options
	 */
	// Adblock Notify Options
	do_action( 'an_pro_add_tab_options_top', $generalTab, $modalTab, $redirectTab, $alternativeTab );

	$generalTab->createOption(
		array(
		'name' => '',
		'desc' => '<h3 class=" ">' . __( 'Welcome to Ad Blocker Notify Plugin', 'an-translate' ) . '</h3>' . '
                    <div style="color:black; font-style: normal;">
                        <p>
                            ' . __( 'You can notify users with an activated Adblocker software by one of THREE ways !', 'an-translate' ) . '
                            <ol>
                                <li>' . __( 'A pretty cool and lightweight Modal Box with a custom content:', 'an-translate' ) . ' <i class="an-red">' . __( 'the COMPLIANT solution', 'an-translate' ) . '</i></li>
                                <li>' . __( 'A simple redirection to the page of your choice:', 'an-translate' ) . ' <i class="an-red">' . __( 'the AGRESSIVE solution', 'an-translate' ) . '</i></li>
                                <li>' . __( 'A custom alternative message where your hidden ads would normally appear:', 'an-translate' ) . ' <i class="an-red">' . __( 'the TRANSPARENT solution', 'an-translate' ) . '</i></li>
                            </ol>
                        </p>
                        <p>
                            ' . __( 'Only one of the two first options can be activated at the same time. The third one is standalone and can be setting up independently.', 'an-translate' ) . '
                            <br />
                            ' . __( 'You can easily switch between them without losing your options.', 'an-translate' ) . '
                        </p>
                         
                    </div>
		',
		'type' => 'note',
		)
	);
	$generalTab->createOption(
		array(
		'name'    => __( 'Modal Box or Redirection ?', 'an-translate' ),
		'id'      => 'an_option_choice',
		'options' => array(
			'1' => __( 'None', 'an-translate' ),
			'2' => __( 'Modal Box', 'an-translate' ),
			'3' => __( 'Page redirection', 'an-translate' ),
		 ),
		 'type'    => 'radio',
		 'desc'    => __( 'Would you like to use the Modal Box or redirect users to a custom page when adblock is detected? - Default: None', 'an-translate' ),
		 'default' => '1',
		)
	);

	$advancedSettings->createOption(
		array(
		'name' => __( 'Dashboard', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$advancedSettings->createOption(
		array(
		'name'    => __( 'Enable statistics Widget', 'an-translate' ),
		'id'      => 'an_option_stats',
		'type'    => 'select',
		'desc'    => __( 'If you have many page views, this option may cause server overload. You can disable it to make the plugin more lightweight - Default: Yes', 'an-translate' ) . '<br /> <strong class="an-red">' . __( 'Ad Blocker Notify Stats widget is available on your admin dashboard (if not visible, go to the top menu and visit "Screen Options").', 'an-translate' ) . '</strong>',
		'options' => array(
			'1' => __( 'Yes', 'an-translate' ),
			'2' => __( 'No', 'an-translate' ),
		 ),
		 'default' => '1',
		)
	);

	$advancedSettings->createOption(
		array(
		'name' => __( 'Improve detection (optional)', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$advancedSettings->createOption(
		array(
		'name' => __( 'Adverts selectors', 'an-translate' ) . ' <i>( ' . __( 'Comma separated', 'an-translate' ) . ' )</i>',
		'id'   => 'an_option_ads_selectors',
		'type' => 'text',
		'desc' => __( 'The Element CLASS or ID of your ads. - Default: Empty', 'an-translate' ) . '
			<br /><strong class="an-red">' . __( 'The selector you provide must still be present within your DOM after the ad has been blocked. We only detect the height of the element so it can not be fixed. ', 'an-translate' ) . ' </strong> 
            <br /><strong> Eg: #google-ads, .promo .adsense, .sponsored</strong> 
			<br />( ' . __( 'Read', 'an-translate' ) . ' <a href="http://api.jquery.com/category/selectors/" target="_blank">' . __( 'Selectors | jQuery API Documentation', 'an-translate' ) . '</a> ' . __( 'for more details', 'an-translate' ) . ' )',
		)
	);
	$advancedSettings->createOption(
		array(
		'name' => __( 'Cookies Options', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$advancedSettings->createOption(
		array(
		'name'    => __( 'Cookies activation', 'an-translate' ),
		'id'      => 'an_option_cookie',
		'type'    => 'select',
		'desc'    => __( 'Prevent Modal Box from opening or Page redirection on every visited page - Default: Yes', 'an-translate' ) . '<br /> <span class="an-red">' . __( 'Your own cookie is automatically reset on options save to see settings changes.', 'an-translate' ) . '</span>',
		'options' => array(
			'1' => __( 'Yes', 'an-translate' ),
			'2' => __( 'No', 'an-translate' ),
		 ),
		 'default' => '1',
		)
	);
	$advancedSettings->createOption(
		array(
		'name'    => __( 'Cookies Lifetime', 'an-translate' ) . ' <i>( ' . __( 'Days', 'an-translate' ) . ' )</i>',
		'id'      => 'an_option_cookie_life',
		'type'    => 'number',
		'desc'    => __( 'Set the lifetime of the cookie session - Default: 30 days', 'an-translate' ),
		'default' => '30',
		'min'     => '1',
		'max'     => '360',
		'step'    => '1',
		)
	);
	$advancedSettings->createOption(
		array(
		'name' => __( 'Random selectors and files', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$advancedSettings->createOption(
		array(
		'name'    => __( 'Use random selectors and files', 'an-translate' ),
		'id'      => 'an_option_selectors',
		'type'    => 'checkbox',
		'desc'    => __( 'Random selectors and files name to prevent adblock to block the plugin. Temp files with new selectors will be generated and stored in a temp folder in your /uploads directory  - Default: Checked', 'an-translate' ),
		'default' => true,
		)
	);
	$advancedSettings->createOption(
		array(
		'name'    => __( 'Flush files', 'an-translate' ),
		'id'      => 'an_option_flush',
		'type'    => 'checkbox',
		'desc'    => __( 'Will recreate the selectors and temps files on options saved.', 'an-translate' ),
		'default' => false,
		)
	);
	// Modal Visual Options
	$modalTab->createOption(
		array(
		'name' => __( 'Modal Box Options', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Title', 'an-translate' ),
		'id'      => 'an_modal_title',
		'type'    => 'text',
		'desc'    => __( 'The title of the modal box', 'an-translate' ),
		'default' => __( 'Adblocker detected! Please consider reading this notice.', 'an-translate' ),
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Text', 'an-translate' ),
		'id'      => 'an_modal_text',
		'type'    => 'editor',
		'rows'    => '13',
		'desc'    => __( 'The text of the modal box : images & shortcodes are supported.', 'an-translate' ),
		'default' => '
                        <p>' . __( 'We\'ve detected that you are using AdBlock Plus or some other adblocking software which is preventing the page from fully loading.', 'an-translate' ) . '</p>
                        <p>' . __( 'We don\'t have any banner, Flash, animation, obnoxious sound, or popup ad. We do not implement these annoying types of ads!', 'an-translate' ) . '</p>
                        <p>' . __( 'We need money to operate the site, and almost all of it comes from our online advertising.', 'an-translate' ) . '</p> 
                        <p><strong>' . __( 'Please add', 'an-translate' ) . ' <a title="' . get_bloginfo( 'name' ) . '" href="' . get_bloginfo( 'url' ) . '" target="_blank">' . preg_replace( '#^https?://#', '', rtrim( get_bloginfo( 'url' ), '/' ) ) . '</a> ' . __( 'to your ad blocking whitelist or disable your adblocking software.', 'an-translate' ) . '<strong></p>
                    ',
		)
	);
	$modalTab->createOption(
		array(
		'name' => __( 'Modal Box Settings', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Box effect', 'an-translate' ),
		'id'      => 'an_option_modal_effect',
		'type'    => 'select',
		'desc'    => __( 'The Modal Box animation effect - Default: Fade and Pop', 'an-translate' ),
		'options' => array(
			'1' => __( 'Fade and Pop', 'an-translate' ),
			'2' => __( 'Fade', 'an-translate' ),
			'3' => __( 'None', 'an-translate' ),
		 ),
		 'default' => '1',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Animation Speed', 'an-translate' ) . ' <i>( ' . __( 'Milliseconds', 'an-translate' ) . ' )</i>',
		'id'      => 'an_option_modal_speed',
		'type'    => 'number',
		'desc'    => '<i>' . __( 'The Modal Box animation speed. Will not be applied if modal effect is set to  None - Default: 350ms', 'an-translate' ) . '</i>',
		'default' => '350',
		'min'     => '0',
		'max'     => '5000',
		'step'    => '10',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Hide modal box close button', 'an-translate' ),
		'id'      => 'an_option_modal_cross',
		'type'    => 'select',
		'desc'    => __( 'Hide the x close button of the modal box? - Default: No', 'an-translate' ),
		'options' => array(
			'1' => __( 'Yes', 'an-translate' ),
			'2' => __( 'No', 'an-translate' ),
		 ),
		 'default' => '2',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Close the modal box on background click', 'an-translate' ),
		'id'      => 'an_option_modal_close',
		'type'    => 'select',
		'desc'    => __( 'If you click background will Modal close? - Default: Yes', 'an-translate' ),
		'options' => array(
			'1' => __( 'Yes', 'an-translate' ),
			'2' => __( 'No', 'an-translate' ),
		 ),
		 'default' => '1',
		)
	);
	$modalTab->createOption(
		array(
		'name' => __( 'Modal Box Style', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Overlay Color', 'an-translate' ) . ' <i>( ' . __( 'Background', 'an-translate' ) . ' )</i>',
		'id'      => 'an_option_modal_bgcolor',
		'type'    => 'color',
		'default' => '#000000',
		'desc'    => __( 'Default:', 'an-translate' ) . ' #000000',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Overlay Opacity', 'an-translate' ) . ' <i>(%)</i>',
		'id'      => 'an_option_modal_bgopacity',
		'type'    => 'number',
		'desc'    => '<i>' . __( 'Modal Box overlay (background) opacity - Default: 80%', 'an-translate' ) . '</i>',
		'default' => '80',
		'min'     => '0',
		'max'     => '100',
		'step'    => '5',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Box Background Color', 'an-translate' ),
		'id'      => 'an_option_modal_bxcolor',
		'type'    => 'color',
		'default' => '#dddddd',
		'desc'    => __( 'Default:', 'an-translate' ) . ' #dddddd',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Box Title Color', 'an-translate' ),
		'id'      => 'an_option_modal_bxtitle',
		'type'    => 'color',
		'desc'    => __( 'Default is your theme &lt;h1&gt; color', 'an-translate' ),
		'default' => '',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal Box Text Color', 'an-translate' ),
		'id'      => 'an_option_modal_bxtext',
		'type'    => 'color',
		'desc'    => __( 'Default is your theme body text color', 'an-translate' ),
		'default' => '',
		)
	);
	$modalTab->createOption(
		array(
		'name' => __( 'Custom CSS', 'an-translate' ) . ' <br /><i>( ' . __( 'Advanced users', 'an-translate' ) . ' )<i>',
		'id'   => 'an_option_modal_custom_css',
		'type' => 'code',
		'desc' => __(
			'Put your custom CSS rules here. Modal Box ID is', 'an-translate'
		) . ' <strong class="an-red">#an-Modal</strong>
                <br /><br /><strong class="an-red">' . __( 'This selector will be changed during settings update by a random new one to prevent adblock to hide this element. All the CSS and JS files are parsed to be updated with this new selectors. That is why you have to add your custom style in the above field and not in you theme stylesheet.', 'an-translate' ) . '</strong>',
		 'lang' => 'css',
		)
	);
	// Redirection Options
	$redirectTab->createOption(
		array(
		'name' => __( 'Target Page', 'an-translate' ),
		'id'   => 'an_page_redirect',
		'type' => 'select-pages',
		'desc' => __( 'Select a page to redirect to. List your current published pages', 'an-translate' ),
		)
	);
	$redirectTab->createOption(
		array(
		'name' => __( 'No JS Redirection', 'an-translate' ) . ' <span class="blink an-red">' . __( 'Warning', 'an-translate' ) . '</span>',
		'type' => 'heading',
		)
	);
	$redirectTab->createOption(
		array(
		'name'    => __( 'Redirect if no JS detected?', 'an-translate' ),
		'id'      => 'an_page_nojs_activation',
		'type'    => 'checkbox',
		'desc'    => __( 'Yes', 'an-translate' ) . '  <i>( ' . __( 'This option used your Cookies Options', 'an-translate' ) . ' )</i> - ' . __( 'Default: Unchecked', 'an-translate' ) . '<br /><strong class="an-red">' . __( 'Will redirect visitor to a custom page if Javascript is disable. It is NOT SEO friendly, use it only on private site.', 'an-translate' ) . '</strong>',
		'default' => false,
		)
	);
	$redirectTab->createOption(
		array(
		'name' => __( 'Target Page', 'an-translate' ),
		'id'   => 'an_page_nojs_redirect',
		'type' => 'select-pages',
		'desc' => __( 'Select a page to redirect to. List your current published pages', 'an-translate' ),
		)
	);

	// Alternative Message Options
	$alternativeTab->createOption(
		array(
		'name' => '<h3>' . __( 'Alternative Message', 'an-translate' ) . '</h3>',
		'desc' => '
                    <div style="color:black; font-style: normal;">
                        <p>
                            ' . __( 'You can insert a custom message where your hidden ads would normally appear.', 'an-translate' ) . '
                        </p><p>
                            ' . __( 'The plugin will append a new "clean" DIV element just before the advert container to display your custom message.', 'an-translate' ) . '
                        </p><p>
                            <strong>' . __( 'Note:', 'an-translate' ) . '</strong> ' . __( 'Some minimal HTML knowledge is required to set up this functionality.', 'an-translate' ) . '
                        </p>
                    </div>
		',
		'type' => 'note',
		)
	);
	$alternativeTab->createOption(
		array(
		'name'    => __( 'Activate this option?', 'an-translate' ),
		'id'      => 'an_alternative_activation',
		'type'    => 'checkbox',
		'desc'    => __( 'Yes - Default: Unchecked', 'an-translate' ) . '<br /><strong class="an-red">' . __( 'If unchecked, below options will not be used', 'an-translate' ) . '</strong>',
		'default' => false,
		)
	);
	$alternativeTab->createOption(
		array(
		'name' => __( 'Required Settings', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$alternativeTab->createOption(
		array(
		'name' => __( 'Advert containers', 'an-translate' ) . ' <i>( ' . __( 'Comma separated', 'an-translate' ) . ' )</i>',
		'id'   => 'an_alternative_elements',
		'type' => 'text',
		'desc' => __( 'The Element CLASS or ID of your ads containers. - Default: Empty', 'an-translate' ) . '
            <br /><strong> Eg: #my-ad, .hentry .adsense, .sponsored</strong> 
			<br />( ' . __( 'Read', 'an-translate' ) . ' <a href="http://api.jquery.com/category/selectors/" target="_blank">' . __( 'Selectors | jQuery API Documentation', 'an-translate' ) . '</a> ' . __( 'for more details', 'an-translate' ) . ' )',
		)
	);
	$alternativeTab->createOption(
		array(
		'name'    => __( 'Alternative Text', 'an-translate' ),
		'id'      => 'an_alternative_text',
		'type'    => 'editor',
		'rows'    => '8',
		'desc'    => __( 'The alternative text to display when ads are hidden. Images & shortcodes are supported, but use them with caution.', 'an-translate' ),
		'default' => '
                        <p><strong>' . __( 'AdBlock detected!', 'an-translate' ) . '</strong></p>
                        <p>' . __( 'Please add', 'an-translate' ) . ' <a title="https://getadmiral.com?utm_medium=plugin&utm_campaign=abn&utm_source=abnlinks" href="themeisle.com" target="_blank">www.getadmiral.com</a> ' . __( 'to your adblocking whitelist or disable your adblocking software.', 'an-translate' ) . '</p>
			',
		)
	);
	$alternativeTab->createOption(
		array(
		'name' => __( 'Optional Settings', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$alternativeTab->createOption(
		array(
		'name'    => __( 'Clone ad container?', 'an-translate' ),
		'id'      => 'an_alternative_clone',
		'type'    => 'select',
		'desc'    => __( 'Will copy your original ad container CSS properties - Default: No', 'an-translate' ) . '<br /><strong>' . __( 'This feature is not 100% reliable but could help for a quick set up.', 'an-translate' ) . '</strong>',
		'options' => array(
			'1' => __( 'Custom Mode', 'an-translate' ),
			'2' => __( 'Soft Mode (Recommended)', 'an-translate' ),
			'3' => __( 'Hard Mode', 'an-translate' ),
			'4' => __( 'No', 'an-translate' ),
		 ),
		 'default' => '2',
		)
	);
	$alternativeTab->createOption(
		array(
		'type' => 'note',
		'desc' => '
                    <div style="color:black; font-style: normal;">
                        <p>
                            <strong class="an-red">' . __( 'What does "Clone ad container" mean?', 'an-translate' ) . '</strong>
                            <br />
                            ' . __( 'It means you can ask Ad Blocker Notify Plugin to copy the CSS properties of the element that contains your ad to a new element which will not be hidden by an adblocker software. With this process, your design should not break.', 'an-translate' ) . '
                            <br />
                            ' . __( 'The new element will be the same type (DIV,SPAN,etc.) as its source, and will have the .an-alternative class.', 'an-translate' ) . '
                        </p>
                        <p>
                        ' . __( 'Available options are:', 'an-translate' ) . '
                        <ol>
                            <li><i class="an-red">' . __( 'Custom Mode', 'an-translate' ) . '</i>' . __( ': Will try to catch all the CSS rules defined in your theme files, and let you choose which ones to keep (see Custom Mode CSS properties).', 'an-translate' ) . '</li>
                            <li><i class="an-red">' . __( 'Soft Mode (Recommended)', 'an-translate' ) . '</i>' . __( ': Will try to catch all the CSS rules defined in your theme files, and add them to the new created element. If the browser does not support this feature, it will try Hard Mode fetching.', 'an-translate' ) . '</li>
                            <li><i class="an-red">' . __( 'Hard Mode', 'an-translate' ) . '</i>' . __( ': Will try to fetch all the elements CSS rules based on browser CSS compilation (not reading directly in your CSS files). This option may add a lot of inline CSS rules to your newly created element.', 'an-translate' ) . '</li>
                        </ol>
                        </p>
                        <p>
                            ' . __( 'This feature is performed through Javascript (+jQuery) and is 95% functional on all modern browser even on IE8+. For the 5% left, the plugin will drop potential JS errors and insert .an-alternative div.', 'an-translate' ) . '
                            <br />
                            <strong><i>' . __( 'Tested and works great on Chrome, Firefox, Safari, Opera, IE8+', 'an-translate' ) . '</i></strong>
                        </p>
                        <p>
                            <strong class="an-red">' . __( 'What\'s appended if I don\'t turn on this option?', 'an-translate' ) . '</strong>
                            <br />
                            ' . __( 'The plugin will append a new "clean" DIV element with .an-alternative class just before the advert container. You can add your own custom rules with the Custom CSS field below.', 'an-translate' ) . '
                        </p>
                    </div>
		',
		)
	);
	$alternativeTab->createOption(
		array(
		'name' => __( 'Custom Mode CSS properties', 'an-translate' ) . ' <i>( ' . __( 'Comma separated', 'an-translate' ) . ' )</i>',
		'id'   => 'an_alternative_properties',
		'type' => 'text',
		'desc' => __( 'The element CSS properties you want to clone - Default: Empty', 'an-translate' ) . '
			<br /><strong>  ' . __( 'Eg: color, width, height, background-color, border', 'an-translate' ) . '</strong> 
			<br />( ' . __( 'Read', 'an-translate' ) . ' <a href="http://www.w3schools.com/cssref/" target="_blank"> ' . __( 'CSS Reference | w3schools.com', 'an-translate' ) . '</a>  ' . __( 'for more details', 'an-translate' ) . ' )
			',
		)
	);
	$alternativeTab->createOption(
		array(
		'name' => __( 'Custom CSS', 'an-translate' ) . ' <br /><i>( ' . __( 'Advance users', 'an-translate' ) . ' )<i>',
		'id'   => 'an_alternative_custom_css',
		'type' => 'code',
		'desc' => __( 'Put your custom CSS rules here. The new Element class is .an-alternative', 'an-translate' ) . '
                    <p>
                        <strong> ' . __( 'NOTE:', 'an-translate' ) . '</strong>  ' . __( 'If you\'ve activated the ads containers cloning, you can still add custom CSS on your text.', 'an-translate' ) . '
                        <br /> ' . __( 'If you really have to overload .an-alternative with your own CSS properties, you may probably need to use !important after each of them, but this is not advised.', 'an-translate' ) . '
                        <br /><br /><strong class="an-red">' . __( 'This selector will be changed during settings update by a random new one to prevent adblock to hide this element. All the CSS and JS files are parsed to be updated with this new selectors. That is why you have to add your custom style in the above field and not in you theme stylesheet.', 'an-translate' ) . '</strong>
                    </p>',
		'lang' => 'css',
		)
	);

	do_action( 'an_pro_add_tab_options', $generalTab, $modalTab, $redirectTab, $alternativeTab );

	/**
	 *************************************************************
	 * Launch options framework instance
	 */
	$generalTab->createOption(
		array(
		'type'  => 'save',
		'save'  => __( 'Save Changes', 'an-translate' ),
		'reset' => __( 'Reset to Defaults', 'an-translate' ),
		)
	);
	$advancedSettings->createOption(
		array(
		'type'  => 'save',
		'save'  => __( 'Save Changes', 'an-translate' ),
		'reset' => __( 'Reset to Defaults', 'an-translate' ),
		)
	);

	$modalTab->createOption(
		array(
		'type'  => 'save',
		'save'  => __( 'Save Changes', 'an-translate' ),
		'reset' => __( 'Reset to Defaults', 'an-translate' ),
		)
	);

	$redirectTab->createOption(
		array(
		'type'  => 'save',
		'save'  => __( 'Save Changes', 'an-translate' ),
		'reset' => __( 'Reset to Defaults', 'an-translate' ),
		)
	);

	$alternativeTab->createOption(
		array(
		'type'  => 'save',
		'save'  => __( 'Save Changes', 'an-translate' ),
		'reset' => __( 'Reset to Defaults', 'an-translate' ),
		)
	);

}

/**
 * Pro options in READ mode
 */

add_filter( 'an_get_all_templates', 'an_add_free_template' );
/**
 * Alter the templates in the options panel
 *
 * @param array $array Templates to load.
 *
 * @return mixed Templates available
 */
function an_add_free_template( $array ) {
	$array['an-default'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKoAAAB9CAIAAAC9L29CAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MEEwRkJGOEQ5MTNGMTFFNkIwODFENzU1RjUyNzVGRkUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MEEwRkJGOEU5MTNGMTFFNkIwODFENzU1RjUyNzVGRkUiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowQTBGQkY4QjkxM0YxMUU2QjA4MUQ3NTVGNTI3NUZGRSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowQTBGQkY4QzkxM0YxMUU2QjA4MUQ3NTVGNTI3NUZGRSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PksOOaEAAEtfSURBVHja7L0FgFzVuTh+be7cO+6yY+uSlWyUhARIoMDDKdTfv5S21I2+9lEXrBQoLdSFFukrbaHQUh7FkgAxsrHNuu/szo67Xpf/vXdmNxssAQLl98hhM1w5ds93znc+P+CVV14Zj8dFUQRBEDiV3jFJArfL5UJIkrzuuussFosgCKcG5R2SUBQ9dOjQH//4R0StVm/dulWv158alHdUkvD9fffdB0mLXkIAp4bjnZYoipJ+oVMD8U5Op8B/Cvyn0inwn0r/V0g68WWfngL/O4ShB/KZ1NDwGMULNJEfGhjMl8lXEuogp8br/xj0pX8CT8cj8xRDAXQlT4ieBvEU8n+nJImTtzi8vd3tqchCskD2rF5lMWhOIf93xs4vI3+ILBeD8xFMb8QRIBScJWnmlZD/yQb/MbNMuqn9t0SQHJ2GoiDWcovKP/l26RuOXgHAS7OJtUe1/1f/ibVmxFqRWga5yHKyaKlDR2mixb9l7S41sNQRsVb5sk+pfaBSSDi2QqU8/xLYCMvps2XViUvVKf+Eai+VqmutHC0BiMfd+8uFXIVie1evW9W9opTPlgjyLUH+Su8EMvPZj33k/Z+7vsDJG5HUaVBRMGSDI1df9enhUObPP7nj2z/5MwBCoNxVIDU7/uEPf/5IKAsC4NL2BcqzQ6w+qGYrpuau/tg1L0wl5FvptcgrXwoqmQVBakV5oUxzXhkoQckAMJnwxz7x6W2HpoDqe0BpBwRL6Zm77/krKVcjVGuSe6s0u1ix/EPlo7++98EswdeyKHWIQhXc8v3eZ//+/s9+J0sJd9/0/a/d/AfprdwZABzq23bxxe/Zeu7lZ557xee/fUe6RM0efOoj13w1WaQBcLEmBVuLS18NypAXRajaS7A2omKt1Vcm4Jfv/FIeW51/06bNEs43O+s2b95oNxneEuSvdPPw7h0vHBw9tPvZHfunqyNOVjI7d+8LhkKjw+MVEojOBSdDidGRoYPDk1IhnigNDoyXKXkoktHwE089OxtLVQsKHLVn1+7dBwc4ARDYysDAECUg2Xho++4DHACJDLHr2eeOTMxKM0lk6eHhocnJiZ37DpO8NBtACIIYiti9u28iGBobHUsVZBlnLBR88pnnUiVSauyR//n9bT/+3e79owAAJ6LK80IFAuWhz6ZiTz+9fXw2KhV54q8P3njrL3f2DUhdyiZDTz3zXCxVlGqXupeKhPbs6w8tRI+Mz7EiHJqamZqNL9FfhUR0OpZ+939+6KPvOe/5h/90231PCUxpYGiCFeUxP7K/b2ffEV75TJFnDx7Y//Rze/NlSuo2wFF9e194esfuSCqnAB0aHezfvms/xUvNiidG/IMoilTRFYqqXyUnclI3Hqmz/CMPP3bO//dFR+Hggw//8/LTv0IXYp/77BdmcmjAjlUAjUqFGI36ye077qLmDh4euebr37mi24zjGlyLD+198trv/MJoNacL5S9/4/uXbW6+7sv/dWQuRxXy6y764Lc/eobZaqNSM9d+7Xbf1g9s7m3+6te/NZ/jKLLynqs+++HzOr597X+lIeOms7asXrcalmYOWbju2v/eN11YUW/MEoDJqJ0+tOPaG+7WG7X3PPDYrTd/ZXR8oVIpPrtzvwPO3HDbz1G95e77H7nljh/o8hOfuPZ6ENPF0pVvfe+bY+NBnips37O/1crecOOdoMZC3fOX62+71UHMXPXJb2ldAbAS02hdKAzY/Hob7Dw6GhCss9i6OptxOmfSIRIGVqlQrUaPgdwffnbnwzuO4Cr48TVbbv7Kh++587a/7BjWI8zv7O333Pn1O2/6/r6ZohETnW1rf/SdT/3j/l/++uG9Zh3yt3/tuu37X9KrTxQaVfz16ggDOqmLH8hHxrcfnFmzYd3G1SuH9u5cqAgDO545HBIfeOieb3zqvbBI8wJA0rQ90H7XXXd886PvuvvXf0nnORWqgrnCT3/8q54LPvjIg/d94tzVP/nZfc8/8/izh2K/v/e+h//08w9duBHgeRVHfPnTX8raVt78pfcO7Hj0n89PXPH+96+tN9z+09/EijxDsOdd+bFbv/V5nbxEoPEDz+3on//dH++55bpPGVQSOczfd88fKYPzkx99X3J4/2//OfDRD13Y1Np549c/8qd7f1VS+z9x1XvSkwf+8Ndtf73/j3j9pn/87Y933/nt3hXNV155trux86brPvG/992/wFqu+cj72OjY7//46D8eeQj2rfzL/T//0EWbeZoEYcBoc5itJmUc5BFXq9FCcPLTn/jSxz/7HWvbmf919cUUQcNqODk7de99j6455+IrL1j3x9/99sBsbsv5//H5T199wZbVRwYPRbPpsYlRATNeeuUVH//PS5ls9Ge/eah51Rn/+e5znnjo/n8pCPW4S//oFlrbD8G3iO/f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';

	$array['an-ok'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALgAAAB9CAIAAACedD6XAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QzlEQTBBRUI5MTNFMTFFNjhDNDY4OEIyODhDRTY0MTYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QzlEQTBBRUM5MTNFMTFFNjhDNDY4OEIyODhDRTY0MTYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDOURBMEFFOTkxM0UxMUU2OEM0Njg4QjI4OENFNjQxNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpDOURBMEFFQTkxM0UxMUU2OEM0Njg4QjI4OENFNjQxNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmmwWnUAAECSSURBVHja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';

	$array['an-image'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMYAAAB9CAIAAAB29Iu8AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RUUxRUY0QUE5MTNFMTFFNjk3M0JBMDdDQjU4RDkwNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RUUxRUY0QUI5MTNFMTFFNjk3M0JBMDdDQjU4RDkwNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFRTFFRjRBODkxM0UxMUU2OTczQkEwN0NCNThEOTA2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFRTFFRjRBOTkxM0UxMUU2OTczQkEwN0NCNThEOTA2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Po4CfhwAAIrISURBVHja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';

	return $array;
}

/**
 * ************************************************************
 * Add additional features in the tabs but as the first items
 ***************************************************************/
function an_pro_add_tab_options_top( $generalTab, $modalTab, $redirectTab, $alternativeTab ) {
	$templates         = apply_filters( 'an_get_all_templates', array() );
	$an_option         = unserialize( an_get_option( 'adblocker_notify_options' ) );
	$selected_template = isset( $an_option['an_option_modal_template'] ) ? $an_option['an_option_modal_template'] : 'an-default';

	if ( isset( $_GET['an_option_modal_template'] ) ) {
		$selected_template = $_GET['an_option_modal_template'];
	}

	$modalTab->createOption(
		array(
		'name' => __( 'Modal Box Template', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Choose Template', 'an-translate' ),
		'id'      => 'an_option_modal_template',
		'options' => $templates,
		'type'    => 'radio-image',
		'default' => $selected_template,
		)
	);

	apply_filters( 'an_show_template_options', $modalTab, $selected_template );
}

/**
 * ************************************************************
 * Add additional features in the tabs but as the last items
 ***************************************************************/
function an_pro_add_tab_options( $generalTab, $modalTab, $redirectTab, $alternativeTab ) {
	$modalTab->createOption(
		array(
		'name' => __( 'Advanced Options', 'an-translate' ),
		'type' => 'heading',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Show modal after pages viewed', 'an-translate' ),
		'id'      => 'an_option_modal_after_pages',
		'type'    => 'number',
		'desc'    => __( 'After how many unique pages should the modal be shown? - Default: 0 (every page)', 'an-translate' ),
		'default' => '0',
		'min'     => '0',
		'max'     => '100',
		'step'    => '1',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Modal width', 'an-translate' ),
		'id'      => 'an_option_modal_width',
		'type'    => 'number',
		'desc'    => __( 'Maxium width of the modal window in pixels', 'an-translate' ),
		'default' => '720',
		'min'     => '200',
		'max'     => '1000',
		'step'    => '1',
		)
	);
	$modalTab->createOption(
		array(
		'name'    => __( 'Undismissable popup', 'an-translate' ),
		'id'      => 'an_option_modal_dismiss',
		'type'    => 'checkbox',
		'desc'    => __( 'Prevent user from dismissing modal ', 'an-translate' ),
		'default' => false,
		)
	);
}

add_action( 'an_pro_add_tab_options_top', 'an_pro_add_tab_options_top', 10, 4 );
add_action( 'an_pro_add_tab_options', 'an_pro_add_tab_options', 10, 4 );
