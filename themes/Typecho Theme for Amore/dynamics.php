<?php
/**
 * 动态
 *
 * @package custom
 *
 */
?>


<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>

<?php $this->need('header.php'); ?>

</br></br></br>


<article class="mod-post mod-post__type-post">
    <header>
        <h1 class="mod-post__title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    </header>
        <div class="mod-post__entry wzulli">
        	<?php Dynamics_Plugin::output(); ?>
      <?php $this->content(); ?>
</div>
            <div class="mod-post__meta">
    </div>
    
    
</article>


    <?php $this->need('comments.php'); ?>

    <?php $this->need('footer.php'); ?>
