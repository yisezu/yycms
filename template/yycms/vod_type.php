<!DOCTYPE html>
<html lang="zh-cn">
  
  <head>
    <meta charset="UTF-8">    <meta name="keywords" content="{yycms_keywords}" />
    <meta name="description" content="{yycms_description}" />
    <title>{yycms_type_name} - {yycms_title}</title>
    <link rel="stylesheet" href="{yycms_template}/css/style.css" media="all">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta name="author" content="{yycms_title}">
    <meta property="og:title" content="{yycms_type_name} - {yycms_title}"/>
    <meta property="og:url" content="//<?php echo $_SERVER['HTTP_HOST'] ?>/"/>
    <meta property="og:locale" content="zh-CN"/>
    <meta property="og:description" content="{yycms_description}"/>
    <meta name="MSSmartTagsPreventParsing" content="True">
    <meta http-equiv="MSThemeCompatible" content="Yes">
    <style>.pd5{padding:5px}.inputsearch{margin:1px;border-radius:5px;border:1px solid rgba(255,255,255,.08);padding:0 10px;height:40px;line-height:40px;background:#151d33;color:#c5cde9;margin-top:30px;text-transform:lowercase}.w100{width:100%}.pre{position:relative}.pou{position:absolute;bottom:2px;width:80px;height:40px;line-height:40px;text-align:center;border-radius:0 4px 4px 0;background:#212c4b;color:#fff;right:0;border:none}</style>
  </head>
  
  <body>{include file="head.php"}
    <div class="wrap">
	
      <!--视频-->
      <div class="mod index-list">
        <div class="title">
          <h3>
            {yycms_type_name}
          </h3>
        </div>
        <div class="row col5 clearfix">{yycms_video_list:30}
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
          </dl>{/yycms_video_list}</div>
      </div>
    </div>
    <div class="wrap">
      <div class="pagination">
        <a href="{yycms_page:first}">首页</a>
        <a href="{yycms_page:prev}">上一页</a>
        <a href="javascript:;">共{yycms_page:count}页</a>
        <a href="javascript:;">当前{yycms_page:current}页</a>
        <a href="{yycms_page:next}">下一页</a>
        <a href="{yycms_page:last}">尾页</a>
      </div>
    </div>
    <!--友情-->
    <div class="wrap">
      <div class="mod index-list">
        <div class="title">
          <h3>友情链接</h3>
        </div>
      </div>{yycms_link}</div>
    <!--友情-->
    {include file="foot.php"}
    </body>

</html>