<?php
/**
 * 一个简约到极致的博客
 * @package Amore · Head
 * @author Amore
 * @version 2.0
 * @link https://amore.ink/
 */
?>




<!DOCTYPE html>

<html lang="zh-CN" prefix="og: http://ogp.me/ns#">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>

    <meta itemprop="name" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>">

    <meta itemprop="image" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>">

    <meta name="keywords" content="<?php $this->options->keywords(); ?>" /> 

    <meta name="description" itemprop="description" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>">


    <title>

      <?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>

        <?php $this->options->title(); ?> | <?php $this->options->description(); ?>
          
    </title>


    <meta itemprop="name" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>">

    <meta name="description" itemprop="description" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>">

    <meta property="og:type" content="website" />

    <meta property="og:url" content="<?php $this->options->siteUrl(); ?>" />

    <meta property="og:image" content="<?php $this->options->themeUrl('favicon.ico'); ?>" />

    <meta property="og:title" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>" />

    <meta property="og:description" content="<?php $this->options->title(); ?> | <?php $this->options->description(); ?>" />

    <link rel="canonical" href="https://amore.ink/" />

    <link rel="shortcut icon" href="<?php $this->options->themeUrl('favicon.ico'); ?>">

    <link rel="bookmark" href="<?php $this->options->themeUrl('favicon.ico'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php $this->options->themeUrl('avatar.jpg'); ?>">


    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>" media="screen" type="text/css">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/demo.css'); ?>"  type="text/css">

    <script src="<?php $this->options->themeUrl('js/script.js'); ?>" type="text/javascript"></script>

    <script src="<?php $this->options->themeUrl('js/min.js'); ?>" type="text/javascript"></script>
    

    <?php $this->header(); ?>
    <style>
        .zuobiao i {
            line-height: 1.8;
            margin-right: 6px;
            vertical-align: middle;
            background-image: url(<?php $this->options->themeUrl('css/zuobiao.svg'); ?>);
            background-size: 100%;
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-top: -2px;
        }
    </style>

</head>

<body>