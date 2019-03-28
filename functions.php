<?php
  //remove_filter( 'the_content', 'wpautop' );

  // custom admin style sheet
  function my_admin_head() {
          echo '<link href="'.get_stylesheet_directory_uri().'/wp-admin.css" rel="stylesheet" type="text/css">';
  }
  add_action('admin_head', 'my_admin_head');


  // Admin always in english
  add_filter('locale', 'wpse27056_setLocale');
  function wpse27056_setLocale($locale) {
      if ( is_admin() ) {
          return 'en_US';
      }

      return $locale;
  }


  // Add Options Page
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();
    acf_add_options_sub_page('Video');
    acf_add_options_sub_page('Text');
    acf_add_options_sub_page('Downloads');

  }


  // Dashboard help
    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

    function my_custom_dashboard_widgets() {
      global $wp_meta_boxes;

      wp_add_dashboard_widget('custom_help_widget', 'Documentation', 'custom_dashboard_help');
    }

    function custom_dashboard_help() {
      echo '<p>
              <ul class="help">
                <li>Original video files are available <a href="https://box.wolan.net/cc_videos">here</a>.<br>You may update the videos with any video uploaded to YouTube, but the link as to be similar in structure to this one: <a href="https://www.youtube.com/watch?v=iYbLg_KROJ0" target="_blank">https://www.youtube.com/watch?v=iYbLg_KROJ0</a>. <br>Short or custom links, and embeds are not supported.</li>
              </ul>
            </p>';
    }


    // Drag and Drog helper text
    add_action('admin_footer', 'drag_help');
    function drag_help()
    {
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : NULL ;

        $message = NULL;

        if ($uri AND strpos($uri,'edit.php'))
        {
          $message = "To reorder item's positions you can drag and drop between them.";
        }

        if ($message)
        {
            ?><script>
                jQuery(function($)
                {
                    $('<div style="margin-bottom:15px; color:#999;"></div>').text('<?php echo $message; ?>').insertAfter('#wpbody-content .wrap h2:eq(0)');
                });
            </script><?php
        }
    }

?>
