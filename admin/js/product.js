/* 
 * 此js主要是通过ajax对商品的操作
 *包含了查看商品，编辑商品，查看已卖出的商品 
 * 
 */
///////////////////////////查看商品////////////////////////////////////////////////////
$(document).ready($("#showproduct").click(function () {
    var curPage = 1; //当前页码
    var total, pageSize, totalPage;
//获取数据
    function getData(page) {
        $.ajax({
            type: 'POST',
            url: 'pages.php',
            data: {'pageNum': page - 1, 'method': "showpro"},
            dataType: 'json',
            beforeSend: function () {
                // $("#").empty();
                $("#pagecount").empty();
//                $("#list #product_table").append("<li id=\'loading\'>loading...</li>");
            },
            success: function (json) {
                //alert(page);
                $("#list #product_table").empty();
                $("#pagecount").empty();
                total = json.total; //总记录数
                pageSize = json.pageSize; //每页显示条数
                curPage = page; //当前页
                totalPage = json.totalPage; //总页数
                var table = "";
                var tr = "";
                var list = json.list;
                table = "<table class=\"layui-table\">"
                        + "<colgroup>"
                        + "<col width=\"150\">"
                        + "<col width=\"200\">"
                        + "<col>"
                        + "</colgroup>"
                        + "<thead>"
                        + "<tr>"
                        + "<th>产品id</th>"
                        + "<th>产品名</th>"
                        + "<th>产品单价</th>"
                        + "<th>产品描述</th>"
                        + "<th>产品库存</th>"
                        + "</tr>"
                        + "</thead>"
                        + "<tbody></tbody>"
                        + "</table>";
                $("#list #product_table").append(table);
                $.each(list, function (index, array) { //遍历json数据列
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    tr += "<tr><td>" + array['product_id'] + "</td><td>"
                            + array['product_name'] + "</td><td>"
                            + array['price'] + "</td><td>"
                            + array['description'] + "</td><td>"
                            + array['qty'] + "</td></tr>";
                });
                $("#list tbody").append(tr);
            },
            complete: function () { //生成分页条
                getPageBar();
            },
            error: function () {
                alert("数据加载失败");
            }
        });
    }

//获取分页条
    function getPageBar() {
        //页码大于最大页数
        if (curPage > totalPage)
            curPage = totalPage;
        //页码小于1
        if (curPage < 1)
            curPage = 1;
        pageStr = "<span>共" + total + "条</span><span>" + curPage + "/" + totalPage + "</span>";

        //如果是第一页
        if (curPage == 1) {
            pageStr += "<span>首页</span><span>上一页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='sp' rel='1'>首页</a></span><span><a href='javascript:void(0)' id='sp' rel='" + (curPage - 1) + "'>上一页</a></span>";
        }

        //如果是最后页
        if (curPage >= totalPage) {
            pageStr += "<span>下一页</span><span>尾页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='sp' rel='" + (parseInt(curPage) + 1) + "'>下一页</a></span><span><a href='javascript:void(0)' id='sp' rel='" + totalPage + "'>尾页</a></span>";
        }

        $("#pagecount").html(pageStr);
    }

    $(function () {
        getData(1);
        $(document).on('click', '#pagecount span #sp', function (event) {
            event.preventDefault();
            var rel = $(this).attr("rel");
            if (rel) {
                getData(rel);
            }
        });
    });
}));
/////////////////////////////////////////////////////end//////////////////////////////////////////////////////////////



//
//////////////////////////////////////////编辑商品/////////////////////////////////
//

