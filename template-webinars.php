<?php
/* 
* Template Name: Webinars

*/

get_header();
?>


<div class="page_main_section">
  <div class="blog_post">
  <div class="cds--grid">
    <div class="cds--row">
      <div class="cds--col-md-6 cds--col-lg-6 blog_left">
      <div class="blog-title"> 
        <h2><?php the_title(); ?></h2> 
      </div>
      </div>
      <div class="cds--col-md-10 cds--col-lg-10 blog_right">
      <div class="blog-descriptions">          
        <p><?php the_field('top-text'); ?></p>
      </div>
      </div>
    </div>
  </div>
  </div><!--end blog_post div -->  

 <div class="latest_blog_section"> 
  <div class="cds--grid">
   <div class="cds--row">
     <div class="cds--col-md-16 cds--col-lg-16">
      <div class="blog-subtitle"> 
        <h3>Coming Up Live </h3> 
      </div>     
            <?php 
             global $post; 
             $blog_post = new WP_Query([
            'post_type' => 'webinar',
            'posts_per_page' => 2,
            'orderby' => 'date',
            'order' => 'DESC',
             ]);   
             ?>
      <div class="blog_post-list">
      <?php if($blog_post->have_posts()): ?>   

        <div class="blog_row_1 blog_row">
          <?php 
            while ($blog_post->have_posts()): $blog_post->the_post();  ?>
              
                
                           
                <div class="item_list"> 
                  <div class="top_feature_img">            
                  <?php echo get_the_post_thumbnail(); ?>
                  </div>
                  <div class="category_meta">
                  <span class="category_name">
                   <?php echo  wp_get_post_terms( get_the_ID(), 'webinar_cat')[0]->name;?>
                   </span>            
                  <span class="meta_date"> 
                     <span class="metadate"> <?php echo get_the_date('F j, Y', get_the_ID()); ?> </span> | <span class="metatime">
                      <?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]') ?>  </span>                   
                  </span>
                  </div>           
                   <h4><a href="<?php echo get_permalink(get_the_ID());?>"> <?php echo get_the_title(); ?> </a></h4> 
                </div>
              
     
              
          <?php endwhile;  ?>      
                     </div>
      <?php endif; ?> 
      <?php wp_reset_postdata(); ?>    
      </div>
      </div> <!-- end blog_post-list -->
    </div>  <!-- end cds--col-md-16 -->

  </div><!--end cds--row  -->
 </div><!-- end cds--grid -->
</div><!-- end latest_blog_section -->

<div class="blog_filter_sec">  
  <div class="cds--grid">
   <div class="cds--row">

      <div class="cds--col-md-16 cds--col-lg-16 content-wrap">
      <div class="category-wrap">  
      <?php
           $args = array(
            'taxonomy'   => 'webinar_cat',
            'hide_empty' => 0,
            'orderby'    => 'name'
            );
             $categories = get_categories($args);
               echo'<ul class="cat-list">';
                 echo'<li><a class="cat-list_item active" href="#" data-slug="1">All Webinars</a></li>';
               foreach($categories  as $category):
                 echo'<li><a class="cat-list_item" href="#" data-slug="'.$category->slug.'">'.$category->name.'</a> </li>';
               endforeach;
             echo'</ul>';
           ?>
      </div>
       <div class="total_post"> 
         <?php echo wp_count_posts('webinar')->publish; ?> Webinars


       </div>
       <div class="blog_wrp">
       <?php 
            $posts_blog = new WP_Query([
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                'post_type' => 'webinar',
                'posts_per_page' => 9,
                'order_by' => 'date',          
                'order' => 'DESC',
            ]);  
       if($posts_blog->have_posts()): ?>
        
          <div class="cds--row project-tiles">
          <?php  while($posts_blog->have_posts()) : $posts_blog->the_post(); ?>
              <div class="cds--col-md-5 cds--col-lg-5 blog_item">
               <div class="blog_content">
                <div class="blog_meta">
                <span class="category_name">
                   <?php echo wp_get_post_terms( get_the_ID(), 'webinar_cat')[0]->name; ?>
                </span>    

                </div>
                
            <div class="date_title">
                  <span class="meta_date"> 
                     <span class="metadate"> <?php echo get_the_date('F j, Y', get_the_ID()); ?> </span> | <span class="metatime">
                      <?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]') ?>  </span>                   
                  </span>              
                <div class="blog_post_title">
                  <h3><a href="<?php echo get_permalink(get_the_ID());?>"> <?php echo get_the_title(); ?> </a></h3>
                </div>
            </div>  

              </div>
              <div class="feature_img">

           <?php if ( get_the_post_thumbnail(get_the_ID()) ) { ?>
              <?php echo get_the_post_thumbnail(); ?>
          <?php }else { ?>
            <img src="<?php bloginfo('template_directory');?>/images/dummy.png" alt="" />
          <?php } ?>

              </div>
             </div>
             <?php  endwhile; ?>
            </div>

        <?php wp_reset_postdata(); ?>

    <?php
    echo '<div class="btn__panigation" id="btn_pagin">';
          $big = 999999; 
          echo paginate_links( array( 
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format'     => '?paged=%#%',
              'prev_text'  => __(' < '),
              'next_text'  => __(' > '),
              'current'    => max( 1, get_query_var('paged') ),
              'total'      => $posts_blog->max_num_pages
          ) );
          echo '<div>';
    ?>
    </div>

    

      <?php endif; ?>
      </div> <!-- end content-wrap -->
  </div>
 </div>

</div>
</div>  <!-- end blog_filter_section -->



<div class="welcome_section blog_welcome">
    <div class="cds--grid">
    <div class="cds--row inner_bg_section">
      <div class="mobile_bg">
        <div class="title_btn_section">
          <div class="btn_class">
            <h2>Welcome to the modern age of regulation Built by Thentia.</h2>
            <a class="btn_white" href="#"> Get Started </a>
          </div>
          <img class="bg_mobile" src="/wp-content/themes/thentia/images/welcome/mobile_pic.png">
        </div>
      </div>
    </div>
   </div>
 </div>  <!-- end blog_welcome -->

</div>  <!-- end page_main_section -->

<script type="text/javascript">  

jQuery('.cat-list_item').click( function(e){
  e.preventDefault();
  
  $('.cat-list_item').removeClass('active'); 
  
  $(this).addClass('active');

  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

  $.ajax({

      type: 'POST',

      url: ajaxurl,

      dataType: 'html',

      data: {

        action: 'filter_webinar_post',

        category: $(this).data('slug'),
      },

      success: function(res) {
        $('.blog_wrp').html(res);
      }

  })

});


jQuery('a.page-numbers').click( function(e){
  e.preventDefault();
  var page_num = $(this).text();
  $(".page-numbers").removeClass("current");
  $(this).addClass("current");
  var post_count ='<?php echo ceil ( wp_count_posts( 'post' )->publish ) ?>';  
  var page_count = post_count / 9;   
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';    
  $.ajax({
    type: 'POST',
    url: ajaxurl,
    dataType: 'html',
    data: {
      action: 'webinar_page_action', 
      paged: page_num,
      category: $(".cat-list_item.active").data("slug")
    },
    success: function (res) {
    if (page_count == page_num) {  
      $('.next').hide();}
    else{
      $('.next').show(); 
    }   
    $('.blog_wrp').html(res);
    }
  });   
});

</script>

<?php
// get_sidebar();
get_footer();
