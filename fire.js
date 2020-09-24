$(function () {
    resize();
    $.ajax({
        type: 'GET',
        url: "./block"
    }).done(function (data) {
        localStorage["block"] = data
    })
    $("#send").click(function () {
        wish = $("#wish").val()
        if (wish == "") {
            toastr.clear()
            toastr.error("<h3>錯誤</h3><br><p>輸入形式錯誤</p>")
        } else {
            $.ajax({
                type: 'POST',
                url: "./wish",
                data: {wish: encodeURIComponent(wish)}
            }).done(function (data) {
                getblock("no")
                $("#wish").val("")
                toastr.clear()
                toastr.success("<h3>許願成功</h3><br><p>去看看大家願望吧！</p>")
            })
        }
    })
})


function getblock(s) {
    olddata = JSON.parse(localStorage["block"])
    $.ajax({
        type: 'GET',
        url: "./block"
    }).done(function (data) {
        localStorage["block"] = data
        if (olddata.length < JSON.parse(localStorage["block"]).length) {
            var j = JSON.parse(localStorage["block"]).length - olddata.length
            for (i = 0; i < j; i++) {
                getinfo(olddata.length + i)
            }
        }
        if (s !== "no") {
            toastr.clear()
            toastr.success("<h3>區塊更新成功</h3>")
        }
    })
}

function getinfo(n) {
    data = JSON.parse(localStorage["block"])
    console.log(decodeURIComponent(atob(data[n].text)));
    toastr.info('區塊 ' + data[n].id + ' 的願望是：' + decodeURIComponent(atob(data[n].text)))
}

setInterval("getblock(\"no\")", 2000);
$(window).resize(function () {
    resize();
});

function resize() {

    var areaHeight = ($(window).height() - 200) * 0.4;
    var areaWidth = $(window).width() * 0.4;
    var showSize = Math.min(areaHeight, areaWidth)
    // console.log(areaHeight);
    // console.log(areaWidth);
    // console.log(showSize);
    $(".fire").css("width", showSize);
    $(".fire").css("height", showSize);

}