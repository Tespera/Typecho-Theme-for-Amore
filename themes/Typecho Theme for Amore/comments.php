<?php
/**
 * 一个简约到极致的博客
 * @package Amore · Comments
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>


<?php

$GLOBALS['z']  = $this->options->CDNURL;

function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>



<li data-no-instant id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}

$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">


<div id="<?php $comments->theId(); ?>">
    <?php
        $host = '//cdn.v2ex.com';
        $url = '/gravatar/';
        $size = '80';
        $rating = Helper::options()->commentsAvatarRating;
        $hash = md5(strtolower($comments->mail));
        $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
    ?>

    <div class="comment-meta">

        <div class="comment-author">

            <cite class="fn" itemprop="name">

            <?php echo $author; ?>

            </cite>
                
        </div> 

        <div class="comment-date">

            <?php $comments->date('Y-m-d H:m:s'); ?>

        </div> 

        <span class="comment-reply flip">

            <?php $comments->reply(); ?>

        </span>

    </div>

    <div class="comment-main">

        <?php $comments->content(); ?>

    </div>

</div>
 

    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div> 
    <?php } ?> 
    
</li>

<?php } ?>



<div id="comments" class="cf">

    <?php $this->comments()->to($comments); ?>

<?php if($this->allow('comment')): ?>

    <div id="<?php $this->respondId(); ?>" class="respond">

        <div class="cancel-comment-reply">

            <span class="response">

                <div class="comments-header">

    	           <?php _e('留言'); ?>
            
                </div>

                </br>

            </span>

            <span class="cancel-reply"><?php $comments->cancelReply(); ?>
                
            </span>
        </div>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">

            <?php if($this->user->hasLogin()): ?>

            <p style="padding-top:10px;font-size: 13px;">

                <?php _e('已登入: '); ?>

                <a href="<?php $this->options->profileUrl(); ?>">

                    <?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">

                        <?php _e('退出'); ?> &raquo;</a>
            </p>

            <?php else: ?>

                <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?> 
                
                <p style="padding-top:10px;font-size: 13px;">

                    登录身份: <span onClick='showhidediv("author_info")'; style="cursor:pointer;color:#777;">

                        <?php $this->remember('author'); ?>
                            
                        </span>，<?php _e('欢迎回来~'); ?> 

                    <span id="cancel-comment-reply">

                        <?php $comments->cancelReply(); ?>
                            
                        </span>
                </p>

                <div id="author_info" style="display:none;">

                <?php else : ?>

                <div id="author_info">

                <?php endif ; ?>

            <input type="text" name="author" maxlength="12" id="author" class="required" placeholder="<?php _e('昵称 *'); ?>" value="<?php $this->remember('author'); ?>">

            <input type="email" name="mail" id="mail" class="required" placeholder="<?php _e('邮箱 *'); ?>" value="<?php $this->remember('mail'); ?>">

            <input type="url" name="url" id="url" class="required" placeholder="<?php _e('网站 *'); ?>" value="<?php $this->remember('url'); ?>">

               </div>

                <?php endif; ?>

	</br>		

            <textarea name="text" id="textarea" class="form-control" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="<?php _e('在这里输入内容...  填写邮箱可收到回复提醒哦~'); ?>" required ><?php $this->remember('text',false); ?></textarea>


            </br>

            <button type="submit" class="submit flip" id="misubmit"><?php _e('提交'); ?></button>

            </br>

            <?php $security = $this->widget('Widget_Security'); ?>

            <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">

        </form>

    </div>   

</div>

    <?php else: ?>

    <h4 class="comment-close">此页面已关闭留言</h4>

    <?php endif; ?>  

    <?php if ($comments->have()): ?>

    <div class="comments-have">

        <?php $this->commentsNum(_t('暂无留言'), _t('仅有一条留言'), _t('已有 %d 条留言')); ?>
            
        </div>

    <?php $comments->listComments(); ?>

 <div class="comments-list">

<?php $comments->pageNav('较早', '较晚', 0, '..'); ?>

</div>

    <?php endif; ?>

    

