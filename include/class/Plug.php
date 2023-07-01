<?php
/**
 * Created by YYcms
 * User: Administrator
 * Date: 2019/10/19
 * Time: 17:05
 */
class Plug{
    private $hooks = [];
    function __construct()
    {
        $plug_dir = scandir(YYCMS_PLUG);
        foreach ($plug_dir as $plug){
            $inpath = YYCMS_PLUG.$plug.'/Plug_php/index.php';
            if(file_exists($inpath)){
                require_once $inpath;
                new $plug($this);
            }
        }
    }
    //放钩子
    function add($hook,$mark,$clazz,$method){
        if(!isset($this->hooks[$hook])){
            $this->hooks[$hook] = [];
        }
        if(!isset($this->hooks[$hook][$mark])){
            $this->hooks[$hook][$mark] = [];
        }
        $obj = [
            'clazz' => $clazz,
            'method' => $method
        ];
        array_push($this->hooks[$hook][$mark],$obj);
    }
    //埋点
    function listen($hook,$mark){
        if(isset($this->hooks[$hook])&&isset($this->hooks[$hook][$mark])&&sizeof($this->hooks[$hook][$mark])>0){
            foreach ($this->hooks[$hook][$mark] as $listener){
                $clazz = $listener['clazz'];
                $method = $listener['method'];
                if (method_exists($clazz,$method)){
                    $clazz->$method();
                }
            }
        }
    }
}
