$(function(){var a=null,e=$("#messageBox"),o=$("#formLogin"),r=$("#formRegister"),n=$("input[name=mail]");n.on("keyup",function(){var t,a,e,o=n.val();12<o.length&&(t=o,a=$("#emailExist"),e=$("#emailExist"),$.ajax({url:baseurl+"public/user/guard/check-email",type:r.attr("method"),dataType:"JSON",data:{mail:t},success:function(t){if(t.auth)return n.css("border-color","#ced4da"),a.html(""),e.prop("disabled",!1).css("cursor","pointer"),!0;n.css("border-color","red"),a.html(t.message),e.prop("disabled",!0).css("cursor","not-allowed")},fail:function(){console.log("Error")}}))}),r.on("submit",function(t){t.preventDefault(),a=new FormData(this),$.ajax({url:r.attr("action"),type:r.attr("method"),dataType:"JSON",data:a,processData:!1,contentType:!1,success:function(t){t.auth?location.href=t.url:($("input[name=csrf_test_name]").val(t.csrf),e.html(t.message))},fail:function(){console.log("Error")}})}),o.on("submit",function(t){t.preventDefault(),a=new FormData(this),$.ajax({url:o.attr("action"),type:o.attr("method"),dataType:"JSON",data:a,processData:!1,contentType:!1,success:function(t){t.auth?location.href=t.url:($("input[name=csrf_test_name]").val(t.csrf),e.html(t.message))},fail:function(){console.log("Error")}})})});