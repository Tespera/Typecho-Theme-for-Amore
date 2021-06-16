<?php
/**
 * 关于
 *
 * @package custom
 *
 * 在创建该页面时，公开度设置为隐藏，否则会多一个关于页面。
 */
?>



<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>

<?php $this->need('header.php'); ?>

</br></br></br>


<article class="mod-post mod-post__type-post">
	<header>
		<h1 class="mod-post__title">
			<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		</h1>
	</header>
	<div class="mod-post__entry wzulli">
      	<?php $this->content(); ?>
	</div>
	<div class="mod-post__meta"></div>
	
	
</article>


<!--  <?php $this->need('comments.php'); ?> -->
	<?php $this->need('footer.php'); ?>
