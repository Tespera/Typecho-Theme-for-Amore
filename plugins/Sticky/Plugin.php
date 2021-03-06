<?php
/**
 * 文章置顶
 *
 * @package Sticky
 * @author willin kan
 * @version 1.0.0
 * @update: 2016.11.05
 * @link http://wuwovr.com/blog
 */
class Sticky_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->indexHandle = array('Sticky_Plugin', 'sticky');
        Typecho_Plugin::factory('Widget_Archive')->categoryHandle = array('Sticky_Plugin', 'sticky');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $sticky_cids = new Typecho_Widget_Helper_Form_Element_Text(
          'sticky_cids', NULL, '',
          '置顶文章的 cid', '按照排序输入, 请以半角逗号或空格分隔 cid.');
        $form->addInput($sticky_cids);

        $paded = new Typecho_Widget_Helper_Form_Element_Radio(
            'paded',
            array(0=>_t('每一页'),1=>_t('仅首页'),), '0', _t('是否在每一页都显示置顶文章'),_t('默认每一页都显示，如果仅在第一页 page.1 才显示置顶文章则选仅首页。'));
        $form->addInput($paded);


        $sticky_html = new Typecho_Widget_Helper_Form_Element_Textarea(
            'sticky_html', NULL, "<span style='color: #fddb3a; background-color: #ff1e56; padding: 3px 4px; margin-right: 10px; border-radius: 2px; font-size: 9pt; font-weight: bold;'>[置顶]</span>",
            '置顶标题的 html', '<div style="font-family:arial; background:#E8EFD1; padding:8px">在 index.php 的 $this->title(); 前面加上 $this->sticky(); 可出现这段 html.
          <br/>例: &lt;h2 class="title">&lt;a href="&lt;?php $this->permalink() ?>">&lt;?php <b style="color:#CF7000">$this->sticky();</b> $this->title() ?>&lt;/a>&lt;/h2></div>');
        $sticky_html->input->setAttribute('rows', '7')->setAttribute('cols', '80');
        $form->addInput($sticky_html);

    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 选取置顶文章
     * 
     * @access public
     * @param object $archive, $select
     * @return void
     */
    public static function sticky($archive, $select)
    {
        $config  = Typecho_Widget::widget('Widget_Options')->plugin('Sticky');
        $sticky_cids = $config->sticky_cids ? explode(',', strtr($config->sticky_cids, ' ', ',')) : '';
        if (!$sticky_cids) return;

        $db = Typecho_Db::get();
        // $paded = $archive->request->get('page',1); //单独首页置顶
        $sticky_html = $config->sticky_html ? $config->sticky_html : "<span style='color: #fddb3a;font-size:12px;float: right;padding: 2px 4px;background: #ea5455;border-radius: 2px;'>[置顶]</span>";

        foreach($sticky_cids as $cid) {
          if ($cid && $sticky_post = $db->fetchRow($archive->select()->where('cid = ?', $cid))) {
              // if ($paded == 1) {                // 首頁 page.1 才會有置頂文章
                $sticky_post['sticky'] = $sticky_html;
                $archive->push($sticky_post);                  // 選取置頂的文章先壓入
               // }
              $select->where('table.contents.cid != ?', $cid); // 使文章不重覆
          }
        }
    }

}
