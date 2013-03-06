<?php
    function utf8_urldecode($str) {
      $str = str_replace("\\00", "%u00", $str);
      $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
      return html_entity_decode($str,null,'UTF-8');
    }

$str = 'Manuel Jo\u00e3o';
//echo utf8_urldecode($str);
echo html_entity_decode(iconv('UTF-8','UTF-16',$str),ENT_QUOTES,'UTF-16');
?>
