<?php
/**
 * 一个简约到极致的博客
 * @package Amore · Header
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>


<header class="mod-head">

    <div style="float: left;">
        <h1 class="mod-head__title">
            <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        </h1>

        <div class="mod-head__logo">
            <a href="<?php $this->options->siteUrl(); ?>">
                <img class="avatar" alt="avatar" src="<?php $this->options->themeUrl('avatar.jpg'); ?>">
            </a>
        </div>
    </div>

    <div style="float: right;">
        <span>
          <input id="switch_default" type="checkbox" class="switch_default">  
              <label for="switch_default" class="toggleBtn"></label>
        </span>
    </div>


    <!-- <dropdown>
  <input id="toggle2" type="checkbox">
  <label for="toggle2" class="animate" style="background: rgba(255, 255, 255, 0);"><img style="float:right;" src="<?php $this->options->themeUrl('menu.svg'); ?>" alt="" width="26" height="26"></label>

<ul class="animate">
<div class="animate"></div></br></br>


                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>

                    <?php while ($pages->next()): ?>

                    <li class="animate">

                    <a <?php if ($this->is('page', $pages->slug)): ?>
                      class="menu-item" <?php endif; ?> 
                      href="<?php $pages->permalink(); ?>" 
                      title="<?php $pages->title(); ?>">

                      <?php $pages->title(); ?>
                        
                    </a> </li>

                    <?php endwhile; ?>
  </ul>
  
</dropdown>  -->
    <!--    </div>-->
</header>


<a href="#" id="back-to-top" style="display: inline;"> ^ </a>
