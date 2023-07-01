<!DOCTYPE html>
<html lang="zh-cn">
  
  <head>
    <meta charset="UTF-8">    <meta name="keywords" content="{yycms_keywords}" />
    <meta name="description" content="{yycms_description}" />
    <title>{yycmsobj_name} - {yycms_title}</title>
    <link rel="stylesheet" href="{yycms_template}/css/style.css" media="all">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	  <meta itemprop="url" property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/vod/view/id/{yycmsobj_id}.html" />
  <meta itemprop="name" property="og:title" content="{yycmsobj_name}{yycms_title}" />
  <meta itemprop="type" property="og:type" content="video" />
  <meta itemprop="image" property="og:image" content="{yycmsobj_pic}" />
  <meta itemprop="releaseDate" property="og:release_date" content="{yycmsobj_time}"/>
  <meta itemprop="description" property="og:description" content="{yycmsobj_name}{yycms_description}" />
  <meta property="og:locale" content="zh-CN"/>
  <meta name="MSSmartTagsPreventParsing" content="True">
  <meta http-equiv="MSThemeCompatible" content="Yes">
    <style>.pd5{padding:5px}.inputsearch{margin:1px;border-radius:5px;border:1px solid rgba(255,255,255,.08);padding:0 10px;height:40px;line-height:40px;background:#151d33;color:#c5cde9;margin-top:30px;text-transform:lowercase}.w100{width:100%}.pre{position:relative}.pou{position:absolute;bottom:2px;width:80px;height:40px;line-height:40px;text-align:center;border-radius:0 4px 4px 0;background:#212c4b;color:#fff;right:0;border:none}</style>
    
  </head>
  
  <body>
    
    
    
    {include file="head.php"}
    
    <div class="wrap">
      <div class="main">
	  <div style="max-width:1240px; text-align:center; margin: auto; margin-top:-10px;">
        {yycms_banner_a}
        </div>
        <h1>{yycmsobj_name}</h1>
        <div class="content clearfix">
          <div class="player">
            <div class="player-wrap">
              <div class="player-box">
                {yycmsobj_content}
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrap">

      <div>
        <div class="ptop">
          <h2>{yycmsobj_name}-在线播放</h2>
        </div>
        
      </div>
    </div>
    <div class="wrap">
      <div class="mod index-list">
        <div class="title">
          <h3>猜你喜欢</h3>
        </div>
        <div class="row col5 clearfix">
          
            
			{yycms_video_list:10}
			<dl>
			<dt>
			  <a href="{yycms_list_view}" title="{yycms_list_name}">
                <img class="img" src="{yycms_list_picst_pic}" alt="{yycms_list_name}"/><i>{yycms_list_time}</i>
			  </a>
			</dt>
            <dd>
              <a href="{yycms_list_view}" title="{yycms_list_name}">
                <h3>{yycms_list_name}</h3>
              </a>
            </dd>
          </dl>
		  {/yycms_video_list}  
        </div>
      </div>
    </div>
    
    {include file="foot.php"}
    
    
  </body>

</html>