$(document).ready($("#editproduct").click(function () {
    var curPage = 1; //当前页码
    var total, pageSize, totalPage;
//获取数据
    function getData(page) {
        $.ajax({
            type: 'POST',
            url: 'pages.php',
            data: {'pageNum': page - 1, 'method': "showpro"},
            dataType: 'json',
            beforeSend: function () {
                // $("#").empty();
                $("#pagecount").empty();
//                $("#list #product_table").append("<li id=\'loading\'>loading...</li>");
            },
            success: function (json) {
                //alert(page);
                //$("#list").css("height", "635px");
                $("#list #product_table").empty();
                $("#pagecount").empty();
                total = json.total; //总记录数
                pageSize = json.pageSize; //每页显示条数
                curPage = page; //当前页
                totalPage = json.totalPage; //总页数
                var table = "";
                var tr = "";
                var list = json.list;
                table = "<table class=\"layui-table\" id=\"table\">"
                        + "<colgroup>"
                        + "<col width=\"150\">"
                        + "<col width=\"200\">"
                        + "<col>"
                        + "</colgroup>"
                        + "<thead>"
                        + "<tr>"
                        + "<th>产品id</th>"
                        + "<th>产品名</th>"
                        + "<th>产品单价</th>"
                        + "<th>产品描述</th>"
                        + "<th>产品库存</th>"
                        + "<th>操作</th>"
                        + "</tr>"
                        + "</thead>"
                        + "<tbody></tbody>"
                        + "</table>";
                $("#list #product_table").append(table);
                $.each(list, function (index, array) { //遍历json数据列
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    tr += "<tr><td>" + array['product_id'] + "</td><td>"
                            + array['product_name'] + "</td><td>"
                            + array['price'] + "</td><td>"
                            + array['description'] + "</td><td>"
                            + array['qty'] + "</td><td>"
                            + "<button class='layui-btn layui-btn-sm' id='editrow' value='编辑' ><i class='layui-icon'>&#xe642;</i></button></td></tr>";
                });
                $("#list tbody").append(tr);
            },
            complete: function () { //生成分页条
                getPageBar();
            },
            error: function () {
                alert("数据加载失败");
            }
        });
    }

//获取分页条
    function getPageBar() {
        //页码大于最大页数
        if (curPage > totalPage)
            curPage = totalPage;
        //页码小于1
        if (curPage < 1)
            curPage = 1;
        pageStr = "<span>共" + total + "条</span><span>" + curPage + "/" + totalPage + "</span>";

        //如果是第一页
        if (curPage == 1) {
            pageStr += "<span>首页</span><span>上一页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='ep' rel='1'>首页</a></span><span><a href='javascript:void(0)' id='ep' rel='" + (curPage - 1) + "'>上一页</a></span>";
        }

        //如果是最后页
        if (curPage >= totalPage) {
            pageStr += "<span>下一页</span><span>尾页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='ep' rel='" + (parseInt(curPage) + 1) + "'>下一页</a></span><span><a href='javascript:void(0)' id='ep' rel='" + totalPage + "'>尾页</a></span>";
        }

        $("#pagecount").html(pageStr);
    }

    $(function () {
        getData(1);
        $(document).on('click', '#pagecount span #ep', function (event) {
            event.preventDefault();
            var rel = $(this).attr("rel");
            if (rel) {
                getData(rel);
            }
        });
    });
    //编辑



}));
//进行修改数据

