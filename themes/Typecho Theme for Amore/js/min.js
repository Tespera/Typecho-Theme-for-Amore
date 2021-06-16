
/*!

=========================================================
* 述尔・Amore | 一个产品经理的碎碎念 | 一切从简
=========================================================

* Copyright 2021 Amore (https://www.amore.ink)

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/



"use strict";var themeApp={featuredMedia:function(){$(".post").each(function(){var t=$(this),e=$(this).find("featured"),i=e.find($("img")),n=e.find("iframe");0<i.length?($(i).insertAfter(t.find(".post-head")).wrap("<div class='featured-media'></div>"),t.addClass("post-type-image"),e.remove()):0<n.length&&($(n).insertAfter(t.find(".post-head")).wrap("<div class='featured-media'></div>"),t.addClass("post-type-embeded"))})},sidebarConfig:function(){1==sidebar_left&&($(".main-content").addClass("col-md-push-4"),$(".sidebar").addClass("col-md-pull-8"))},recentPost:function(){var a=String("");$.get("/rss/",function(t){$(t).find("item").slice(0,recent_post_count).each(function(){$(this).find("description").text(),$(this).contentSnippet;var t,e=$(this).find("link").text(),i=$(this).find("title").text(),n=$(this).find("pubDate").text();a+='<div class="recent-single-post">',a+='<a href="'+e+'" class="post-title">'+i+'</a><div class="date">'+(t=n,["January","February","March","April","May","June","July","August","September","October","November","December"][(t=new Date(t)).getMonth()]+" "+t.getDate()+", "+t.getFullYear())+"</div>",a+="</div>"}),$(".recent-post").html(a)})},highlighter:function(){$("pre code").each(function(t,e){hljs.highlightBlock(e)})},backToTop:function(){$(window).scroll(function(){100<$(this).scrollTop()?$("#back-to-top").fadeIn():$("#back-to-top").fadeOut()}),$("#back-to-top").on("click",function(t){return t.preventDefault(),$("html, body").animate({scrollTop:0},1e3),!1})},init:function(){themeApp.featuredMedia(),themeApp.highlighter(),themeApp.backToTop()}};$(document).ready(function(){themeApp.init()});