$(function () {
    var login_banner = function () {
        // 定义操作的元素
        var login_banner_items = $(".banner_item");
        var login_index = $("#login");

        var item_sum = login_banner_items.length;

        // 根据图片数量生成index li的数量
        login_index.find("li").remove()
        for (var i = 0; i < item_sum; i++) {
            login_index.append("<li></li>")
        }

        var icons = login_index.find('li');
        icons.eq(0).addClass('show_active');
        login_index.find("li").click(function (event) {
            login_banner_items.removeClass('show');
            icons.removeClass('show_active');
            login_banner_items.eq($(this).index()).addClass('show');
            icons.eq($(this).index()).addClass('show_active');
        });
    }
    login_banner();

    var index_banner = function () {
        // 定义操作的元素
        var banner_box = $(".main_banner");
        var banner_list = $(".main_banner_list");
        var banneritems = $(".main_banner_item");
        var item_sum = banneritems.length;
        var last_item = banneritems.last();
        var index = $("#index");
        var to_before = $("a.before");
        var to_after = $("a.after");
        var move_width = 800;
        var item_index = 0;

        // 将最后一张图片复制并放在最前面
        // banner_list.prepend(last_item.clone());

        // 根据图片数量生成index li的数量
        index.find("li").remove()
        for (var i = 0; i < item_sum; i++) {
            index.append("<li></li>")
        }
        //修改初始样式
        banner_list.width(item_sum * 800);
        var index_width = 800 / (item_sum);
        index.find("li").width(index_width);
        index.find("li").eq(0).addClass('active');
        //banner_list.width(700*(item_sum));
        // banner_list.css({"left":"-700px"});
        // index.css({"left":"700px"});
        //设置index宽度

        //点击上一张
        to_before.click(function (event) {
            //move_width *=700+"px";
            // alert("上一张hhh");
            if (item_index <= 0) {
                item_index = item_sum;
            }
            item_index--;
            move_width = (-(item_index) * 800);
            banner_list.css({
                "left": move_width + "px"
            });
            index.css({
                "left": (-move_width) + "px"
            });
            index.find('li').removeClass('active')
            index.find('li').eq(item_index).addClass('active');
        });
        //点击下一张
        to_after.click(function (event) {
            // alert("下一张");
            if (item_index >= item_sum - 1) {
                item_index = -1;
            }
            move_width = (-(item_index + 1) * 800);
            banner_list.css({
                "left": move_width + "px"
            });
            index.css({
                "left": (-move_width) + "px"
            });
            index.find('li').removeClass('active')
            index.find('li').eq(item_index + 1).addClass('active');
            item_index++;
        });
    }
    index_banner();

    // 语言选择
    var lang = function () {
        var jSelect = $(".jsSelect");
        $(jSelect).find("li:first").hover(function () {
            h = $(this).parent("ul").find("li").length;
            $(this).parent("ul").css("height", 28 * h);
            $(this).siblings("li:not(.s)").mouseenter(function () {
                $(this).css("background", "#428bca").css("color", "#FFFFFF")
            });
            $(this).siblings("li:not(.s)").mouseleave(function () {
                $(this).css("background", "none").css("color", "#428bca")
            });

            $(this).parent(jSelect).mouseleave(function () {
                $(this).css("height", 28)
            });
        });
        $(jSelect).find("li:not(.s)").click(function () {
            var cContent = $(jSelect).find("li:first").html();
            var cdContent = $(this).html();
            $(jSelect).find("li:first").html(cdContent);
            $(this).html(cContent);
            $(this).find('a').removeClass('s');
            $(this).find('a').removeAttr('style');
            $(jSelect).find("li:first").addClass('s');
            $(this).parent("ul").css("height", 28);
        });
    }
    lang();
});
