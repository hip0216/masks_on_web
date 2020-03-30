<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>masks_on_web</title>
        <h3>歡迎進入口罩查詢系統</h3>
    </head>
    <body>
        <form action="masks_on_web/show_result" method="get">
            {{ csrf_field() }}
            請輸入地址：<input type="text" name="address">
            <input type="submit" value="查詢">
        </form>
    </body>
</html>
