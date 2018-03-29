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
                $("#list ul").append("<li id='loading'>loading...</li>");
            },
            success: function (json) {
                //alert(page);
                $("#list ul").empty();
                total = json.total; //总记录数
                pageSize = json.pageSize; //每页显示条数
                curPage = page; //当前页
                totalPage = json.totalPage; //总页数
                var li = "";
                var list = json.list;
                $.each(list, function (index, array) { //遍历json数据列
                    //li += "<li><a href='#'><img src='" + array['pic'] + "'>" + array['title'] + "</a></li>";
                    li += "<li><a href='#'>" + array['product_id'] + array['product_name'] + "</a></li>";
                });
                $("#list ul").append(li);
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
            pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='" + (curPage - 1) + "'>上一页</a></span>";
        }

        //如果是最后页
        if (curPage >= totalPage) {
            pageStr += "<span>下一页</span><span>尾页</span>";
        } else {
            pageStr += "<span><a href='javascript:void(0)' rel='" + (parseInt(curPage) + 1) + "'>下一页</a></span><span><a href='javascript:void(0)' rel='" + totalPage + "'>尾页</a></span>";
        }

        $("#pagecount").html(pageStr);
    }

    $(function () {
        getData(1);
        $(document).on('click', '#pagecount span a', function (event) {
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

