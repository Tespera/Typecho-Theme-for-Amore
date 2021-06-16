<?php
/**
 * 归档
 *
 * @package custom
 *
 */
?>


<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>

<?php $this->need('header.php'); ?>

</br></br></br>

<main class="main-content">
    <section class="section-body">
        <header class="section-header u-textAlignCenter">
            <h2 class="css91e91f2cb17f7a">标签</h2>
        </header>




        <div class="tags"></br></br>

        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>

        <?php if($tags->have()): ?>

        <ul class="tags-list">

        <?php while ($tags->next()): ?>

        <li>

            <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题">
           
                <?php $tags->name(); ?>
                
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


        
    
    </section> 

</main>


<?php $this->need('footer.php'); ?>


