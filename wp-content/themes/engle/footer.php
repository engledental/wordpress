	</main>

	<footer class="site-footer">
    <div class="container">
      <nav class="footer-nav">
        <ul>
          <li><a href="/">Engle Dental</a></li>
        </ul>
        <ul>
          <li><a href="">Products</a></li>
        </ul>
        <ul>
          <li><a href="">Support</a></li>
        </ul>
      </nav>
      <div class="footer-contact">
        <h4>Contact Us</h4>
				<p class="footer-contact__address"><?php the_field('address', 'options'); ?>, <?php the_field('city', 'options'); ?>, <?php the_field('state', 'options'); ?> <?php the_field('zip', 'options'); ?></p>
        <p class="footer-contact__phone"><?php the_field('phone_number', 'options'); ?></p>
				<p class="footer-contact__email"><a href="mailto:<?php the_field('email_address', 'options'); ?>"><?php the_field('email_address', 'options'); ?></a></p>
        <div class="footer-social">
          <a href="<?php the_field('facebook_link', 'options'); ?>" target="_blank">
            <svg class="icon-facebook-circle icon-social">
              <use xlink:href="#icon-facebook-circle"></use>
            </svg>
          </a>
          <a href="<?php the_field('linkedin_link', 'options'); ?>" target="_blank">
            <svg class="icon-linkedin-circle icon-social">
              <use xlink:href="#icon-linkedin-circle"></use>
            </svg>
          </a>
        </div>

      </div>
      <div class="footer-copyright">
        <p>&copy; Copyright 2017. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <a href="" id="scroll-top" class="scroll-top">&uarr;</a>

	<?php wp_footer(); ?>
</body>
</html>
