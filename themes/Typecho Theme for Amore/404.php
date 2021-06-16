<?php
/**
 * 404
 *
 * @package custom
 *
 */
?>


<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('head.php'); ?>


<main class="main-content">

    <div style="
    color: #bbbbbb;
    width: 100%;
    text-align: center;
    margin-top: 148px;
    ">

<p style="font-size: 32px">404</p>

<br />

<p style="font-size: 12px">这个页面走丢了，品一下这句诗词吧~</p>

</div>


<script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
<div id="poem_sentence" style="font-size: 14px;text-align: center;margin-top: 8vh"></div>
<div id="poem_info" style="font-size: 10px;text-align: center;"></div>
<script type="text/javascript">
  jinrishici.load(function(result) {
    var sentence = document.querySelector("#poem_sentence")
    var info = document.querySelector("#poem_info")
    sentence.innerHTML = result.data.content
    info.innerHTML = '【' + result.data.origin.dynasty + '】' 
    + result.data.origin.author + '《' + result.data.origin.title + '》'
  });
</script>


</main>




<?php $this->need('footer.php'); ?>