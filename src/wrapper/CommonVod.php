<?php
/**
 * Created by PhpStorm.
 * User: ShaoZeMing
 * homepage: http://blog.4d4k.com
 * email: szm19920426@gmail.com
 * Date: 2016/2/21
 * Time: 10:14
 */

namespace shaozeming\api_vod;
require_once dirname(__DIR__)."/QcloudApi/QcloudApi.php";

class CommonVod
{

    protected $_config = [
        'SecretId' => 'AKsGv6********************',   //腾讯云SecretId,
        'SecretKey' => '769y2dznqm*****************',      //腾讯云SecretKey
        'RequestMethod' => 'GET',                               //请求方式
        'DefaultRegion' => 'bj',
    ];  //必要的配置

    public  $cvn;   //接口对象


    /**
     * 构造方法
     *
     * $config array 配置属性同上面属性
     *
     * @author szm19920426@gmail.com
     *
     * @return mixed
     */
    public function __construct(array $config)
    {
        if(!is_array($config)){
            return false;
        }
        $this->_config = array_merge($this->_config, $config);
        $this->cvn= $this->loadVod();

    }




    /**
     * vod点播接口方法
     *
     * @author szm19920426@gmail.com
     *
     * @return mixed
     */
    public function loadVod()
    {
        try {
            $cvm = \QcloudApi::load(\QcloudApi::MODULE_VOD, $this->_config);
        } catch (\Exception $e) {
            throw new \Exception("c=commonVod,a=loadVod,msg=".$e->getMessage());
        }
        return $cvm;
    }



}