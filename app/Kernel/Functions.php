<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\JobInterface;
use Hyperf\ExceptionHandler\Formatter\FormatterInterface;
use Hyperf\Utils\ApplicationContext;

if (!function_exists('di')) {
    /**
     * Finds an entry of the container by its identifier and returns it.
     * @param null|mixed $id
     * @return mixed|\Psr\Container\ContainerInterface
     */
    function di($id = null)
    {
        $container = ApplicationContext::getContainer();
        if ($id) {
            return $container->get($id);
        }

        return $container;
    }
}

if (!function_exists('format_throwable')) {
    /**
     * Format a throwable to string.
     */
    function format_throwable(Throwable $throwable): string
    {
        return di()->get(FormatterInterface::class)->format($throwable);
    }
}

if (!function_exists('queue_push')) {
    /**
     * Push a job to async queue.
     */
    function queue_push(JobInterface $job, int $delay = 0, string $key = 'default'): bool
    {
        $driver = di()->get(DriverFactory::class)->get($key);
        return $driver->push($job, $delay);
    }
}

if (!function_exists('jsonEncode')) {

    function jsonEncode($data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('jsonDecode')) {
    function jsonDecode($data)
    {
        return json_decode($data, true);
    }
}

if (!function_exists('pregReplace')) {
    // 正则减除 多余符号
    function pregReplace($data)
    {
        return preg_replace("/\/|\~|\!|\@|\￥|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/", "", $data);
    }
}

if (!function_exists('isTbUrlOrOther')) {
    function isTbUrlOrOther($data)
    {
        $reg = "#(\₳|\\$|\¢|\₴|\€|\₤|\￥|\＄|\《|\(|\)|\/)([a-zA-Z0-9]{11})(\₳|\\$|\¢|\₴|\€|\₤|\￥|\＄|\《|\(|\)|\/)#is";
        preg_match_all($reg,$data,$dd);
        if(isset($dd['0']) && count($dd['0']) > 0){
            return pregReplace($dd[0][0]);
        } elseif (strpos($data, 'jd.com') !== false) {
            return $data;
        } elseif (strpos($data, 'pinduoduo.com') !== false) {
            return $data;
        } elseif (strpos($data, 'yangkeduo.com') !== false) {
            return $data;
        } elseif (strpos($data, 'suning.com') !== false) {
            return $data;
        } elseif (strpos($data, 'vip.com') !== false) {
            return $data;
        } elseif (strpos($data, 'tb.cn') !== false) {
            return $data;
        } elseif (strpos($data, 'taobao.com') !== false) {
            return $data;
        }
    }
}

if (!function_exists('isUrl')) {
    function isUrl($data)
    {
        if (strpos($data, 'pinduoduo.com') !== false) {
            return $data;
        } elseif (strpos($data, 'yangkeduo.com') !== false) {
            return $data;
        } elseif (strpos($data, 'suning.com') !== false) {
            return $data;
        } elseif (strpos($data, 'vip.com') !== false) {
            return $data;
        } elseif (strpos($data, 'tb.cn') !== false) {
            return $data;
        } elseif (strpos($data, 'taobao.com') !== false) {
            return $data;
        }
    }
}

if (!function_exists('isJdUrl')) {
    function isJdUrl($data)
    {
        if (strpos($data, 'jd.com') !== false) {
            return $data;
        }
    }
}

if (!function_exists('isTklOrOther')) {
    function isTklOrOther($data)
    {
        $reg = "#(\₳|\\$|\¢|\₴|\€|\₤|\￥|\＄|\《|\(|\)|\/)([a-zA-Z0-9]{11})(\₳|\\$|\¢|\₴|\€|\₤|\￥|\＄|\《|\(|\)|\/)#is";
        preg_match_all($reg,$data,$dd);
        if(isset($dd['0']) && count($dd['0']) > 0){
            return pregReplace($dd[0][0]);
        }
    }
}

if (!function_exists('cut')) {
    // 截取字符串 指定字段
    function cut($begin, $end, $str)
    {
        $b = mb_strpos($str, $begin) + mb_strlen($begin);
        $e = mb_strpos($str, $end) - $b;
        return mb_substr($str, $b, $e);
    }
}
if (!function_exists('combineURL')) {
    function combineURL($baseURL, $keysArr)
    {
        $combined = $baseURL . "?";
        $valueArr = array();

        foreach ($keysArr as $key => $val) {
            $valueArr[] = "$key=$val";
        }
        $keyStr = implode("&", $valueArr);
        $combined .= ($keyStr);
        return $combined;
    }
}

if (!function_exists('getImageTemplate')) {
    function getImageTemplate($wxId, $content, $mediaInfos,$description, $title='' )
    {
        if ($mediaInfos != null && count($mediaInfos) > 0) {
            $media = '';
            foreach ($mediaInfos as $item) {
                $media .= '<media><id>13337689008670904387</id><type>'.$item['type'].'</type><title></title><description></description><private>0</private><url type=\"1\">'.$item['url'].'</url><thumb type=\"1\">'.$item['thumbUrl'].'</thumb><size height=\"'.$item['height'].'\" width=\"'.$item['width'].'\" totalSize=\"' . $item['totalLen'] . '\"></size></media>';
            }
        }
        $template = '<TimelineObject><id>1</id><username>' . $wxId . '</username><createTime>'.time().'</createTime><contentDescShowType>0</contentDescShowType><contentDescScene>0</contentDescScene><private>0</private><contentDesc>' . $content . '</contentDesc><contentattr>0</contentattr><sourceUserName></sourceUserName><sourceNickName></sourceNickName><statisticsData></statisticsData><weappInfo><appUserName></appUserName><pagePath></pagePath></weappInfo><canvasInfoXml></canvasInfoXml><ContentObject><contentStyle>1</contentStyle><contentSubStyle>0</contentSubStyle><title>' . $title . '</title><description>' . $description . '</description><contentUrl></contentUrl><mediaList>' . $media . '</mediaList></ContentObject><actionInfo><appMsg><mediaTagName></mediaTagName><messageExt></messageExt><messageAction></messageAction></appMsg></actionInfo><appInfo><id></id></appInfo><location poiClassifyId=\"\" poiName=\"\" poiAddress=\"\" poiClassifyType=\"0\" city=\"\"></location><publicUserName></publicUserName><streamvideo><streamvideourl></streamvideourl><streamvideothumburl></streamvideothumburl><streamvideoweburl></streamvideoweburl></streamvideo></TimelineObject> ';
        return $template;
    }
}

if (!function_exists('strToUtf8')) {
    function strToUtf8($str){
        $encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
        if($encode == 'UTF-8'){
            return $str;
        }else{
            return mb_convert_encoding($str, 'UTF-8', $encode);
        }
    }
}

if (!function_exists('strToByte')) {
    function strToByte($string) {
        $bytes = array();
        for($i = 0; $i < strlen($string); $i++){
            $bytes[] = ord($string[$i]);
        }
        return $bytes;
    }
}

if (!function_exists('byteToStr')) {
    function byteToStr($bytes) {
        $str = '';
        foreach($bytes as $ch) {
            $str .= chr($ch);
        }
        return $str;
    }
}

if (!function_exists('http_request')) {
    function http_request($url, $info = False)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $output = curl_exec($ch);
        if ($info) {
            $info = curl_getinfo($ch);
            // $retURL = $info['url'];
            curl_close($ch);
            return $info;
        } else {
            curl_close($ch);
            return $output;
        }
    }
}