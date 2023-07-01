<?php
class Plug_Video_Adplug{
    public function __construct($plug){
        $plug->add('vod_view','before',$this,'smdc');
        $plug->add('vod_view','after',$this,'ad');
    }
    public function ad(){
            $ad_top_json_url='./Plug/Plug_Video_Adplug/Plug_CMSDB/index.json';
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            include_once('./class/class_txttest.php');
            $txt = new  TxtDB($ad_top_json_url);
            $bankinfo = array();
            $order = "asc"; // asc 升序 desc 降序
            $data=$txt::show($order);
            $data = array_filter($data);
            shuffle($data);
            $count=count($data)-1;
            $pre_ads = [];//前置广告集合
            $pause_ads = [];//暂停广告集合
            foreach ($data as $item){
                $ad = explode('|',$item);
                $ad_type=explode("$$",$ad['1'])[0];
                $ad_title=explode("$$",$ad['1'])[1];
                $tmp["ad_path"]=$ad['2'];
                $tmp["ad_url"]=$ad['3'];
                if($ad_type=="1"){
                    array_push($pre_ads,$tmp);
                }else{
                    array_push($pause_ads,$tmp);
                }
            }
            if(sizeof($pre_ads)>0||sizeof($pause_ads)>0){
                ?>
                <script src="/Plug/Plug_Video_Adplug/Plug_js/smadplug.js"></script>
                <script type="text/javascript">
                    if(!!document.getElementById("myVideo")&&typeof myVideo == "object"){
                        console.log("on loading ad");
                        var myParam ={
                            ad:{
                                <?php
                                if(sizeof($pre_ads)>0){
                                    $pre_path = $pre_ads[0]["ad_path"];
                                    $pre_url = $pre_ads[0]["ad_url"];
                                    echo "pre:{url:'{$pre_path}',link:'{$pre_url}'},";
                                }

                                if(sizeof($pause_ads)>0){
                                    $pause_path = $pause_ads[0]["ad_path"];
                                    $pause_url = $pause_ads[0]["ad_url"];
                                    echo "pause:{url:'{$pause_path}',link:'{$pause_url}'}";
                                }
                                ?>

                            }
                        };
                        smadplug(myVideo,myParam);
                    }

                </script>
                <?php
            }
    }
    function smdc(){
        global $tpl;
        //$tpl->assign('cms_title','55555555555555555555');
    }
}
?>