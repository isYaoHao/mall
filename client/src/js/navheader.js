

$(function () {


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

    //登录信息加载;
    if(sessionStorage.length>=1){
        var userData=JSON.parse(window.sessionStorage.getItem("user"))
        console.log(userData.uname);
        $("#navList li").eq(0).html(`您好,<a href="javascript:">${userData.uname}</a>`)



    }

    //



})