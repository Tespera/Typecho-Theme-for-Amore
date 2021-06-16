
/*!

=========================================================
* 述尔・Amore | 一个产品经理的碎碎念 | 一切从简
=========================================================

* Copyright 2021 Amore (https://www.amore.ink)

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/


$(document).ready(function(){

	$(window).scroll(function(){
		var scroTop = $(window).scrollTop();
		if(scroTop>100){
			$('#gototop').fadeIn(500);
		}else{
			$('#gototop').fadeOut(500);
		}
	});

	$('#gototop').click(function(){
		$("html,body").animate({scrollTop:0},"fast");
	});

});

var mobileHover = function () {
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });
};

//pjax 刷新
$(document).pjax('a:not(a[target="_blank"], a[no-pjax])', {
    container: '#content',
    fragment: '#content',
    timeout: 8000
}).on('pjax:send',
function() {
		$("#colophon").addClass("opacity-disappear");
}).on('pjax:complete',
	function() {
	if (typeof Prism !== 'undefined') {
		Prism.highlightAll(true,null);
	}
  $('#dark').click(function(){switchNightMode();});
	$("#colophon").addClass("opacity-show");
	$("#post img").each(function(){
				$(this).wrap(function(){
					if($(this).is(".bq"))
					{
						 return '';
					}
				return '<a data-fancybox="gallery" no-pjax data-type="image" href="' + $(this).attr("src") + '" class="light-link"></a>';
		 })
	});
}).on('pjax:click',function() {$('body,html').animate({scrollTop:0},200);});

Smilies = {
    dom: function(id) {
        return document.getElementById(id);
    },
    grin: function(tag) {
        tag = ' ' + tag + ' ';
        myField = this.dom("textarea");
        document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
    },
    insertTag: function(tag) {
        myField = Smilies.dom("textarea");
        myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
    }
}


function OwO_show(){
	if($("#OwO-container").css("display")=='none'){
		 $("#OwO-container").slideDown();
	}else{
		 $("#OwO-container").slideUp();
	 }
}



function switchNightMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    if(night == '0'){
        document.querySelector('link[title="dark"]').disabled = true;
        document.querySelector('link[title="dark"]').disabled = false;
        document.cookie = "night=1;path=/"
        console.log('夜间模式开启');
    }else{
        document.querySelector('link[title="dark"]').disabled = true;
        document.cookie = "night=0;path=/"
        console.log('夜间模式关闭');
    }
}
/*夜间模式开关点击事件*/
$('#dark').click(function(){switchNightMode();});
/*立即执行函数*/
$(function () {

/*夜间模式自动切换*/
const mode = getComputedStyle(document.documentElement).getPropertyValue('content');
var hour = new Date().getHours();
    if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") === ''){
        if(hour > 21 || hour < 6 || mode == '"dark"'){
        $('#dark span').attr("class","fui-yue");
        document.querySelector('link[title="dark"]').disabled = true;
        document.querySelector('link[title="dark"]').disabled = false;document.cookie = "night=1;path=/";
        console.log('夜间模式开启');
        }else{
        $('#dark span').attr("class","fui-ri");
        document.cookie = "night=0;path=/";
        console.log('夜间模式关闭');
        }
    }else{
        var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
        if(night == '0'){
        $('#dark span').attr("class","fui-ri");
        document.querySelector('link[title="dark"]').disabled = true;
        console.log('夜间模式关闭');
        }else if(night == '1'){
        $('#dark span').attr("class","fui-yue");
        document.querySelector('link[title="dark"]').disabled = true;
        document.querySelector('link[title="dark"]').disabled = false;
        console.log('夜间模式开启');

        }
    }
})