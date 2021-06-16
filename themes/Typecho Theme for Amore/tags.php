<?php
/**
 * 标签
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

			<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>

		</h1>

	</header>

	<div class="mod-post__entry wzulli">

    	        <div class="tags">

        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=999999')->to($tags); ?>

        <?php if($tags->have()): ?>

        <ul class="tags-list">

        <?php while ($tags->next()): ?>

<!--         <li>

            <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30,); ?>" title="<?php $tags->count(); ?> 个话题">
           
                <?php $tags->name(); ?>
                
            </a>

        </li> -->

        <li>

            <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30,); ?>" title="<?php $tags->count(); ?> 个话题">
           
                # <?php $tags->name(); ?> <span>(<?php $tags->count(); ?>)</span>
                
            </a>

        </li>

        <?php endwhile; ?>

        <?php else: ?>

        <li>

        <?php _e('没有任何标签'); ?>
            
        </li>

        </div>

        <?php endif; ?>

        </ul>


	</div>
	
	
</article>

	<?php $this->need('footer.php'); ?>
