<?php
// +----------------------------------------------------------------------
// | 此文件主要是帮助函数，有助于我们实现各种功能
// +----------------------------------------------------------------------


/**
 * @功能说明: 判断是否是数字
 * @param  int  $val  判断的数据
 * @return bool
 */
function is_num($val=0){
    return  is_numeric($val);
}

/**
 *@功能说明:判断是否是手机
 * @param string $val 判断的数据
 * @return bool
 */
function is_mobile($val){
    return preg_match('/^[1-9][0-9]{4,12}$/', $val);
}

/**
 * @功能说明:判断是否是固话
 * @param  string  $val 判断的数据
 * @return bool
 */
function is_tel($val){
    return preg_match("/^0\d{2,3}-?\d{7,8}$/",$val);
}

/**
 * @功能说明:判断是否是电话号码 手机/固话
 * @param  string  $val 判断的数据
 * @return bool
 */
function is_phone($val){
    return preg_match("/(^0\d{2,3}-?\d{7,8})|(^0?1[3|4|5|7|8][0-9]\d{8})$/",$val);
}

/**
 * @功能说明:检测变量是否是邮件地址
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_email($val) {
    return preg_match('/^[\w-]+(\.[\w-]+)*\@[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', $val);
}

/**
 * @功能说明:检测变量是否是qq
 * @param   string $val 判断的数据
 * @return  bool
*/
function is_qq($val) {
    return preg_match('/^[1-9][0-9]{4,10}$/', $val);
}

/**
 * @功能说明:检测变量是否是邮编号码
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_zip($val) {
    return preg_match('/^[1-9]\d{5}$/', $val);
}

/**
 * @功能说明:检测变量是否符合用户名的规则 英文开头，允许数字下划线组合
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_username($val) {
    return preg_match('/^[a-zA-Z]+[a-zA-Z0-9_]+$/', $val);
}

/**
 * @功能说明:检测变量是否符密码的规则 英文+数字组合 6-20位
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_password($val){
    return preg_match('/^\w{6,20}$/i',$val);
}

/**
 * @功能说明:检测变量是否全是英文
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_english($val){
    return preg_match('/^[A-Za-z]+$/',$val);
}

/**
 * @功能说明:检测变量是否为汉字
 * @param   string $val 判断的数据
 * @return  bool
 */
function is_chs($val) {
    return preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $val);
}

/**
 * @功能说明:判断是否为网址,以http://开头
 * @param string $str 判断的数据
 * @return bool
 */
function is_url($str){
    return preg_match("/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/", $str);
}

 /**
  * @功能说明:检测变量长度区间
  * @param   string  $val  判断的数据
  * @param   int $min 最小长度
  * @param   int $max 最大长度
  * @return  bool
  */
function strlenth($val,$min,$max) {
    if(strlen($val) >= $min && strlen($val)<= $max) {
            return true;
    }else{
        return false;
    }
}


/**
* AJAX返回数据标准
* @param int $status  状态
* @param string $msg  内容
* @param mixed $data  数据
* @param string $dialog  弹出方式
*/
function ajaxReturn($status = 0, $msg = '成功', $data = '', $dialog = ''){
$return_arr = array();
if (is_array($status)) {
    $return_arr = $status;
} else {
    $return_arr = array(
        'result' => $status,
        'message' => $msg,
        'des' => $data,
        'dialog' => $dialog
    );
}
ob_clean();
echo json_encode($return_arr);
exit;
}



/**
 * ############################# 字符串处理 ################################
 */


//清除空格
function trimHtml($str)
{
    $str = trim($str);
    $str = strip_tags($str,"");
    $str = str_replace("\t","",$str);
    $str = str_replace("\r\n","",$str);
    $str = str_replace("\r","",$str);
    $str = str_replace("\n","",$str);
    $str = str_replace(" ","",$str);
    $str = str_replace("&nbsp;","",$str);
    return trim($str);
}
/**
 * 功能说明：字符串去掉HTML标签
 * @param $str 需要过滤的内容
 * @param string $tags 需要保留的html标签
 * @return mixed|string 过滤后的内容
 */
function FilterHtml($str,$tags='<img><a>'){
    //过滤时默认保留html中的<a><img>标签
    $search = array(
        '@<script[^>]*?>.*?</script>@si',  // 过滤js脚本
        '@<style[^>]*?>.*?</style>@siU',    // 过滤标签样式
        '@<![\s\S]*?--[ \t\n\r]*>@'         // 过滤多行注释，包括CDATA
    );
    $str = preg_replace($search, '', $str); //过滤非法字符 html标签  css样式  js脚本程序
    $str = strip_tags($str,$tags); //脱掉html标签 除保留html标签外
    return $str;
}

