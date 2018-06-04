

//config配置;
define("config",function () {

    require.config({
        baseUrl:"./js",
        paths:{
            "jquery":["lib/jquery-3.3.1"],
            "jquery.md5":["lib/jquery.md5"],
            "jquery.validation":["lib/jquery-validation/jquery.validate"],
            "additional.methods":["lib/jquery-validation/additional-methods"],
            "jquery.idcode":["lib/idcode/jquery.idcode"]
        },
        shim:{
            "jquery.md5":{
                deps:["jquery"]
            },
            "jquery.idcode":{
                deps:["jquery"]
            }

        }
    })

})