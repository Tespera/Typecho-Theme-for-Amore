<?php
/**
 * 友链
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
		<h1 class="mod-post__title">
			<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	</header>

    
    <div class="mod-post__meta">想要交换友链可以在下方留言，留言按以下格式：</div>

    <div class="comment-main"> <p>站点名称：<?php $this->options->title(); ?></p></div>

    <div class="comment-main"> <p>站点描述：<?php $this->options->description(); ?></p></div>

    <div class="comment-main"> <p>站点链接：<?php $this->options->siteUrl(); ?></p></div>

    <div class="comment-main"> <p>站点图标：<?php $this->options->siteUrl(); ?>avatar.jpg</p></div>

    <div class="comment-main"> <p>站点订阅：<?php $this->options->siteUrl(); ?>feed/</p></div>


    <br />

    <div class="comment-date">交换友链前请按如上信息先添加本站友链哦～</div>

	<br /><br />

	<div class="mod-post__entry wzulli">

        <ul class="links">

			<?php Links_Plugin::output(); ?>

		</ul>

	</div>

</article>


	<?php $this->need('comments.php'); ?>

	<?php $this->need('footer.php'); ?>
