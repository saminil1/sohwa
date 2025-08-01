<?
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$begin_time = get_microtime();

if (!$g4['title'])
    $g4['title'] = $config['cf_title'];

// 쪽지를 받았나?
if ($member['mb_memo_call']) {
    $mb = get_member($member[mb_memo_call], "mb_nick");
    sql_query(" update {$g4[member_table]} set mb_memo_call = '' where mb_id = '$member[mb_id]' ");

    alert($mb[mb_nick]."님으로부터 쪽지가 전달되었습니다.", $_SERVER[REQUEST_URI]);
}


// 현재 접속자
//$lo_location = get_text($g4[title]);
//$lo_location = $g4[title];
// 게시판 제목에 ' 포함되면 오류 발생
$lo_location = addslashes($g4['title']);
if (!$lo_location)
    $lo_location = $_SERVER['REQUEST_URI'];
//$lo_url = $g4[url] . $_SERVER['REQUEST_URI'];
$lo_url = $_SERVER['REQUEST_URI'];
if (strstr($lo_url, "/$g4[admin]/") || $is_admin == "super") $lo_url = "";

// 자바스크립트에서 go(-1) 함수를 쓰면 폼값이 사라질때 해당 폼의 상단에 사용하면
// 캐쉬의 내용을 가져옴. 완전한지는 검증되지 않음
header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0"); // rfc2616 - Section 14.21
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0
?>
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$g4['charset']?>">
<META http-equiv="imagetoolbar" content="no">
<!-- 모바일 뷰포트 메타 태그 추가 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$g4['title']?></title>
<!-- Google Fonts 추가 -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- Font Awesome 추가 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- 기존 스타일시트 -->
<link rel="stylesheet" href="<?=$g4['path']?>/style.css" type="text/css">
<!-- 모던 스타일시트 추가 -->
<link rel="stylesheet" href="<?=$g4['path']?>/style_modern.css" type="text/css">
<script language='JavaScript'>
function bluring(){ 
if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG") document.body.focus(); 
} 
document.onfocusin=bluring; 
</script>
<style type="text/css"> 
<!-- 
body { 
 background-attachment: scroll; 
 background-color: #ffffff; 
 background-image: url(<?=$g4['path']?>/images/bgm.gif); 
 background-repeat: repeat-x; 
 background-position: left top;    
} 
--> 
</style>
</head>
<!--
//******************************************************************************************************
// BOXIBUILD에 대한 라이센스 명시입니다.
// 아래 라이센스에 동의하시는 분만 박씨빌더를 사용할수 있습니다.
// 라이센스는 http://sir.co.kr/gnuboard/g4_license.php를 따릅니다.
// 프로그램 명칭 : 박씨빌더 (BOXIBUILDER)
// 제작일 : 2009-04-20
// 저작자 : 박씨호스팅 http://boxi.kr
// e-mail  : boxi@hanmail.net
// 라이센스 (License)
// 1. 본 프로그램을 사용으로 인한 데이타 손실 및 기타 손해등 어떠한 사고나 문제에 대해서 BOXI.KR은 절대 책임을 지지 않습니다.
// 2. 영리 및 비영리 모든 곳에서 자유롭게 사용이 가능합니다.
// 3. 본 프로그램을 재배포는 불가능합니다.
// 4. 법적인 분쟁이 발생한 경우 저작자의 회사 소재지를 관할하는 관할법원에서 분쟁을 해결합니다.
// 5. 이 라이센스 파일 및 내용은 저작자를 제외한 어느 누구도 추가, 수정, 삭제할 수 없습니다.
// 6. 박씨빌더의  사용으로 인한 손실 및 손해에 대해서 책임이 없으며, 유지 및 보수의 의무가 없습니다.
// 7. 에러 발생시 최대한 빠른시일안에 패치버젼을 출시합니다.
// 8. 기타 의문사항은 BOXI.KR을 이용해 주시기 바랍니다.
//*******************************************************************************************************
-->
<script language="javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var g4_path      = "<?=$g4['path']?>";
var g4_bbs       = "<?=$g4['bbs']?>";
var g4_bbs_img   = "<?=$g4['bbs_img']?>";
var g4_url       = "<?=$g4['url']?>";
var g4_is_member = "<?=$is_member?>";
var g4_is_admin  = "<?=$is_admin?>";
var g4_bo_table  = "<?=isset($bo_table)?$bo_table:'';?>";
var g4_sca       = "<?=isset($sca)?$sca:'';?>";
var g4_charset   = "<?=$g4['charset']?>";
var g4_cookie_domain = "<?=$g4['cookie_domain']?>";
var g4_is_gecko  = navigator.userAgent.toLowerCase().indexOf("gecko") != -1;
var g4_is_ie     = navigator.userAgent.toLowerCase().indexOf("msie") != -1;
<? if ($is_admin) { echo "var g4_admin = '{$g4['admin']}';"; } ?>
</script>
<script type="text/javascript" src="<?=$g4['path']?>/js/common.js"></script>
<body topmargin="0" leftmargin="0" <?=isset($g4['body_script']) ? $g4['body_script'] : "";?>>
<a name="g4_head"></a>
<!--상단 그룹이미지 시작-->
<?
switch($gr_id){
case "":
$grbanner = "subimg0";
break;
case "m1":
$grbanner = "subimg1";
break;
case "m2":
$grbanner = "subimg2";
break;
case "m3":
$grbanner = "subimg3";
break;
case "m4":
$grbanner = "subimg4";
break;
case "m5":
$grbanner = "subimg5";
break;
case "m6":
$grbanner = "subimg6";
break;
case "m7":
$grbanner = "subimg7";
break;
case "m8":
$grbanner = "subimg8";
break;
case "page":
$grbanner = "subimg0";
break;
case "banner":
$grbanner = "subimg0";
break;
}
?>
<!--상단 그룹이미지 끝-->