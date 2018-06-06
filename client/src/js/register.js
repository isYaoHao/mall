require(["config"], function () {
    require(["jquery", "md5", "jquery.validation", "additional.methods", "idcode"], function () {


        $(function () {

            $(".header").load('indexheader.html');
            $(".footer").load('indexfoot.html');
            console.log($("#myform"));

            $("#myform").validate({
                  submitHandler: function () {
                      return false;


                  },
                rules: {
                    "uname": {
                        "require": "true",
                        "rangelength": [6, 18],

                        remote: {
                            url: "http://127.0.0.1/php01/secoonet/server/registerremote.php",
                            dataType: "json",
                            type:"get"
                        }

                    },
                    "upwd": {
                        "require": "true",
                        "rangelength": [6, 18]
                    }
                }
            })

        })


    })

})