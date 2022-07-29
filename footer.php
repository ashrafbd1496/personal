<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Personal
 */

?>

	<footer id="colophon" class="site-footer">
		  <div class="credits">
		    Developed by <a href="<?php the_field( 'developer_link', 'option' ); ?>"><?php the_field( 'developer_name', 'option' ); ?></a>
		  </div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var page =2;
    jQuery(function($){
        // init isotope
        var $grid = $('.grid');
        $grid.isotope({
          // options
          itemSelector: '.grid-item',
          percentPosition: true,
        });

        $('body').on('click', '.loadmore', function(e){

          var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
          };

          $.post(ajaxurl, data, function(response){
            if (response != '') {
              var $answer = $(response);

              //append items to grid
              $grid.append($answer)
              .isotope('appended', $answer);

              // layaout on imagesLoaded
              $grid.imagesLoaded(function(){
                $grid.isotope('layout');
              });
              page++;
            } else{
              $('.loadmore').text("No more Post!");
              $('.loadmore').attr("disabled", true);
              $('.loadmore').css("borderColor", "gray");
              $('.loadmore').css("color", "gray");
            }
          });
          e.preventDefault();
        });
    });
</script>
</body>
</html>
