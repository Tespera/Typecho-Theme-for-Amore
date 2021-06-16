
/*!

=========================================================
* 述尔・Amore | 一个产品经理的碎碎念 | 一切从简
=========================================================

* Copyright 2021 Amore (https://www.amore.ink)

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/



// declaraction of document.ready() function.
(function () {
    var ie = !!(window.attachEvent && !window.opera);
    var wk = /webkit\/(\d+)/i.test(navigator.userAgent) && (RegExp.$1 < 525);
    var fn = [];
    var run = function () {
        for (var i = 0; i < fn.length; i++) fn[i]();
    };
    var d = document;
    d.ready = function (f) {
        if (!ie && !wk && d.addEventListener)
            return d.addEventListener('DOMContentLoaded', f, false);
        if (fn.push(f) > 1) return;
        if (ie)
            (function () {
                try {
                    d.documentElement.doScroll('left');
                    run();
                } catch (err) {
                    setTimeout(arguments.callee, 0);
                }
            })();
        else if (wk)
            var t = setInterval(function () {
                if (/^(loaded|complete)$/.test(d.readyState))
                    clearInterval(t), run();
            }, 0);
    };
})();


document.ready(
    // toggleTheme function.
    // this script shouldn't be changed.
    function () {
        var _Blog = window._Blog || {};
        const currentTheme = window.localStorage && window.localStorage.getItem('theme');
        const isDark = currentTheme === 'dark';
        if (isDark) {
            document.getElementById("switch_default").checked = true;
            // mobile
            // document.getElementById("mobile-toggle-theme").innerText = "· Dark"
        } else {
            document.getElementById("switch_default").checked = false;
            // mobile
            // document.getElementById("mobile-toggle-theme").innerText = "· Dark"
        }
        _Blog.toggleTheme = function () {
            if (isDark) {
                document.getElementsByTagName('body')[0].classList.add('dark-theme');
                // mobile
                // document.getElementById("mobile-toggle-theme").innerText = "· Light"
            } else {
                document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                // mobile
                // document.getElementById("mobile-toggle-theme").innerText = "· Light"
            }
            document.getElementsByClassName('toggleBtn')[0].addEventListener('click', () => {
                if (document.getElementsByTagName('body')[0].classList.contains('dark-theme')) {
                    document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                } else {
                    document.getElementsByTagName('body')[0].classList.add('dark-theme');
                }
                window.localStorage &&
                window.localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light',)
            })
            // moblie
            document.getElementById('mobile-toggle-theme').addEventListener('click', () => {
                if (document.getElementsByTagName('body')[0].classList.contains('dark-theme')) {
                    document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                    // mobile
                    // document.getElementById("mobile-toggle-theme").innerText = "· Light"

                } else {
                    document.getElementsByTagName('body')[0].classList.add('dark-theme');
                    // mobile
                    // document.getElementById("mobile-toggle-theme").innerText = "· Dark"
                }
                window.localStorage &&
                window.localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light',)
            })
        };
        _Blog.toggleTheme();

        // ready function.

    }
);


console.log(
      '\n' 
    + ' %c Typecho Theme for Amore' 
    + ' v2.0' 
    + ' %c https://www.amore.ink ' 
    + '\n', 

    'color: #fadfa3; background: #030307; padding:5px 0; line-height:1.5;', 

    'background: #fadfa3; padding:5px 0; line-height:1.5;'

    );




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

// function(){

//     $(window).scroll(function(){100<$(this).scrollTop()?$("#back-to-top").fadeIn():$("#back-to-top").fadeOut()}),$("#back-to-top").on("click",function(t){return t.preventDefault(),$("html, body").animate({scrollTop:0},1e3),!1})
// };