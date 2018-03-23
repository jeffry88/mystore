<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>jquery DataTables插件自定义分页ajax实现</title>
 <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">
 <link href="http://cdn.bootcss.com/datatables/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">
 <link href="http://cdn.bootcss.com/datatables/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="row-fluid">
 <h3>JQuery DataTables插件自定义分页Ajax实现</h3>
 <table id="example" class="display table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
 <thead>
 <tr>
	 <th>ID</th>
	 <th>操作人</th>
	 <th>动作</th>
	 <th>操作时间</th>
	 <th>操作ip</th>
	 <th>被操作id或渠道名</th>
 </tr>
 </thead>
 </table>
</div>
<script src="http://cdn.bootcss.com/datatables/1.10.11/js/jquery.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/datatables/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.bootcss.com/datatables/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
<script type="text/javascript">
    $(function () {
        reloadDatatables();
    });

    var reloadDatatables = function(){
        //提示信息
        var lang = {
            "sProcessing": "处理中...",
            "sLengthMenu": "每页 _MENU_ 项",
            "sZeroRecords": "没有匹配结果",
            "sInfo": "当前显示第 _START_ 至 _END_ 项，共 _TOTAL_ 项。",
            "sInfoEmpty": "当前显示第 0 至 0 项，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "sEmptyTable": "表中数据为空",
            "sLoadingRecords": "载入中...",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上页",
                "sNext": "下页",
                "sLast": "末页",
                "sJump": "跳转"
            },
            "oAria": {
                "sSortAscending": ": 以升序排列此列",
                "sSortDescending": ": 以降序排列此列"
            }
        };

        //初始化表格
        var table = $("#example").dataTable({
            language:lang,  //提示信息
            iDisplayLength: 10, //默认每页数量
            autoWidth: false,  //禁用自动调整列宽
            stripeClasses: ["odd", "even"],  //为奇偶行加上样式，兼容不支持CSS伪类的场合
            processing: true,  //隐藏加载提示,自行处理
            serverSide: true,  //启用服务器端分页，即开启后端分页
            searching: false,  //禁用原生搜索
            orderMulti: false,  //启用多列排序
            order: [],  //取消默认排序查询,否则复选框一列会出现小箭头
            renderer: "bootstrap",  //渲染样式：Bootstrap和jquery-ui
            pagingType: "simple_numbers",  //分页样式：simple,simple_numbers,full,full_numbers
            columnDefs: [{
                "targets": 'nosort',  //列的样式名
                "orderable": false    //包含上样式名‘nosort’的禁止排序
            }],
            ajax: function (data, callback, settings) {//主要作用是将服务器端返回的数据显示在table中
                //封装请求参数
                var param = {};
                param.limit = data.length;//页面显示记录条数，在页面显示每页显示多少项的时候
                param.start = data.start;//开始的记录序号
                param.page = (data.start / data.length)+1;//当前页码
                //console.log(param);
                //ajax请求数据
                $.ajax({
                    type: "POST",
                    url: 'test6.php',//请求后端方法，获取数据的url（一般是action）
                    cache: false,  //禁用缓存
                    data: param,  //传入组装的参数，把datatable的一些数据传递给后台
                    dataType: "json",
                    success: function (result) {
                        //console.log(result);
                        //setTimeout仅为测试延迟效果
                        setTimeout(function () {
                            //封装返回数据
                            var returnData = {};
                            returnData.draw = data.draw;//这里直接自行返回了draw计数器,应该由后台返回
                            returnData.recordsTotal = result.total;//返回数据全部记录
                            returnData.recordsFiltered = result.total;//后台不实现过滤功能，每次查询均视作全部结果
                            returnData.data = result.data;//返回的数据列表
                            //console.log(returnData);
                            //调用DataTables提供的callback方法，代表数据已封装完成并传回DataTables进行渲染
                            //此时的数据需确保正确无误，异常判断应在执行此回调前自行处理完毕
                            callback(returnData);
                        }, 200);
                    }
                });
            },
            //列表表头字段
            columns:[
                {"data":"id"},
                {"data":"name"},
                {"data":"controlleraction"},
                {"data":"time"},
                {"data":"ip"},
                {"data":"idd"}
            ]
        }).api();
        //此处需调用api()方法,否则返回的是JQuery对象而不是DataTables的API对象
    }
</script>