$(function () {

    $(document).on("click", ".layui-table button#editrow", function () {
        //alert("ceshi");
        $(this).attr({id: "saverow"});
        //$(this).parents('tr').attr('id',"edrow");
        //$(this).parent('tr').attr({id:"test"});
        var tds = $(this).parents("tr").children();
        $.each(tds, function (i, val) {
            var jqob = $(val);
            if (i < 1 || jqob.has('button').length) {
                return true;
            }//跳过第1项 序号,按钮
            var txt = jqob.text();
            var put = $("<input type='text'class='layui-input'>");
            put.val(txt);
            jqob.html(put);
        });
        $(this).html("<i class='layui-icon'>&#xe605;</i>");
    });

    $(document).on("click", ".layui-table button#saverow", function () {

        $(this).attr({id: "editrow"});
        //$("#saverow").parents('tr').attr({id:"test"});
        var $tr = $(this).parents('tr');
        $tr.each(function () {
            var tdArr = $(this).children();
            var product_id = tdArr.eq(0).text();
            var product_name = tdArr.eq(1).find("input").val();
            var price = tdArr.eq(2).find("input").val();
            var description = tdArr.eq(3).find("input").val();
            var qty = tdArr.eq(4).find("input").val();
//            alert(product_id);
//            alert(product_name);
//            alert(price);
//            alert(description);
//            alert(qty);
            var data = {product_id: product_id, product_name: product_name, price: price, description: description, qty: qty, method: "updatepro"};
            var $btn = $(this);
            $.ajax({
                "url": 'editpro.php',
                "data": data,
                "datatype": 'json',
                "type": "post",
                "error": function () {
                    alert("服务器未正常响应，请重试");
                },
                "success": function (arr) {
                    //alert(arr);
                    // var arr = json.arr;
                    array = eval("(" + arr + ")");
                    //console.log(array);
                    var product_id = array.product_id;
                    var product_name = array.product_name;
                    var price = array.price;
                    var description = array.description;
                    var qty = array.qty;
                    //alert(product_id);
                    //alert(array.product_name);
                    //alert(response); 
                    //var $tr = $btn.parents('tr'); 
                    //console.log($tr);
                    //$tr.empty(); 
                    var changetr = "";
                    //alert(array[0]);
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    changetr = "<td>" + product_id + "</td><td>"
                            + product_name + "</td><td>"
                            + price + "</td><td>"
                            + description + "</td><td>"
                            + qty + "</td><td>"
                            + "<button class='layui-btn layui-btn-sm' id='editrow' value='编辑' ><i class='layui-icon'>&#xe642;</i></button></td>";


                    //$(this).replaceWith(changetr); 
                    $tr.html(changetr);
                }
            });

        });
        $(this).html("<i class='layui-icon'>&#xe642;</i>");

    });
});




//$("#edit").click(function () {
//     
//      alert("mgkjnbjng");
//    });
////////////////////////////////////////////end////////////////////////////////////////////
//
//查询已卖出商品
//
$(document).ready($("#saled").click(function () {
    var curPage = 1; //当前页码
    var total, pageSize, totalPage;
//获取数据
    function getData(page) {
        $.ajax({
            type: 'POST',
            url: 'pages.php',
            data: {'pageNum': page - 1, 'method': "saled"},
            dataType: 'json',
            beforeSend: function () {
                // $("#").empty();
                $("#pagecount").empty();
//                $("#list #product_table").append("<li id=\'loading\'>loading...</li>");
            },
            success: function (json) {
                //alert(page);
                $("#list #product_table").empty();
                $("#pagecount").empty();
                total = json.total; //总记录数
                pageSize = json.pageSize; //每页显示条数
                curPage = page; //当前页
                totalPage = json.totalPage; //总页数
                var table = "";
                var tr = "";
                var list = json.list;
                table = "<table class=\"layui-table\">"
                        + "<colgroup>"
                        + "<col width=\"150\">"
                        + "<col width=\"200\">"
                        + "<col>"
                        + "</colgroup>"
                        + "<thead>"
                        + "<tr>"
                        + "<th>产品id</th>"
                        + "<th>产品名</th>"
                        + "<th>产品单价</th>"
                        + "<th>产品销售量</th>"
                        + "</tr>"
                        + "</thead>"
                        + "<tbody></tbody>"
                        + "</table>";
                $("#list #product_table").append(table);
                $.each(list, function (index, array) { //遍历json数据列
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    tr += "<tr><td>" + array['product_id'] + "</td><td>"
                            + array['product_name'] + "</td><td>"
                            + array['price'] + "</td><td>"
                            + array['qty'] + "</td></tr>";
                });
                $("#list tbody").append(tr);
            },
            complete: function () { //生成分页条
                getPageBar();
            },
            error: function () {
                alert("数据加载失败");
            }
        });
    }

//获取分页条
    function getPageBar() {
        //页码大于最大页数
        if (curPage > totalPage)
            curPage = totalPage;
        //页码小于1
        if (curPage < 1)
            curPage = 1;
        pageStr = "<span>共" + total + "条</span><span>" + curPage + "/" + totalPage + "</span>";

        //如果是第一页
        if (curPage == 1) {
            pageStr += "<span>首页</span><span>上一页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='sal' rel='1'>首页</a></span><span><a href='javascript:void(0)' id='sal' rel='" + (curPage - 1) + "'>上一页</a></span>";
        }

        //如果是最后页
        if (curPage >= totalPage) {
            pageStr += "<span>下一页</span><span>尾页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' id='sal' rel='" + (parseInt(curPage) + 1) + "'>下一页</a></span><span><a href='javascript:void(0)' id='sal' rel='" + totalPage + "'>尾页</a></span>";
        }

        $("#pagecount").html(pageStr);
    }

    $(function () {
        getData(1);
        $(document).on('click', '#pagecount span #sal', function (event) {
            event.preventDefault();
            var rel = $(this).attr("rel");
            if (rel) {
                getData(rel);
            }
        });
    });
}));


