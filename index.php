<?php
/**
 * The main template file.
 *
 *
 * @package cctoolkit
 */

include 'translations.php';

get_header();

?>



  <!-- Global wrapper -->
  <div id="wrapper">

    <div class="container global">

      <header>
        <!-- Desktop -->
        <div class="row">
          <!-- Logo -->
          <div class="col-md-6">
            <h1><img src="/wp-content/themes/cctoolkit/img/logo/<?= $logo_link ?>" class="img-responsive"/></h1>
          </div>
          <!-- Menus -->
          <div class="col-md-6">
            <div id="lang_switcher" class="hidden-xs">
               <?php the_widget('qTranslateXWidget', array('type' => 'list-item', 'hide-title' => true) ) ?>
            </div>
            <nav class="hidden-xs">
              <ul>
                <li><a href="#intro"><?= $word_introduction ?></a></li>
                <li><a href="#content"><?= $word_how ?></a></li>
                <li><a href="#links"><?= $word_links ?></a></li>
                <li><a href="#downloads"><?= $word_downloads ?></a></li>
              </ul>
            </nav>

            <!-- Mobile lang switcher -->
            <div class="mobile_lang visible-xs">
               <div class="dropdown">
<!--                  <p><img src="/wp-content/themes/cctoolkit/img/outline-language-24px.svg" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </p> -->
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
  <img src="/wp-content/themes/cctoolkit/img/outline-language-24px.svg" /></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php the_widget('qTranslateXWidget', array('type' => 'list-item', 'hide-title' => true) ) ?>
                </div>
              </div>

            </div>

          </div>
        </div>
      </header>


      <section id="intro" name="introduction">
        <div class="row">
          <div class="col-md-12 ol-xs-12 video">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <?php
                $youtube_url = get_field('youtube_url', 'option');
                $youtube_hash = end(explode("=", $youtube_url));
              ?>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_hash ?>?rel=0&showinfo=0" class="embed-responsive-item" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
            </div>
          </div>

        </div> <!-- /end of row -->

        <!-- Download call to action -->
        <div class="call_to_action first">
          <p class="download">
            <i class="material-icons">cloud_download</i>

            <?php
              $download_file_url = get_field('zip_file_' . qtranxf_getLanguage(), 'option');

              if (!$download_file_url) {
                 $download_file_url = get_field('zip_file_en', 'option');
              }
            ?>

            <a href="<?= $download_file_url ?>"><?= $word_download_call_to_action ?></a>
          </p>
        </div>


        <!-- Introduction text -->
        <div class="row" style="margin: 0 auto;">
          <div class="introduction_text col-md-6 col-xs-12 col-md-offset-3">
            <?php the_field('introduction', 'option'); ?>
          </div>
        </div>
      </section>


      <section id="content" name="how">
        <div class="row">
            <div class="col-md-12">
              <h2 name="how"><span><i class="material-icons">business_center</i><?= $word_how_benefit ?></span></h2>
            </div>
         </div>

         <div class="row item right">
  
          <div class="col-md-12">
            <?php 

              $posts = get_posts(array(
                'posts_per_page'  => -1,
                'post_type'     => 'content'
              ));

              $i = 0;
              if( $posts ): 
                foreach( $posts as $post ): 
                  setup_postdata( $post );
                  $i++;
                ?>

                <?
                 if ($i & 1) {
                ?>
                  <div class="row item right">
                    <div class="col-md-4 col-md-offset-2">
                      <img src="<?php the_field('illustration')['url'] ?>" />
                    </div>
                    <div class="col-md-6">
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_field('text') ?></p>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="row item left">
                    <div class="col-md-4 visible-xs">
                        <img src="<?php the_field('illustration')['url'] ?>"/>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_field('text') ?></p>
                    </div>
                    <div class="col-md-4 hidden-xs">
                        <img src="<?php the_field('illustration')['url'] ?>"/>
                    </div>
                 </div>
                <?php } ?>

                
                <?php
                  endforeach;
                ?>
                
                
              <?php wp_reset_postdata(); ?>

            <?php endif; ?>


          </div> <!-- / end of col-md-12 div -->
        </div>


      </section>


      <!-- Call to Action -->
      <div class="call_to_action">
        <p><?= $word_for_more_information ?></p>
        <p class="download">
          <i class="material-icons">cloud_download</i>
          <a href="<?= $download_file_url ?>"><?= $word_download_call_to_action ?></a>
        </p>
      </div>

      <!-- Secondary content -->
      <section id="secondary_content">
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-4" id="links">
            <h3 name="links"><span><i class="material-icons">link</i><?= $word_links ?></span></h3>
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
                    <a href="<?php the_field('url'); ?>" target="_blank"><?php the_title(); ?></a>
                  </li>
                
                <?php endforeach; ?>
                
              </ul>
                
              <?php wp_reset_postdata(); ?>

            <?php endif; ?>
          </div>
          <div class="col-md-4" id="downloads">
            <h3 name="downloads"><span><i class="material-icons">folder</i><?= $word_downloads ?></span></h3>
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
                    <?php
                      $download_link = get_field(qtranxf_getLanguage() . '_file');

                      if (!$download_link)   {
                        $download_link = get_field('en_file');
                      }
                    ?>
                    <a href="<?php echo $download_link ?>" target="_blank"><?php the_title(); ?></a>
                  </li>
                
                <?php endforeach; ?>
                
              </ul>
                
              <?php wp_reset_postdata(); ?>

            <?php endif; ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </section>



<?php get_footer(); ?>

