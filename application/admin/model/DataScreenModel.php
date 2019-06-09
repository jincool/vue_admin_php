<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/4/2
 * Time: 13:56
 */

class DataScreenModel extends Model
{
    private static $blxwTable = 'zdblxw a';//总队
    private static $zdBlxwTable = 'blxw a';//支队
    private static $zdConfigTable = 'zhidui_config';//支队配置

    /**
     * 处罚总数
     * @param $dateInfo
     * @return str
     */
    public static function chuFaNum($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $sql = "select count(id) from $blxwTable where {$dateInfo} and sdgs=1 and status=1";
        $data = self::getOne($sql);
        return $data;
    }

    /**
     * 处罚涉及单位
     * @param $dateInfo
     * @return str
     */
    public static function chuFaDx($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $sql = "select count(DISTINCT cfdx_name) from $blxwTable where {$dateInfo} and sdgs=1 and status=1";
        $data = self::getOne($sql);
        return $data;
    }

    /**
     * 处罚总金额
     * @param $dateInfo
     * @return str
     */
    public static function chuFaJe($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $sql = "select sum(cfje_num) from $blxwTable where {$dateInfo} and sdgs=1 and status=1";
        $data = self::getOne($sql);
        return $data;
    }

    /**
     * 审批中、公式中
     * @param $dateInfo
     * @return array
     */
    public static function shenPiNum($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $sPsql = "select count(id) from $blxwTable where {$dateInfo} and sdsh=1 and status=1";//审批数
        $gSsql = "select count(id) from $blxwTable where {$dateInfo} and sdgs=1 and status=1";//公示数
        $sPdata = self::getOne($sPsql);
        $gSdata = self::getOne($gSsql);
        $data = array("sPdata" => $sPdata, 'gSdata' => $gSdata);
        return $data;
    }

    /**
     * 支队处罚数、支队处罚金额排名
     * @param $dateInfo
     * @return array
     */
    public static function zdRanking($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $numsql = "SELECT zdid,zdname, COUNT(id) AS num  FROM $blxwTable WHERE {$dateInfo} AND sdgs=1 AND status=1  GROUP BY zdid ";
        $moneysql = "SELECT zdid,zdname,SUM(cfje_num) AS money FROM $blxwTable WHERE {$dateInfo} AND sdgs=1 AND status=1  GROUP BY zdid ";
        $dataNum = self::getAll($numsql);
        $dataMoney = self::getAll($moneysql);
        return ['num' => $dataNum, 'money' => $dataMoney];
    }

    /**
     * 被处罚单位处罚数、被处罚单位处罚金额排名
     * @param $dateInfo
     * @return array
     */
    public static function dwRanking($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $numsql = "SELECT cfdx_name, COUNT(id) AS num FROM $blxwTable WHERE {$dateInfo} AND sdgs=1 AND status=1 AND cfdx_name!=''  GROUP BY cfdx_name ";
        $moneysql = "SELECT cfdx_name, SUM(cfje_num) AS money FROM $blxwTable WHERE {$dateInfo} AND sdgs=1 AND status=1 AND cfdx_name!=''  GROUP BY cfdx_name ";
        $dataNum = self::getAll($numsql);
        $dataMoney = self::getAll($moneysql);
        return ['num' => $dataNum, 'money' => $dataMoney];
    }

    /**
     * 不良行为统计各个严重程度的数量
     * @param $dateInfo
     * @return arr
     */
    public static function blxwNum($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $numsql = "select 
COUNT(case when yzcd = '一般' then yzcd end  ) as yb,
COUNT(case when yzcd = '较严重' then yzcd end ) as jyz,
COUNT(case when yzcd = '严重' then yzcd end ) as yz
 FROM $blxwTable WHERE {$dateInfo} AND zdsb=1 AND status=1 ";
        $dataNum = self::getAll($numsql);
        return $dataNum[0];
    }

    /**
     * 统计处罚数量趋势
     * @param $dateInfo
     * @return mixed
     */
    public static function numTrend($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $numsql = "select 
COUNT(case when yzcd = '一般' then yzcd end  ) as yb,
COUNT(case when yzcd = '较严重' then yzcd end ) as jyz,
COUNT(case when yzcd = '严重' then yzcd end ) as yz
 FROM $blxwTable WHERE {$dateInfo} AND sdgs=1 AND status=1 ";
        $dataNum = self::getAll($numsql);
        return $dataNum[0];
    }

    /**
     * 各支队，单位执法量统计
     * @param $dateInfo
     * @return arr
     */
    public static function zdChuFaNum($dateInfo)
    {

        $blxwTable = self::$blxwTable;
        $zdConfigTable = self::$zdConfigTable;
        $numsql = "select 
COUNT(case when yzcd = '一般' then yzcd end  ) as yb,
COUNT(case when yzcd = '较严重' then yzcd end ) as jyz,
COUNT(case when yzcd = '严重' then yzcd end ) as yz,
b.zdid
 FROM $blxwTable RIGHT JOIN $zdConfigTable b on a.zdid=b.zdid AND {$dateInfo} AND a.sdgs=1 AND a.status=1 GROUP BY b.zdid ";
        $dataNum = self::getAll($numsql);
        return $dataNum;


    }

    /**
     * 各支队，处罚金额数统计
     * @param $dateInfo
     * @return arr
     */
    public static function zdChuFaJe($dateInfo)
    {

        $blxwTable = self::$blxwTable;
        $zdConfigTable = self::$zdConfigTable;
        $numsql = "select 
sum(case when yzcd = '一般' then round(cfje_num/10000,2) end  ) as yb,
sum(case when yzcd = '较严重' then round(cfje_num/10000,2) end ) as jyz,
sum(case when yzcd = '严重' then round(cfje_num/10000,2) end ) as yz,
b.zdid
 FROM $blxwTable RIGHT JOIN $zdConfigTable b on a.zdid=b.zdid AND {$dateInfo} AND a.sdgs=1 AND a.status=1 GROUP BY b.zdid ";
        $dataNum = self::getAll($numsql);
        return $dataNum;


    }

    /**
     * 地图的不良行为数，及其占比
     * @param $dateInfo
     * @return array
     */
    public static function mapBlxw($dateInfo)
    {
        $blxwTable = self::$blxwTable;
        $zdConfigTable = self::$zdConfigTable;
        $ysnumsql = "select count(a.id) as blxwNum,b.zdid
        FROM $blxwTable RIGHT JOIN $zdConfigTable b on a.zdid=b.zdid AND {$dateInfo}  AND a.zdsb=1 AND a.status=1 GROUP BY b.zdid ";
        $ysDataNum = self::getAll($ysnumsql);
        $numsql = "select count(a.id) as blxwNum,b.zdid
        FROM $blxwTable RIGHT JOIN $zdConfigTable b on a.zdid=b.zdid AND {$dateInfo} AND a.sdgs=1 AND a.status=1 GROUP BY b.zdid ";
        $dataNum = self::getAll($numsql);
        return ['ysDataNum'=>$ysDataNum,'dataNum'=>$dataNum];
    }

    public static function sbNum($dateInfo){
        $blxwTable = self::$blxwTable;
        $sql="select DISTINCT zdid ,zdname FROM $blxwTable WHERE {$dateInfo} AND a.status=1  ";
        $data=self::getAll($sql);
        return $data;
    }

}