///////////////////////////////////////////////////////新品上架/////////////////////////////////////
$(document).ready($("#addproduct").click(function addProduct() {
//获取数据

    //alert(page);
    $("#list #product_table").empty();
    $("#pagecount").empty();
    var addform = "";
    //var tr = "";
    //array = eval("(" + json + ")");
    //var $this = $("#list #product_table");
    addform = "<div style=\"width:60%;margin:100px;\">"
//            + "<form class=\"layui-form\" action=\"\" method=\"post\">"
            + "<div class=\"layui-form\">"
            + "<div class=\"layui-form-item\">"
            + "<label class=\"layui-form-label\">产品类目</label>"
            + "<div class=\"layui-input-block\">"
            + "<select name=\"category_id\"id=\"category_id\" lay-verify=\"required\">"
            + "<option value=\"1\">小说</option>"
            + "<option value=\"2\">人文社科</option>"
            + "<option value=\"3\">文艺</option>"
            + "<option value=\"4\">教育</option>"
            + "<option value=\"5\">经管</option>"
            + "<option value=\"6\">儿童读物</option>"
            + "<option value=\"7\">科技</option>"
            + "</select>"
            + "</div>"
            + "</div>"
            + "<div class=\"layui-form-item\">"
            + "<label class=\"layui-form-label\">产品名</label>"
            + "<div class=\"layui-input-block\">"
            + "<input type=\"text\" name=\"product_name\" id=\"product_name\" required lay-verify=\"required\" placeholder=\"请输入产品名\" autocomplete=\"off\" class=\"layui-input\">"
            + "</div>"
            + "</div>"
            + "<div class=\"layui-form-item\">"
            + "<label class=\"layui-form-label\">产品图片</label>"
            + "<div class=\"layui-input-block\">"
            + "<div class=\"layui-upload\">"
            + "<button type=\"button\" class=\"layui-btn layui-btn-normal\" onclick=\"document.getElementById('upload').click()\">选择文件</button>"
            + "<input type=\"file\" id=\"upload\" style=\"display:none;\" name=\"file\"/>"
            + "<button type=\"button\" class=\"layui-btn\" id=\"uploadfile\">开始上传</button>"
            + "</div>"
            + "</div>"
            + "</div>"
            + "<div class=\"layui-form-item\">"
            + "<label class=\"layui-form-label\">单价</label>"
            + "<div class=\"layui-input-block\">"
            + "<input type=\"text\" name=\"price\" id=\"price\" required lay-verify=\"required\" onkeyup=\"this.value=this.value.replace(/[^0-9.]/g,'')\"placeholder=\"请输入产品单价\" autocomplete=\"off\" class=\"layui-input\">"
            + "</div>"
            + "</div>"
            + "<div class=\"layui-form-item\">"
            + "<label class=\"layui-form-label\">库存</label>"
            + "<div class=\"layui-input-block\">"
            + "<input type=\"text\" name=\"qty\"id=\"qty\" required lay-verify=\"required\" onkeyup=\"this.value=this.value.replace(/[^0-9]/g,'')\" placeholder=\"请输入产品库存\" autocomplete=\"off\" class=\"layui-input\">"
            + "</div>"
            + "</div>"

            + "<div class=\"layui-form-item layui-form-text\">"
            + "<label class=\"layui-form-label\">详情描述</label>"
            + "<div class=\"layui-input-block\">"
            + "<textarea name=\"desc\" id=\"desc\" placeholder=\"请输入内容\" class=\"layui-textarea\"></textarea>"
            + "</div>"
            + "</div>"
            + "<div class=\"layui-form-item\">"
            + "<div class=\"layui-input-block\">"
            + "<button class=\"layui-btn\"  id=\"addpro\">立即提交</button>"
            + "<button type=\"reset\" class=\"layui-btn layui-btn-primary\">重置</button>"
            + "</div>"
            + "</div>"
            + "</div>"
//            + "</form>"
            + "</div>";
//                var $this = $("#list #product_table");
//                console.log($this);
//加载表单   

    $("#list #product_table").html(addform);
    layui.use('form', function () {
        var form = layui.form;
        form.render('select');
    });

//                $("#list tbody").append(tr);
}));
//  form.on('submit(addpro)', function(data){
//      var product_name = $("#product_name").val();
//      alert(product_name);
//      console.log(product_name);
//    //layer.msg(JSON.stringify(data.field));
//    $.ajax({
//        type:'post',
//        datatype:'JSON',
//        data:'data',
//        url:'editpro',
//        success(){
//            //form.render();
//           console.log("test");
//        }
//    });
//    return false;
//  });
// 


