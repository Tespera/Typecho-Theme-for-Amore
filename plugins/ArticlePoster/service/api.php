<?php
/**
 * Typecho插件 - ArticlePoster海报生成服务
 * @author MoLeft <admin@moleft.cn>
 * @version 1.0.0
 **/
 
include './inc/phpQrcode.class.php';
include './inc/poster.class.php';
require_once('config.inc.php');

if(empty($_POST['sitename'])||empty($_POST['introduction'])||empty($_POST['link'])||empty($_POST['title'])||empty($_POST['content'])||empty($_POST['time'])||empty($_POST['author'])||empty($_POST['qq'])){
	exit(json_encode(array('code'=>-1,'msg'=>'缺少参数')));
}

if(!preg_match("/ArticlePoster/",get_curl(strip_tags($_POST['link'])))){
	exit(json_encode(array('code'=>-1,'msg'=>'很抱歉，验证失败！')));
}

$info = array(
	'sitename' => strip_tags($_POST['sitename']), //网站名称 
	'siteintr' => strip_tags($_POST['introduction']), //网站介绍
	'artclelink' => strip_tags($_POST['link']), //文章链接
	'artclename' => replace_title(strip_tags($_POST['title'])), //15个字
	'artclecont' => replace_content(strip_tags($_POST['content'])), //最多240个字
	'artcletime' => strip_tags($_POST['time']), //发布时间
	'artcleauth' => strip_tags($_POST['author']), //文章作者
	'artcleqqqq' => strip_tags($_POST['qq']), //作者QQ
);

if(!empty($_POST['type'])){
	if($_POST['type']=='type1') {
		$info['artclelink'] = $info['artclelink'].'?_wv=2';
	}
	if($_POST['type']=='type2') {
		$info['artclelink'] = $info['artclelink'].'?_wv=16777223&_bid=3354';
	}
}

//辅助类函数，转换单位
function changeFileSize($size, $dec = 2)
{
    $a   = array('Byte', 'KB', 'MB', 'GB', 'TB', 'PB');
    $pos = 0;
    while ($size >= 1024) {
        $size /= 1024;
        $pos++;
    }
    return round($size, $dec) . ' ' . $a[$pos];
}
//文章标题可以有英文
function replace_title($str){
    preg_match_all('/[\s*\p{P}a-zA-Z0-9\x{4e00}-\x{9fff}]+/u', $str, $matches);
    return join('', $matches[0]);
}
function replace_content($str){
    preg_match_all('/[\p{P}a-zA-Z0-9\x{4e00}-\x{9fff}]+/u', $str, $matches);
    // preg_match_all('/[^(?!\[).*]+/u', $str, $matches);
    return join('', $matches[0]);
}
//计算文章字数
$article_count = round(mb_strlen($info['artclecont'], 'UTF-8'));

//计算阅读时间
$read_time = round(mb_strlen($info['artclecont'], 'UTF-8')/400,1);

//处理文章标题
// if(strlen($info['artclename'])>32){
// 	$info['artclename'] =  mb_substr($info['artclename'],0,20,'utf-8').'...';
// }

//处理文章内容
if(strlen($info['artclecont'])>600){
	$info['artclecont'] =  mb_substr($info['artclecont'],0,160,'utf-8').'...';
}
//生成二维码图片
$qrCodeData = QRcode::pngData($info['artclelink'], 13);

