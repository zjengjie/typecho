<?php
/**
 * 代码高亮插件
 *
 * @package HighLight
 * @author mokch
 * @version 1.0.1
 * @link http://mokch.info/
 */
class HighLight_Plugin implements Typecho_Plugin_Interface{

    /**
     * 启用插件方法,如果启用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        //添加 header 输出
        Typecho_Plugin::factory('Widget_Archive')->header = array('HighLight_Plugin', 'addheader');
        //添加 footer 输出
        Typecho_Plugin::factory('Widget_Archive')->footer = array('HighLight_Plugin', 'addfooter');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){

    }

    /**
     * 获取插件配置面板
     *
     * @static
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
        $styles = self::getStyleList();
        $style = new Typecho_Widget_Helper_Form_Element_Select('style', $styles, null, _t('选择样式配置文件'));
        $version = new Typecho_Widget_Helper_Form_Element_Text('version', '8.7', null, _t('选择版本'));
        $form->addInput($style, $version);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){

    }


    /**
     * 头部css 输出
     */
    public static function addheader(){
        $style = Typecho_Widget::widget('Widget_Options')->plugin('HighLight')->style;
        /*echo '<link rel="stylesheet" href="'.Helper::options()->pluginUrl.'/HighLight/styles/'.$style.'">';*/
        /*echo '<script src="'.Helper::options()->pluginUrl.'/HighLight/highlight.pack.js"></script>';*/
	echo '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/'.$style.'.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
';
    }

    /**
     * footer 输出
     */
    public static function addfooter(){
        echo "<script>hljs.initHighlightingOnLoad();</script>\n";
    }

    /**
     * 获取 样式列表
     */
    public static  function getStyleList(){
        return array(
            'monokai' => 'monokai',
            'arta'=> 'arta',
            'ascetic'=> 'ascetic',
            'brown_paper'=> 'brown_paper',
            'dark'=> 'dark',
            'default'=> 'default',
            'docco'=> 'docco',
            'far'=> 'far',
            'foundation'=> 'foundation',
            'github'=> 'github',
            'googlecode'=> 'googlecode',
            'idea'=> 'idea',
            'ir_black'=> 'ir_black',
            'magula'=> 'magula',
            'mono-blue'=> 'mono-blue',
            'monokai'=> 'monokai',
            'monokai_sublime'=> 'monokai_sublime',
            'obsidian'=> 'obsidian',
            'pojoaque'=> 'pojoaque',
            'railscasts'=> 'railscasts',
            'rainbow'=> 'rainbow',
            'school_book'=> 'school_book',
            'solarized_dark'=> 'solarized_dark',
            'solarized_light'=> 'solarized_light',
            'sunburst'=> 'sunburst',
            'tomorrow-night-blue'=> 'tomorrow-night-blue',
            'tomorrow-night-bright'=> 'tomorrow-night-bright',
            'tomorrow-night-eighties'=> 'tomorrow-night-eighties',
            'tomorrow-night'=> 'tomorrow-night',
            'tomorrow'=> 'tomorrow',
            'vs'=> 'vs',
            'xcode'=> 'xcode',
            'zenburn'=> 'zenburn'
        );
    }

}