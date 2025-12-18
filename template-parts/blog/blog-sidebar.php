  <!--listing of categories on blog-->

  <div class="blog_sidebar section_spacing_top_mini">
      <div class="container">
          <?php if (is_active_sidebar('sidebar-blog')) : ?>
              <?php dynamic_sidebar('sidebar-blog'); ?>
          <?php endif; ?>
      </div>
  </div>