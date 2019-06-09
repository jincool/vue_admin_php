<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/3/12
 * Time: 9:31
 */

class BlxwModel extends BaseModel
{
    private static $blxwTable = 'zdblxw a';//总队
    private static $zdBlxwTable = 'blxw a';//支队
    private static $ljdwTable = 'ljdwml a';//总队累积单位
    private static $mdlbTable = 'mdlb_xq';
    private static $zdTable = 'zhidui_config';

    /**
     * @param $spTime //处罚时间
     * @param $dwType //单位类型
     * @param $dwId //支队、大队ID
     * @param $status //操作状态：sdtj、sdsh、sdgs
     * @param $sbJb //公示、上报状态，默认为0
     * @param $lastMonth //公示持续月份
     * @param $pageStart //开始页
     * @param $pageSize //每页数
     * @return arr
     */
    public static function sdSelect($spTime, $dwType, $dwId, $status, $sbJb,$lastMonth, $pageStart, $pageSize)
    {
        return self::SdSelectBlxw($spTime, $dwType, $dwId, $status, $sbJb,$lastMonth, $pageStart, $pageSize);
    }

    /**
     *提交操作
     * @param $data
     * @param $isAgree //是否同意提交、默认为1
     * @return array
     */
    public static function sdSubmit($data, $isAgree)
    {
        return self::submitBlxw($data, $isAgree);
    }

    /**
     * 反馈意见
     * @param $content
     * @param $status
     * @return array
     */
    public static function feedback($content, $status)
    {
        return parent::feedbackBlxw($content, $status);
    }

    /**
     * 不良行为设置公布日期
     * @param $pubDate //公布日期
     * @param $spTime //处罚日期
     * @param $dwId //执法机构id
     * @param $dwType //单位类型
     * @param $lastMonth //持续日期
     * @param $periods //持续日期
     * @return array
     */
    public static function setPublicDate($pubDate, $spTime,$dwId,$dwType,$lastMonth,$periods)
    {
        $blxwTable = self::$blxwTable;
        $sql = "update $blxwTable  set pubdate='$pubDate',sdgs_periods='$periods', duedate=DATE_ADD(pubdate,INTERVAL lastMonth MONTH) WHERE {$dwId} AND {$dwType} AND {$lastMonth} AND SPtime LIKE '$spTime%' AND sdsh=1";
        if (parent::query($sql)) {
            return ['status' => 1];
        } else {
            return ['status' => 0];
        }
    }
    /**
     * 累积单位设置公布期数
     * @param $dwType //单位类型
     * @param $lastMonth //持续日期
     * @param $periods //持续日期
     * @return array
     */
    public static function setLjPublicDate($dwType,$lastMonth,$periods)
    {
        $ljdwTable = self::$ljdwTable;
        $sql = "update $ljdwTable  set sdgs_periods='$periods' WHERE  {$dwType} AND {$lastMonth}  AND sdsh=1";
        if (parent::query($sql)) {
            return ['status' => 1];
        } else {
            return ['status' => 0];
        }
    }

    /**
     * 加载大队列表
     * @return arr
     */
    public static function ddInfo()
    {
        $mdlbTable = self::$mdlbTable;
        $xqId = parent::condition('xqId');
        $qxNum = '1=1';
        if (!empty($xqId)) {
            $qxNum = "qxnum='$xqId'";
        }
        $sql = "select qxname,DaduiAcc from $mdlbTable where {$qxNum} and isdelete=0 ";
        return parent::getAll($sql);

    }

    /**
     * 加载支队列表
     * @return arr
     */
    public static function zdInfo()
    {
        $zdTable = self::$zdTable;
        $sql = "select * from $zdTable";
        return parent::getAll($sql);
    }

    public static function insertBlxw($spTime)
    {
//        $arr = array();
//        foreach ($data as $k => $v) {
//            $arr[] = $k;
//        }
//        $idArr = "(" . implode(',', $arr) . ")";//获取id数组

        $zdBlxwTable = self::$zdBlxwTable;
        $blxwTable = self::$blxwTable;
        $sql = "select xm_bh,ws_bh,Unit_type,cfdx_name,xmms,yzcd,lastMonth,cfay,cfje,cfje_num,ddname,zdname,SPtime,cfdx_num,cfyj,ddid,zdid,status,ddtj,ddtj_update_time,ddtj_person,
                       update_time,cfdx_type,wh,ddsh_content,ddsh,ddsh_update_time,ddsh_person,ddsb,ddsb_update_time,ddsb_person,zdtj,zdtj_update_time,zdtj_person,zdsh,
                       zdsh_update_time,zdsh_person,zdsh_content,zdsb_update_time,zdsb_person from $zdBlxwTable where {$spTime} and zdsb=2";
        $submitData = self::getAll($sql);
        foreach($submitData as $list=>$v){
            $submitData[$list]['zdsb']=1;
        }
        self::conn('sd');//调用省总队数据连接
        $res = self::insert($submitData, 'zdblxw');//插入省总队zdblxw表
        if ($res) {
            return ['status' => 1];
        } else {
            return ['status' => 2];
        }
    }

    /**
     * 数据上报
     * @param $spTime
     * @return array
     */
    public static function shangBao($spTime)
    {
        $rank = self::rank();
        if (!empty($rank)) {
            $sbJb = ['sd' => 'sdgs', 'zd' => 'zdsb', 'dd' => 'ddsb'][$rank];
            $blxwTable = self::$zdBlxwTable;
            if ($rank == 'sd') {
                $blxwTable = self::$blxwTable;
            }

            $res = self::exec($blxwTable, [$sbJb => 1], 'update', $spTime . " and " . $sbJb . "=2");
            if ($res) {
                return ['status' => 1];
            } else {
                return ['status' => 0];
            }
        }

    }

    /**
     * 判断是否已经上报
     * @param $spTime
     * @return arr|bool
     */
    public static function isShangBao($spTime)
    {
        $rank = self::rank();
        if (!empty($rank)) {
            $sbJb = ['sd' => 'sdgs', 'zd' => 'zdsb', 'dd' => 'ddsb'][$rank];
            $blxwTable = self::$zdBlxwTable;
            if ($rank == 'sd') {
                $blxwTable = self::$blxwTable;
            }
            $sql="select $sbJb from $blxwTable where {$spTime}";
            return self::getAll($sql);
        }else{
           return false;
        }

    }

}