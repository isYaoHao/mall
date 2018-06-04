require(["config"], function () {
    require(["jquery", "jquery.md5", "jquery.validation", "additional.methods", "jquery.idcode"], function () {

        $(window).ready(function () {

            $(".header").load('indexheader.html');
            $(".footer").load('indexfoot.html');


        })


    })

})