
var tip; // 提示框

$(document).ready(function () {
    tip = $(".load-tip");
    tip.hide();
});

/**
 * 用于显示提示信息
 *
 * @param msg    提示的信息
 * @param time   提示的时间, 默认3秒
 */
function showTip(msg, time = 3000) {
    tip.html(msg);
    tip.show();
    if (time) {
        setTimeout(function () {
            tip.hide();
        }, time);
    }
}

/**
 * 删除数据，该点击事件的元素需要有 data-id 的属性
 * @param ref   点击事件的元素
 */
function delData(ref) {
    var id = $(ref).attr('data-id');
    if (confirm("确认删除数据(删除后不可恢复)？")) {
        showTip('<i class="fa fa-spinner fa-spin"></i>删除中...', null);
        $.post(SCOPE.deleteDataUrl, {id: id}, function (res) {
            tip.hide();
            if (res.code === 0) {
                $(ref).parent().parent().remove();
            }
            showTip(res.msg);
        }, 'json')
            .error(function (err) {
                tip.hide();
                alert('请求失败');
            });
    }
}

/**
 * 显示详细数据
 *
 * @param ref
 */
function showData(ref) {
    var id = $(ref).attr('data-id');
    location.href = SCOPE.showDataUrl + "?id=" + id;
}

/**
 * 修改密码
 */
function updatePwd() {
    var data = {
        oldPwd: $("#oldPwd").val(),
        newPwd1: $("#newPwd1").val(),
        newPwd2: $("#newPwd2").val()
    };
    $.post(SCOPE.updatePwdUrl, data, function (res) {
        if (res.code === 0) {
            location.reload();
        } else {
            $("#oldPwd").val('');
            $("#newPwd1").val('');
            $("#newPwd2").val('');
        }
        showTip(res.msg);
    }, 'json')
        .error(function (err) {
            $("#oldPwd").val('');
            $("#newPwd1").val('');
            $("#newPwd2").val('');
           showTip("请求失败");
        });
}