$config = array(
    'bg_url' => './img/background.png',
    'text' => array(
    	array(
            'text' => date("d",strtotime($info['artcletime'])),
            'left' => 70, 
            'top' => 450, 
            'width' => 650,
            'fontSize' => 80, 
            'fontColor' => '255,255,255', 
            'angle' => 0,
        ),
        array(
            'text' => '-----------',
            'left' => 70, 
            'top' => 470, 
            'width' => 650,
            'fontSize' => 15, 
            'fontColor' => '255,255,255', 
            'angle' => 0,
        ),
        array(
            'text' => date("Y",strtotime($info['artcletime'])).'/'.date("m",strtotime($info['artcletime'])),
            'left' => 80, 
            'top' => 490, 
            'width' => 650,
            'fontSize' => 20, 
            'fontColor' => '255,255,255', 
            'angle' => 0,
        ),
        array(
            'text' => $info['artclename'],
            'left' => 50, 
            'top' => 630,
            'width' => 650,
            'fontSize' => 24,
            'fontColor' => '0,0,0', 
            'angle' => 0,
        ),
        array(
            'text' => '      '.$info['artclecont'],
            'left' => 50, 
            'top' => 730,
            'width' => 650,
            'fontSize' => 18,
            'fontColor' => '85,85,85', 
            'angle' => 0,
        ),
        array(
        	'text' => '文章作者： '.$info['artcleauth'],
            'left' => 200,
            'top' => 980,
            'width' => 650,
            'fontSize' => 16,
            'fontColor' => '0,0,0',
            'angle' => 0,
        ),
        array(
        	'text' => '本文共计： '.$article_count.' 个字',
            'left' => 200,
            'top' => 1010,
            'width' => 650,
            'fontSize' => 16,
            'fontColor' => '0,0,0',
            'angle' => 0,
        ),
        array(
        	'text' => '预计阅读： '.$read_time.' 分钟',
            'left' => 200,
            'top' => 1040,
            'width' => 650,
            'fontSize' => 16,
            'fontColor' => '0,0,0',
            'angle' => 0,
        ),
        array(
        	'text' => '--------------------------------------------------------------',
            'left' => 0,
            'top' => 1080,
            'width' => 750,
            'fontSize' => 15,
            'fontColor' => '128,128,128',
            'angle' => 0,
        ),
        array(
        	'text' => $info['sitename'],
            'left' => 100,
            'top' => 1170,
            'width' => 325,
            'fontSize' => 26,
            'fontColor' => '0,0,0',
            'angle' => 0,
        ),
        array(
        	'text' => $info['siteintr'],
            'left' => 100,
            'top' => 1210,
            'width' => 325,
            'fontSize' => 15,
            'fontColor' => '85,85,85',
            'angle' => 0,
        ),
        array(
        	'text' => '扫一扫，看文章',
            'left' => 540,
            'top' => 1260,
            'width' => 130,
            'fontSize' => 10,
            'fontColor' => '85,85,85', 
            'angle' => 0,
        ),
    ),
    'image' => array(
        array(
            'url' => 0,
            'stream' => get_curl('https://www.bing.com'.json_decode(get_curl("https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1"),true)['images'][0]['url']),
            'left' => 0,
            'top' => 0,
            'right' => 0,
            'bottom' => 0,
            'width' => 750,
            'height' => 550,
            'radius' => 0,
            'opacity' => 100
        ),
        array(
            'url' => 0,
            'stream' => get_curl('https://q1.qlogo.cn/g?b=qq&nk='.$info['artcleqqqq'].'&s=640'),
            'left' => 80,
            'top' => 950,
            'right' => 0,
            'bottom' => 0,
            'width' => 100,
            'height' => 100,
            'radius' => 50,
            'opacity' => 100
        ),
        array(
            'url' => 0,
            'stream' => $qrCodeData,
            'left' => 520,
            'top' => 1100,
            'right' => 0,
            'bottom' => 0,
            'width' => 130,
            'height' => 130,
            'radius' => 0,
            'opacity' => 100
        ),
    )
);

//加载模板
poster::setConfig($config);
//设置保存路径
$res = poster::make();
//是否要清理缓存资源
poster::clear();
if (!$res) {
    exit(json_encode(array('code'=>-1,'msg'=>'生成失败，请重试')));
} else {
	exit(json_encode(array('code'=>1,'msg'=>'生成成功，消耗内存:'.changeFileSize(memory_get_usage()),'img'=>base64_encode($res))));
}