//中英文字符串截取
function cur_str($string, $sublen, $start = 0, $code = 'UTF-8')
{
    if($code == 'UTF-8')
    {
        $pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string); if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';
        for($i=0; $i<$strlen; $i++)
        {
            if($i>=$start && $i<($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}



/**
 * ############################# 图片上传 ################################
 */
//$fileInfo = $_FILES['myFile']; 
/*使用示例
header('content-type:text/html;charset=utf-8');  
include_once 'upload.func.php';  
  
$fileInfo = $_FILES['myFile'];  
//$file = uploadFile($fileInfo);  
//$file = uploadFile($fileInfo, 'MyFiles');  
  
$allowExt = array('jpeg', 'jpg', 'png', 'gif', 'html', 'txt');  
$file = uploadFile($fileInfo, 'MyFiles', false, $allowExt);  
print_r($file);  
*/
function uploadImg($fileInfo,$uploadPath = '/public/uploads/',$allowExt=array('jpeg','jpg','png','gif'),$maxSize = 2097152, $flag=true) {  
    //判断错误号  
    if($fileInfo['error'] > 0) {  
        //匹配错误信息  
        switch($fileInfo['error']) {  
            case 1:  
                $mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';  
                break;  
            case 2:  
                $mes = '超过了表单MAX_FILE_SIZE限制的大小';  
                break;  
            case 3:  
                $mes = '文件部分被上传';  
                break;  
            case 4:  
                $mes = '没有选择上传文件';  
                break;  
            case 6:  
                $mes = '没有找到临时目录';  
                break;  
            case 7:  
            case 8:  
                $mes = '系统错误';  
                break;  
        }  
        exit($mes);  
    }  
  
    $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);  
    //$allowExt = array('jpeg', 'jpg', 'png', 'gif');  
    if(!is_array($allowExt)) {  
        exit('系统错误');  
    }  
  
    //检测上传文件的类型  
    if(!in_array($ext, $allowExt)) {  
        exit('非法文件类型');  
    }  
    //$maxSize = 2097152; //2M  
    //检测上传文件大小是否符合规范  
    if($fileInfo['size']>$maxSize) {  
        exit('上传文件过大');  
    }  
    //检测图片是否为真实的图片类型  
    //$flag = true;  
    if($flag) {  
        if(!getimagesize($fileInfo['tmp_name'])) {  
            exit('不是真实图片类型');  
        }  
    }  
  
    //检测文件是否是通过HTTP POST方式上传上来的  
    if(!is_uploaded_file($fileInfo['tmp_name'])) {  
        exit('文件不是通过HTTP POST方式上传的');  
    }  
    //$uploadPath = 'uploads';  
    if(!file_exists($uploadPath)) {  
        mkdir($uploadPath, 0777, true);  
        chmod($uploadPath, 0777);  
    }  
    $uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;  
    $destination = $uploadPath . '/' . $uniName;  
  
    if(!@move_uploaded_file($fileInfo['tmp_name'], $destination)) {  
        exit('文件移动失败');  
    }
    return '/public/uploads/'.$uniName;

}




function uploadVideo($fileInfo,$uploadPath = '/public/uploads/',$allowExt=array('mp4','flv'),$maxSize = 31457280000, $flag=true) {  
    //判断错误号  
    if($fileInfo['error'] > 0) {  
        //匹配错误信息  
        switch($fileInfo['error']) {  
            case 1:  
                $mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';  
                break;  
            case 2:  
                $mes = '超过了表单MAX_FILE_SIZE限制的大小';  
                break;  
            case 3:  
                $mes = '文件部分被上传';  
                break;  
            case 4:  
                $mes = '没有选择上传文件';  
                break;  
            case 6:  
                $mes = '没有找到临时目录';  
                break;  
            case 7:  
            case 8:  
                $mes = '系统错误';  
                break;  
        }  
        exit($mes);  
    }  
  
    $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);  
    //$allowExt = array('jpeg', 'jpg', 'png', 'gif');  
    if(!is_array($allowExt)) {  
        exit('系统错误');  
    }  
  
    //检测上传文件的类型  
    if(!in_array($ext, $allowExt)) {  
        exit('非法文件类型');  
    }  
    //$maxSize = 2097152; //2M  
    //检测上传文件大小是否符合规范  
    if($fileInfo['size']>$maxSize) {  
        exit('上传文件过大');  
    }  
    //检测图片是否为真实的图片类型  
 
  
    //检测文件是否是通过HTTP POST方式上传上来的  
    if(!is_uploaded_file($fileInfo['tmp_name'])) {  
        exit('文件不是通过HTTP POST方式上传的');  
    }  
    //$uploadPath = 'uploads';  
    if(!file_exists($uploadPath)) {  
        mkdir($uploadPath, 0777, true);  
        chmod($uploadPath, 0777);  
    }  
    $uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;  
    $destination = $uploadPath . '/' . $uniName;  
  
    if(!@move_uploaded_file($fileInfo['tmp_name'], $destination)) {  
        exit('文件移动失败');  
    }
    return '/public/uploads/'.$uniName;

}


//获取当前页面的URL地址 
function url_this(){ 
    $url = "http://".$_SERVER ["HTTP_HOST"].$_SERVER["REQUEST_URI"]; 
    $return_url = "<a href='$url'>$url</a>"; 
    return $return_url; 
}

/** 
 * 函数名：count_words 
 * 功能说明：实现页面的转跳功能
 * 参数：$url 转跳的地址  $delay 延迟多少秒转跳
 * 返回：array 
 */
 function redirect($url,$delay=''){ 
    if($delay == ''){ 
        echo "<script>window.location.href='$url'</script>"; 
    }else{ 
        echo "<meta http-equiv='refresh' content='$delay;URL=$url' />"; 
    } 
}


/**
* 图片等比例缩放
* @param resource $im    新建图片资源(imagecreatefromjpeg/imagecreatefrompng/imagecreatefromgif)
* @param int $maxwidth   生成图像宽
* @param int $maxheight  生成图像高
* @param string $name    生成图像名称
* @param string $filetype文件类型(.jpg/.gif/.png)
*/
function resizeImage($im, $maxwidth, $maxheight, $name, $filetype) {
    $pic_width = imagesx($im);
    $pic_height = imagesy($im);
    if(($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
        if($maxwidth && $pic_width>$maxwidth) {
            $widthratio = $maxwidth/$pic_width;
            $resizewidth_tag = true;
    }
    if($maxheight && $pic_height>$maxheight) {
        $heightratio = $maxheight/$pic_height;
        $resizeheight_tag = true;
    }
    if($resizewidth_tag && $resizeheight_tag) {
        if($widthratio<$heightratio)
        $ratio = $widthratio;
        else
        $ratio = $heightratio;
    }
    if($resizewidth_tag && !$resizeheight_tag)
    $ratio = $widthratio;
    if($resizeheight_tag && !$resizewidth_tag)
    $ratio = $heightratio;
    $newwidth = $pic_width * $ratio;
    $newheight = $pic_height * $ratio;
    if(function_exists("imagecopyresampled")) {
    $newim = imagecreatetruecolor($newwidth,$newheight);
    imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
    } else {
    $newim = imagecreate($newwidth,$newheight);
    imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
    }
    $name = $name.$filetype;
    imagejpeg($newim,$name);
    imagedestroy($newim);
    } else {
    $name = $name.$filetype;
    imagejpeg($im,$name);
    }
}



function getFile()

{

    $i = 0;

    foreach ($_FILES as $file) {

        if (is_string($file['name'])) {

            $files['$i'] = $file;

            $i++;

        } elseif (is_array($file['name'])) {

            foreach ($file['name'] as $k => $v) {

                $files[$i]['name'] = $file['name'][$k];

                $files[$i]['type'] = $file['type'][$k];

                $files[$i]['tmp_name'] = $file['tmp_name'][$k];

                $files[$i]['error'] = $file['error'][$k];

                $files[$i]['size'] = $file['size'][$k];

                $i++;

            }

        }

    }

    return $files;

}


//返回提示消息,返回之前的页面
function notice($msg) {
    echo "<script>alert('".$msg."');history.back();</script>";
    exit();
}

//返回提示消息，和具体要返回的地址
function noticeUrl($msg,$url) {
    echo "<script>alert('".$msg."');window.location.href='".$url."'</script>";
    exit();
}


//截取时间，去掉时分秒
function getTime($date) {
   return  date("Y-m-d",strtotime($date));
} 