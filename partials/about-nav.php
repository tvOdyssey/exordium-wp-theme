<div class="container py-4" data-dropdown-content>
  <div class="row">

    <?php
      # Dont give us random categories
      $allowedCats = array("General", "Resources", "Blog", "Company");

      # Display the categories the way we want
      $catArgs = array(
        'orderby' => 'include',
        'order' => 'ASC',
        'include' => '8,9,10,11'
      );

      # Print the navigation out.
      $categories = get_categories( $catArgs );
      foreach  ($categories as $category) {
        if ( in_array($category->name, $allowedCats) ) {

          $postArgs = array(
            'category' => $category->term_id,
            'orderby' => 'date',
            'order' => 'ASC'
          );

          //Display the sub category information using $category values like $category->cat_name
          echo '<div class="col-lg col-md-6 mb-3 mb-lg-0">';
            echo '<h5>'.$category->name.'</h5>';
            echo '<div>';
            foreach (get_posts($postArgs) as $post) {
              setup_postdata( $post );
              echo '<a class="dropdown-item fade-page" href="'.get_permalink($post->ID).'">'.get_the_title().'</a>';
            }
            echo '</div>';
          echo '</div>';
        }
      }
      wp_reset_query();
    ?>

  </div>
</div>
