<!DOCTYPE html>
<html>

<head>
	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
	<meta charset='utf-8'>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport'>
	<title>
		{yycms_title}
	</title>
	<meta name="keywords" content="{yycms_keywords}" />
	<meta name="description" content="{yycms_description}" />
	<link href="{yycms_template}/font/iconfont.css" rel="stylesheet">
	<link href="{yycms_template}/css/uikit.min.css" rel="stylesheet">
	<link href="{yycms_template}/css/style.css" rel="stylesheet">
	<link href="{yycms_template}/css/common.css" rel="stylesheet">
	<script src="{yycms_template}/js/jquery.js"></script>
	<script src="{yycms_template}/js/uikit.min.js"></script>
</head>

<body>
	{include file="header.php"}
	<div class='page-with-sidebar' id='page-container'>
		<div class='content'>






            {yycms_video_hot}
                <h1 class='page-header'><i class='fa fa-pagelines'></i>
                    {yycms_type_name}
                    <div class='page-header-menu'></div>
                </h1>
                <div class='row' style='position: relative'>
                    {yycms_video_list:8}
                        <a class='col-md-3 item-video-container' href="{yycms_list_view}">
                            <div class='item-video'>
                                <div class="item-cove">
                                    <img src="{yycms_list_picst_pic}">
                                </div>
                                <div class='title'>
                                    {yycms_list_name}
                                </div>
                            </div>
                        </a>
                    {/yycms_video_list}
                </div>
            {/yycms_video_hot}



			

			<h1 class='page-header'><i class='fa fa-pagelines'></i>友情链接<div class='page-header-menu'></div>
			</h1>
			<div class='row' style='position: relative'>
				<ul class="f-links">
					{yycms_link}
				</ul>
			</div>
		</div>

	</div>

	{include file="footer.php"}

</body>

</html>