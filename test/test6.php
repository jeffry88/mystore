namespace Home\Controller;
use Think\Controller;
class LogController extends AdminController{
    public function index(){
        if(IS_POST){
            $logs = M('log');
            $total = $logs->count();
            $page = I('post.page',1);
            $start = I('post.start',0);
            $limit = I('post.limit',10);
            $limits = $start.','.$limit;

            $datas=$logs->order('id desc')->limit($limits)->select();
            foreach($datas as $k=>$v){
                $datas[$k]['time'] = date('Y-m-d H:i:s',$v['time']);
            }
            $return =  array(
                'data' => $datas,
                'total' => $total,
                'limit' => $limit,
                'start'=>$start,
                'page'=>$page
            );
            echo json_encode($return,JSON_UNESCAPED_UNICODE);exit();
        }
        $this->display();
    }
}
