<?php
/**
 * 一个简约到极致的博客
 * @package Amore · Footer
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>

<?php $this->footer(); ?>

    <footer id="footer" class="footer">


<nav>
	<a class="menu-item" href="<?php $this->options->siteUrl(); ?>" 
  <?php if($this->is('index')): ?> 
  <?php endif; ?> ><?php _e('首页'); ?></a> · 


	<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>

                    <?php while($pages->next()): ?>

                    <a class="menu-item" href="<?php $pages->permalink(); ?>" 
                      <?php if($this->is('page', $pages->slug)): ?>
                      <?php endif; ?> 
                      >

                      <?php $pages->title(); ?>
                      	
                    </a> · 

                    <?php endwhile; ?>

                    <a class="menu-item" 
                    <?php if($this->is('about')): ?>
                    <?php endif; ?> href="<?php $this->options->siteUrl(); ?>about.html"><?php _e('关于'); ?></a>

</nav>



<div class="Copyright">Copyright &copy; 2017 - <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></div>

        <div class="beian">
            <span>
              <a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备2020114169号</a>
              | 网站已运行：<a id="SiteAge"></a>
            </span>
        </div>

        <div>

        </div>



    </footer>
<!-- 
    <script type="text/javascript">

        var activeMenu = function e() {

            for (var i = 0; i < $(" nav a").length; i++){

              console.log(i);

              if ($("nav a")[i].href === location.href) {

                  $("nav a")[i].className = 'menu-item active'
              }else {
            
                  $("nav a")[i].className = 'menu-item'
              }
            }
        }

    </script> -->

<!--     <script type="text/javascript">

    for (var i = 0; i < this("footer nav a").length; i++){

      console.log(i);

        if (this("nav a")[i].href == location.href) {
            this("nav a")[i].className = 'menu-item active'
        }else {
            this("nav a")[i].className = 'menu-item'
        }
    }



</script> -->


</body>
</html>