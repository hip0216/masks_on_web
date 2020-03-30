<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>masks_output</title>
    </head>

    <body>
        <table align="center" border="1" >
　       <tr>
　       <td align="center">醫事機構代碼</td>
　       <td align="center" width="180px">醫事機構名稱</td>
　       <td align="center" width="180px">醫事機構地址</td>
　       <td>醫事機構電話</td>
　       <td align="center" width="180px">成人口罩剩餘數</td>
　       <td align="center" width="180px">兒童口罩剩餘數</td>
　       <td align="center">來源資料時間</td>
　       </tr>
            @foreach ($re as $key => $value)
                <tr>
                    @foreach ($value as $k => $v)
                        <td align="center" width="180px">{{$v}}</td>
                    @endforeach
                </tr>
            @endforeach
    </body>
</html>