<?php
/**
 * 首页
 *
 * @package custom
 *
 */
?>

<?php $this->need('head.php'); ?>

<body>
<div class="wrapper">
<header>
    <nav class="navbar" id="mobile-toggle-theme">
        <div class="container"></div>
    </nav>
</header> 

    <div class="main">

        <div class="container">
            <div class="intro" style=" line-height: 50px">
                <div class="nickname"><?php $this->options->title(); ?></div>
                <div class="description">
                    <p><?php $this->options->description(); ?></p>

                </div>


                <div class="zuobiao">
                    <i class="ico_map"></i>中国 · 深圳
                    <span style="margin-left: 30px">
                            <input id="switch_default" type="checkbox" class="switch_default">
                            <label for="switch_default" class="toggleBtn"></label></span>
                </div>


                
                <div class="menu navbar-right links">

                    <!-- 获取页面列表 -->

                    <a class="menu-item" 
                    <?php if($this->is('index')): ?> class="current"
                    <?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                    <?php _e('首页'); ?></a> · 


                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>

                    <?php while($pages->next()): ?>

                    <a <?php if($this->is('page', $pages->slug)): ?>
                      class="menu-item" <?php endif; ?> 
                      href="<?php $pages->permalink(); ?>">

                      <?php $pages->title(); ?>
                        
                    </a> · 

                    <?php endwhile; ?>

                    <a class="menu-item" 
                    <?php if($this->is('about')): ?>
                    <?php endif; ?> href="<?php $this->options->siteUrl(); ?>about.html">
                    <?php _e('关于'); ?>
                        
                    </a>

                </div><br/>
                <div style=" line-height: 20px;font-size: 9pt;">
                    <p>" 最顶级的人才喜欢一起工作，而且他们是不能容忍平庸作品的。"</p>
                        <p style="margin-left: 8rem;font-size: 8pt;"><small>—— 史蒂夫 · 乔布斯</small></p>

                </div>
            </div>

        </div>

</div>

<footer id="footer" class="footer">
        <a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备2020114169号</a>
</footer>

</div>

</body>
</html>