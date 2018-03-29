/* 
 * 此js主要是通过ajax对商品的操作
 *包含了查看商品，编辑商品，查看已卖出的商品 
 * 
 */
//查看商品
$(document).ready($("#showproduct").click(function () {
    var curPage = 1; //当前页码
    var total, pageSize, totalPage;
//获取数据
    function getData(page) {
        $.ajax({
            type: 'POST',
            url: 'pages.php',
            data: {'pageNum': page - 1},
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
                +"<colgroup>"
                +"<col width=\"150\">"
                +    "<col width=\"200\">"
                +    "<col>"
                +"</colgroup>"
                +"<thead>"
                +    "<tr>"
                +        "<th>产品id</th>"
                +        "<th>产品名</th>"
                +        "<th>产品单价</th>"
                +        "<th>产品描述</th>"
                +        "<th>产品库存</th>"
                +    "</tr>" 
                +"</thead>"
                +"<tbody></tbody>"
                + "</table>";
                $("#list #product_table").append(table);
                $.each(list, function (index, array) { //遍历json数据列
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    tr += "<tr><td>" + array['product_id']+ "</td><td>" 
                            + array['product_name']+"</td><td>" 
                            + array['price'] + "</td><td>" 
                            + array['description']+"</td><td>"
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
//end
//

