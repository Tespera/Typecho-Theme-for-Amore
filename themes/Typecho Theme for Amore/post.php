<?php
/**
 * 一个简约到极致的博客
 * @package Amore · Post
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>



<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>

<?php $this->need('header.php'); ?>

</br></br></br>



<article class="mod-post mod-post__type-post">
	<header>
		<h1 class="mod-post__title"><?php $this->title() ?></a></h1>
	</header>

	<div class="mod-post__meta">

		 <!-- <?php $this->author(); ?>   ·    -->

		 <time datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time>    •   

		 <?php $this->category(','); ?>   •   

		 <?php _e('阅读: %d', $this->viewsNum);?>


	</div>

		<div class="mod-post__entry wzulli">
      <?php $this->content(); ?>
</div>


	<div class="mod-post__foot">

	 <?php _e('文章标签: '); ?> <?php $this->tags(',  ', true, ''); ?></br>

	</div>

	<div class="mod-post__poster">

	 <?php _e('点此生成 >>'); ?> <?php ArticlePoster_Plugin::button($this->cid); ?></br>

	</div>

</div>	



<br>
<?php $this->theNext('上一篇 : %s', '已经是第一篇文章了~'); ?>
</br>
<?php $this->thePrev('下一篇 : %s', '没有下一篇文章了~'); ?>
</div>	

</article>
 	<?php $this->need('comments.php'); ?>
	<?php $this->need('footer.php'); ?>


