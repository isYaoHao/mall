require(["config"], function () {
    require(["jquery"], function () {

        $(".header").load("navheader.html")

        $(window).ready(function () {


            console.log($(".nav_list"))

            //li标签切换功能;
            $(".nav_list").children("li").on("mouseover", function () {
                $(".nav_list").children("li").children("div").css("display", "none")
                $(this).children("div").css("display", "block");
                $(".list").css("display", "block")

            }).mouseout(function () {
                $(".nav_list").children("li").children("div").css("display", "none")

            })
            $(".list").mouseover(function () {
                $(".list").css("display", "block")

            })
            $(".nav").mouseout(function () {
                $(".list").css("display", "none")
            })
            //分割区----------------------------------------------------------------------






        })



    })

})