<?php
/**
 * The template for displaying the footer.
 *
 * @package cctoolkit
 */

include 'translations.php';

?>



      <!-- Footer -->
      <footer>
        <div class="row">
          <div class="col-md-12">
            <img src="/wp-content/themes/cctoolkit/img/footer_cc_logo.svg" />
          </div>
        </div>

        <div class="row desktop">
          <div class="col-md-6 col-xs-6 footer_description">
            <ul>
              <li><? echo $word_by ?></li>
              <li><? echo $word_coordination ?></li>
              <li><? echo $word_spanish_credits ?></li>
              <li><? echo $word_design_dev ?></li>
              <li><? echo $word_licensed ?></li>
            </ul>
          </div>
          <div class="col-md-5 col-xs-6 footer_links">
            <ul>
              <li><a href="https://creativecommons.org/">Creative Commons</a></li>
              <li><a href="http://creativecommons.pt/">Creative Commons Portugal</a></li>
              <li><a href="https://www.creativecommons.org.py/">Creative Commons Paraguay</a></li>
              <li><a href="http://jplusplus.org/pt/">Journalism++</a></li>
              <li><a href="https://creativecommons.org/licenses/by/4.0/">Attribution 4.0 International (CC BY 4.0)</a></li>
            </ul>
          </div>
        </div>

        <div class="row mobile">
          <p><? echo $word_by ?><br><a href="https://creativecommons.org/">Creative Commons</a></p>
          <p><? echo $word_coordination ?><br><a href="http://creativecommons.pt/">Creative Commons Portugal</a></p>
          <p><? echo $word_spanish_credits ?><br><a href="https://www.creativecommons.org.py/">Creative Commons Paraguay</a></p>
          <p><? echo $word_design_dev ?><br><a href="http://jplusplus.org/pt/">Journalism++</a></p>
          <p><? echo $word_licensed ?><br><a href="https://creativecommons.org/licenses/by/4.0/">Attribution 4.0 International (CC BY 4.0)</a></p>
        </div>
      </footer>

    </div><!-- / end of global container -->

  </div>

</body>
</html>