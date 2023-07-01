<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
       http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    {yycms_video_list:500}
    <url>
        <loc>http://{yycms_url}{yycms_list_view}</loc>
        <priority>0.5</priority>
        <lastmod>{yycms_list_time}</lastmod>
        <changefreq>daily</changefreq>
    </url>
    {/yycms_video_list}
</urlset>