$(function () {
    ///////////////////////////上传图片///////////////////////
    $(document).on("click", "#uploadfile", function () {
        //alert("kosfdn");
        var formData = new FormData();
        var name = $("input").val();
        formData.append("file", $("#upload")[0].files[0]);
        formData.append("name", name);
        $.ajax({
            url: 'fileUpload.php',
            type: 'POST',
            data: formData,
            // 告诉jQuery不要去处理发送的数据
            processData: false,
            // 告诉jQuery不要去设置Content-Type请求头
            contentType: false,
            beforeSend: function () {
                console.log("正在上传，请稍候");
            },
            success: function (array) {
                array = eval("(" + array + ")")
                console.log(array.success);
                if (array.success == "上传成功！") {
                    //console.log("成功" + responseStr);
                    $(".layui-upload").replaceWith("<p name=\"pic_addr\"id=\"pic_addr\" style=\"position:relative;top:10px;\">" + array.uniName + "</p>")
                } else {
                    console.log("失败");
                    alert("只允许上传4M以内的图片，请重新选择图片！");
                }
            },
            error: function (array) {
                alert(array);
                console.log("error");
            }
        });
    });
    /////////////////////////////end///////////////////////////////

    /////////////////////商品上新////////////////////////////
    $(document).on("click", "#addpro", function () {
        //alert("fvinw");
        var category = $("#category_id").val();
        var product_name = $("#product_name").val();
        var pic_addr = $("#pic_addr").text();
        var price = $("#price").val();
        var qty = $("#qty").val();
        var desc = $("#desc").val();
        var data = {category: category, product_name: product_name, pic_addr: pic_addr, price: price, qty: qty, desc: desc};
        //console.log(data);
        if (category !== "" && product_name !== "" && pic_addr !== "" && price !== "" && qty !== "" && desc !== "") {
            //alert($category);
//          var form = new FormData();
//          console.log(form);
            $.ajax({
                type: 'POST',
                url: 'add_product.php',
                data: data,
                // dataType:'json',
                //processData: false,
                //contentType: false,
                success: function (data) {
                    //alert(data);
                    console.log(data);
                    alert(data);
                    $("#list #product_table").empty();
                    $("#pagecount").empty();
                    var addform = "";
                    //var tr = "";
                    //array = eval("(" + json + ")");
                    //var $this = $("#list #product_table");
                    addform = "<div style=\"width:60%;margin:100px;\">"
//            + "<form class=\"layui-form\" action=\"\" method=\"post\">"
                            + "<div class=\"layui-form\">"
                            + "<div class=\"layui-form-item\">"
                            + "<label class=\"layui-form-label\">产品类目</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<select name=\"category_id\"id=\"category_id\" lay-verify=\"required\">"
                            + "<option value=\"1\">小说</option>"
                            + "<option value=\"2\">人文社科</option>"
                            + "<option value=\"3\">文艺</option>"
                            + "<option value=\"4\">教育</option>"
                            + "<option value=\"5\">经管</option>"
                            + "<option value=\"6\">儿童读物</option>"
                            + "<option value=\"7\">科技</option>"
                            + "</select>"
                            + "</div>"
                            + "</div>"
                            + "<div class=\"layui-form-item\">"
                            + "<label class=\"layui-form-label\">产品名</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<input type=\"text\" name=\"product_name\" id=\"product_name\" required lay-verify=\"required\" placeholder=\"请输入产品名\" autocomplete=\"off\" class=\"layui-input\">"
                            + "</div>"
                            + "</div>"
                            + "<div class=\"layui-form-item\">"
                            + "<label class=\"layui-form-label\">产品图片</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<div class=\"layui-upload\">"
                            + "<button type=\"button\" class=\"layui-btn layui-btn-normal\" onclick=\"document.getElementById('upload').click()\">选择文件</button>"
                            + "<input type=\"file\" id=\"upload\" style=\"display:none;\" name=\"file\"/>"
                            + "<button type=\"button\" class=\"layui-btn\" id=\"uploadfile\">开始上传</button>"
                            + "</div>"
                            + "</div>"
                            + "</div>"
                            + "<div class=\"layui-form-item\">"
                            + "<label class=\"layui-form-label\">单价</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<input type=\"text\" name=\"price\" id=\"price\" required lay-verify=\"required\" onkeyup=\"this.value=this.value.replace(/[^0-9.]/g,'')\"placeholder=\"请输入产品单价\" autocomplete=\"off\" class=\"layui-input\">"
                            + "</div>"
                            + "</div>"
                            + "<div class=\"layui-form-item\">"
                            + "<label class=\"layui-form-label\">库存</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<input type=\"text\" name=\"qty\"id=\"qty\" required lay-verify=\"required\" onkeyup=\"this.value=this.value.replace(/[^0-9]/g,'')\" placeholder=\"请输入产品库存\" autocomplete=\"off\" class=\"layui-input\">"
                            + "</div>"
                            + "</div>"

                            + "<div class=\"layui-form-item layui-form-text\">"
                            + "<label class=\"layui-form-label\">详情描述</label>"
                            + "<div class=\"layui-input-block\">"
                            + "<textarea name=\"desc\" id=\"desc\" placeholder=\"请输入内容\" class=\"layui-textarea\"></textarea>"
                            + "</div>"
                            + "</div>"
                            + "<div class=\"layui-form-item\">"
                            + "<div class=\"layui-input-block\">"
                            + "<button class=\"layui-btn\"  id=\"addpro\">立即提交</button>"
                            + "<button type=\"reset\" class=\"layui-btn layui-btn-primary\">重置</button>"
                            + "</div>"
                            + "</div>"
                            + "</div>"
//            + "</form>"
                            + "</div>";
//                var $this = $("#list #product_table");
//                console.log($this);
//加载表单   

                    $("#list #product_table").html(addform);
                    layui.use('form', function () {
                        var form = layui.form;
                        form.render('select');
                    });
                },
                error: function () {
                    alert("提交失败！");
                }
            });
        } else {
            alert("表格数据不能为空！");
            return false;//取消提交
            
        }
    });


});
 
