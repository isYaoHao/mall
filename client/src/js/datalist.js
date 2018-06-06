require(["config"], function () {
    require(["jquery"], function () {

        //加载头部;
        $(".header").load("navheader.html", function () {
            jQuery.getScript("js/navheader.js")
        })

        $(".footer").load("indexfoot.html")

        var dataList = window.localStorage.getItem("datalist");


        $.ajax({
            data: {
                datalist: dataList
            },
            url: "http://127.0.0.1/php01/secoonet/server/datalist.php",
            dataType: "json",
            type: "GET"
        }).then(function (res) {

            $(".bodyer_list_top a").eq(2).text(res.goodsname1);
            $(".bodyer_list_top a").eq(3).text(res.goodsname2);
            $(".bodyer_list_top a").eq(4).text(res.goodsname3);

            $(".bodyer_list_top span i").html(`&nbsp;&nbsp;&nbsp;${res.goodsid}`);

            $(".data_left_list ul li img").eq(0).prop("src", res.goodspt1);
            $(".data_left_list ul li img").eq(1).prop("src", res.goodspt2);
            $(".data_left_list ul li img").eq(2).prop("src", res.goodspt3);

            $(".data_left_big img").prop("src", res.goodspt1);

            $(".bodyer_data_right h4").eq(0).text(res.goodsname3)
            $(".bodyer_data_right p").eq(0).children("i").text(res.goodsprice)

            $("#detaillist li img").eq(0).prop("src", res.goodspt1);
            $("#detaillist li img").eq(1).prop("src", res.goodspt2);
            $("#detaillist li img").eq(2).prop("src", res.goodspt3);

        })


        //

        $(window).ready(function () {


            console.log($(".nav_list"));


            //分割区----------------------------------------------------------------------


            //动态显示大图 的默认显示
            $(".data_left_big img").attr("src", $(".data_left_list ul li").eq(0).children("img").attr("src"))


            //动态显示大图;

            $(".data_left_list ul li").on("mouseenter", function () {
                $(this).css("border", "1px dashed #666666 ");

                console.log($(this).children("img").attr("src"));

                $(".data_left_big img").attr("src", $(this).children("img").attr("src"))

            }).mouseleave(function () {
                $(this).css("border-style", "none");

            })

            //颜色选择框
            $("#bodyColor span").eq(0).addClass("selectcolor")
            $("#bodyColor span").on("click", function () {
                console.log($(this).toggleClass("selectcolor").siblings().removeClass("selectcolor"));

            })
            //字体选择框
            //默认选择框
            $("#bodyFont a").eq(0).addClass("selectcolor")
            $("#bodyFont a").on("click", function () {
                console.log($(this).toggleClass("selectcolor").siblings().removeClass("selectcolor"));

            })

            //购物车加减
            $("#reduce").on("click", function () {

                $(this).next().val(Number($(this).next().val()) < 1 ? 0 : Number($(this).next().val()) - 1);


            })
            $("#add").on("click", function () {
                $(this).prev().val(Number($(this).prev().val()) + 1);


            })

            //大家都在买部分动画
            $(".bodyer_foot_left li").on("mouseenter", function () {
                $(this).children("div").children("img").animate({
                    width: 80, height: 80

                }, 100);

            }).mouseleave(function () {

                $(this).children("div").children("img").animate({
                    width: 64, height: 64

                }, 100);
            })

            //放大镜功能;

            var moveBoxWigth = $("#moveBox").width(),
                moveBoxHeight = $("#moveBox").height(),
                bigBoxWigth = $(".data_left_big").width(),
                bigBoxHeight = $(".data_left_big").height()


            $(".data_left_big").on("mouseenter", function () {
                console.log(1);

            });

            $(".data_left_big").on("mousemove",function (evt) {
                $("#moveBox").offset({
                    left: (evt.pageX - moveBoxWigth / 2),
                    top: evt.pageY - moveBoxHeight / 2
                })

            })




        })


    })

})