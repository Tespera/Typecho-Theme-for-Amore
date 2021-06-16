<?php
/**
 * 一个简约到极致的博客
 * @package Typecho Theme for Amore
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>



<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>

<?php $this->need('header.php'); ?>

</br></br></br>
<article class="mod-archive">

	<div class="mod-archive__item"><div class="mod-archive__year"></div>
</br>
		<ul class="mod-archive__list">
<?php while($this->next()): ?>
			<li><time class="mod-archive__time" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time> <span>&nbsp;&nbsp;&nbsp;</span>
       <a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a>
      </li>
			    <?php endwhile; ?>
				</ul>

		<div class="posts-nav">

<div style="float:right;">
	<?php $this->pageLink('<span class="page-numbers current flip">下一页</span>','next'); ?>
		
	</div>
<?php $this->pageLink('<span class="page-numbers current flip">上一页</span>'); ?>

		</div>
	</div>
	
</article>
<?php $this->need('footer.php'); ?>