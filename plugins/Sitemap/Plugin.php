<?php
/**
 * Google Sitemap 生成器，启用插件后点此查看 >> <a href="https://amore.ink/sitemap.xml">站点地图</a>
 * 
 * @package Sitemap
 * @author Amore
 * @version 1.0.1
 * @link https://www.amore.ink
 *
 */
class Sitemap_Plugin implements Typecho_Plugin_Interface
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
		Helper::addRoute('sitemap', '/sitemap.xml', 'Sitemap_Action', 'action');
        return '插件已激活，开始自动生成站点地图！';
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
	{
		Helper::removeRoute('sitemap');
        return '插件已禁用，已删除站点地图！';
	}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
        echo '<a href="https://amore.ink/sitemap.xml">站点地图</a>';
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

}
