<?php
include 'post.php';
//缓存json是为了加快解析速度，而且P站的登录界面图也并不是更新很快
//判断json缓存是否存在
if(file_exists("json.temp")){
    //判断是否更新缓存
    if(mt_rand(0,10)==1){
        goto read_json;
    }
    //读取缓存
    $search_data_json_data = file_get_contents("json.temp");
}
else{
    read_json:
    //解析json并缓存
    $fp2 = @fopen("json.temp", "w");
    $search_url="https://www.pixiv.net/";
    $search_data=request_get($search_url);
    //因为PHP对双括号和单括号的转义导致只能两步到位解析HTML
    $reg = '/<input type="hidden" id="init-config" class="json-data" (.*?)>/';
    preg_match($reg,$search_data,$arr);
    $reg = "/value='(.*?)'/";
    preg_match($reg,$arr[1],$arr);
    $search_data_json_data = htmlspecialchars_decode($arr[1]);
    fwrite($fp2, $search_data_json_data);
    fclose($fp2);
}
if($search_data_json_data==NULL)
{
    @header('HTTP/1.1 500 Internal Server Error');
    echo "search_data_json_data请求失败";
    exit();
}
$search_data_json_decode=json_decode($search_data_json_data);
if($search_data_json_decode==NULL)
{
    @header('HTTP/1.1 500 Internal Server Error');
    echo "search_data_json_data解析失败";
    exit();
}
$count_arr = count($search_data_json_decode->{'pixivBackgroundSlideshow.illusts'}->{'landscape'});
$illust_id=$search_data_json_decode->{'pixivBackgroundSlideshow.illusts'}->landscape[mt_rand(0,$count_arr)]->illust_id;
$referer='https://www.pixiv.net/member_illust.php?mode=medium&illust_id='.+strval($illust_id);
$urls=$search_data_json_decode->{'pixivBackgroundSlideshow.illusts'}->landscape[mt_rand(0,$count_arr)]->url->{'1200x1200'};
//解析json
//创建缓存目录
$path="temp/".date('Y');
      if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
    $pathurl = $path."/".basename($urls);
    if(file_exists($pathurl)){
        //判断文件是否存在，并是否随机更新图片缓存
        if(mt_rand(0,10)==1){
            goto img_update;
        }
    }
    else{
        img_update:
        //缓存图片
        //请求P站图片时必须返图片的主页链接，即referer
        $data=request_get($urls,$referer);
        $fp2 = @fopen($pathurl, "w");
        fwrite($fp2, $data); 
        fclose($fp2);
    }
    //302跳转
    header("Location:$pathurl");
//告辞
exit();
