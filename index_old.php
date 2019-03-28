<?php
/**
 * The main template file.
 *
 *
 * @package cctoolkit
 */

get_header(); ?>

<div id="header" class="container">
  <div class="row">
    <div id="title" class="col-sm-6">
      <h1>
        <?php if (qtranxf_getLanguage() == "en") { ?>
          CC Toolkit for Business
        <?php } elseif (qtranxf_getLanguage() == "es") { ?>
          Herramientas CC para los Negocios
        <?php } elseif (qtranxf_getLanguage() == "pt") { ?>
          Toolkit CC para Negócios
        <?php } ?>
      </h1>
    </div>
    <div id="lang_switch" class="col-sm-6">
      <?php the_widget('qTranslateXWidget', array('type' => 'both', 'hide-title' => true, 'flags' => 'all') ) ?>
    </div>
  </div>
</div>


<div id="intro" class="container">
  <div class="row">
    <div id="intro_text" class="col-sm-6">
      <?php
        $my_postid = 1;//This is page id or post id
        $content_post = get_post($my_postid);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;

        ?>
      <button type="button" class="btn btn-success">
        <?php if (qtranxf_getLanguage() == "en") { ?>
          Download
        <?php } elseif (qtranxf_getLanguage() == "es") { ?>
          Descargar
        <?php } elseif (qtranxf_getLanguage() == "pt") { ?>
          Descarregar
        <?php } ?>
      </button>
    </div>
    <div id="intro_video" class="col-sm-6">
      <p>
        <?php if (qtranxf_getLanguage() == "en") { ?>
          EN YouTube video
        <?php } elseif (qtranxf_getLanguage() == "es") { ?>
          ES Youtube Video con subtítulos
        <?php } elseif (qtranxf_getLanguage() == "pt") { ?>
          PT Youtube Video com legendas ou voiceover?
        <?php } ?>
      </p>
    </div>
  </div>
</div>


<div id="content" class="container">
  <div class="row">
    <div id="references" class="col-sm-6">
      <h3>
        <?php if (qtranxf_getLanguage() == "en") { ?>
          Links
        <?php } elseif (qtranxf_getLanguage() == "es") { ?>
          Enlaces
        <?php } elseif (qtranxf_getLanguage() == "pt") { ?>
          Ligações
        <?php } ?>
      </h3>
      <!-- Links -->
        <?php

          $posts = get_posts(array(
            'posts_per_page'  => -1,
            'post_type'     => 'link'
          ));

          if( $posts ): ?>

            <ul>

            <?php foreach( $posts as $post ):

              setup_postdata( $post )

            ?>
              <li>
                <a href="<?php strip_tags(the_content()); ?>" target="_blank"><?php the_title(); ?></a>
              </li>

            <?php endforeach; ?>

          </ul>

          <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>
    <div id="downloads" class="col-sm-6">
      <h3>
        <?php if (qtranxf_getLanguage() == "en") { ?>
          Other Downloads
        <?php } elseif (qtranxf_getLanguage() == "es") { ?>
          Otras Descargas
        <?php } elseif (qtranxf_getLanguage() == "pt") { ?>
          Outros Descarregamentos
        <?php } ?>
      </h3>
      <!-- Downloads -->
        <?php

          $posts = get_posts(array(
            'posts_per_page'  => -1,
            'post_type'     => 'download'
          ));

          if( $posts ): ?>

            <ul>

            <?php foreach( $posts as $post ):

              setup_postdata( $post )

            ?>
              <li>
                <a href="<?php strip_tags(the_content()); ?>" target="_blank"><?php the_title(); ?></a>
              </li>

            <?php endforeach; ?>

          </ul>

          <?php wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>
  </div>

</div>



<?// echo qtranxf_getLanguage(); ?>

<?php /*
$my_postid = 1;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
*/
?>



<?php get_footer(); ?>

