 <?php get_header();
childcare_breadcrumbs(); ?> 

 <div class="container page-header-inner"> <img src="<?php echo CHILDCARE_TEMPLATE_DIR_URI; ?>/images/callout-shadow.png" class="img-responsive"> </div> 

<div class="container "> 

<div class="row blog-item"> 

 <div class="col-md-8 smart-gep"> 

 

 <?php if (have_posts()):
    while (have_posts()):
        the_post();
        get_template_part('content', 'post');
    endwhile;
endif; ?> 

 <div class="clearfix"> </div> 

 <div class="blog-pagination pull-left animate fadeInLeft" data-anim-type=""> 

 <?php echo paginate_links(array('show_all' => true, 'prev_text' => '<<', 'next_text' => '>>',)); ?> 

 </div> 

 </div> 

 <?php get_sidebar(); ?> 

 <!--<div class="social">   
 <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1OZZAbeV27-ZvuX2bqiShJwgpbMov05xrIK9QkCTmrCLgOKBe"></a>
 </div>--> 

 <div class="clearfix"></div> 

 </div> 

</div> 

<?php get_footer(); ?>