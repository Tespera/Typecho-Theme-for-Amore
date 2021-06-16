
/*!

=========================================================
* 述尔・Amore | 一个产品经理的碎碎念 | 一切从简
=========================================================

* Copyright 2021 Amore (https://www.amore.ink)

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/


// 1、复制文字自带版权信息
;(function () {
    function _copyRight(options) {
        var text_copy = ''
        if (document.Selection) {
            //兼容 IE
            text_copy = document.selection.createRange().text
        } else {
            text_copy = window.getSelection().toString()
        }
        if (typeof options.limit !== 'undefined' && text_copy.length < options.limit) {
            return
        }

        var _title = '<br /><br /><br />* 文字来源：' + options.title
        var _author = '<br />* 文章作者：' + options.author
        var _pagelink = '<br />* 原文链接：' + location.href
        var _right = '<br />* 申  明：' + options.right

        var selection = window.getSelection()
        var div = document.createElement('div')
        div.innerHTML = text_copy + _title + _author + _pagelink + _right
        document.body.appendChild(div)
        selection.selectAllChildren(div)
        setTimeout(function () {
            document.body.removeChild(div)
        }, 100)
        if (typeof options.callback !== 'undefined') {
            options.callback()
        }
    }

    window.$CopyRight = {
        copyRight: _copyRight
    }
    return $CopyRight
})()


document.body.oncopy = function () {
    $CopyRight.copyRight({
        title: '述尔・Amore | 一个产品经理的碎碎念 | 一切从简',
        author: 'Amore',
        right: '著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。',
        limit: 300,
        callback: function () {
            globalAlert('Copy Successfully!')
        }
    })
}

//全局提醒框
    function globalAlert(_text, _time = 1.5) {
        $(".global-alert").text(_text)
        $(".global-alert").css('display','block')
        setTimeout(function () {
            $(".global-alert").css('display','none')
        },_time * 1000)
    }





// 2、鼠标点击特效
let a_idx = 0;
jQuery(document).ready(function($) {
    $("body").click(function(e) {
        let a = new Array("富强", "民主", "文明", "和谐", "自由", "平等", "公正" ,"法治", "爱国", "敬业", "诚信", "友善");
        // let a = new Array("😉", "😏", "😂️", "😌", "😋", "😙", "😘" ,"😜", "😝", "🤓", "😅", "😄");
        let $i = $("<span/>").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;
        let x = e.pageX,
            y = e.pageY;
        $i.css({
            "z-index": 999999,
            "top": y - 25,
            "left": x,
            "position": "absolute",
            "font-size": "13px",
            "font-weight": "bold",
            "color": "#E35454"
        });

        $("body").append($i);
        $i.animate({
                "top": y - 120,
                "opacity": 0
            },
            1200,
            function() {
                $i.remove();
            });
    });
});



// 3、统计网站运行时间

// 获取当前日期
function Today(){
    let d = new Date();
    let Y = d.getFullYear();
    let M = d.getMonth();
    let D = d.getDate();
    Today.innerHTML = Y +"年"+ M +"月"+ D +"日"
}
 Today();

// 统计时间


function setTime() {

    // 博客创建时间秒数，时间格式中，月比较特殊，是从0开始的，所以想要显示12月，得写11才行，如下
    let create_time = Math.round(new Date(Date.UTC(2017, 11, 21, 0, 0, 0)).getTime() / 1000);

    // 当前时间秒数,增加时区的差异
    let timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
    currentTime = secondToDate((timestamp - create_time));

    // 1、显示：年月日时分秒  (开启 demo.css 文件的 #SiteAge)
    // currentTimeHtml = currentTime[0] + ' 年' + currentTime[1] + '天' + currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4] + '秒';

    // 2、只显示：天数
    currentTimeHtml = currentTime[0] * 365 + currentTime[1] + '天';


    document.getElementById("SiteAge").innerHTML = currentTimeHtml;
}setInterval(setTime, 1000);





function secondToDate(second) {
    if (!second) {
        return 0;
    }
    let time = new Array(0, 0, 0, 0, 0);
    if (second >= 365 * 24 * 3600) {
        time[0] = parseInt(second / (365 * 24 * 3600));
        second %= 365 * 24 * 3600;
    }
    if (second >= 24 * 3600) {
        time[1] = parseInt(second / (24 * 3600));
        second %= 24 * 3600;
    }
    if (second >= 3600) {
        time[2] = parseInt(second / 3600);
        second %= 3600;
    }
    if (second >= 60) {
        time[3] = parseInt(second / 60);
        second %= 60;
    }
    if (second > 0) {
        time[4] = second;
    }
    return time;
}secondToDate();


