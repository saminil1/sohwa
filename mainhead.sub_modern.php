<?
// 이 파일은 새로운 스킨을 만들 때 꼭 필요한 파일 입니다.

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$begin_time = get_microtime();

if (!$g4['title'])
    $g4['title'] = $config['cf_title'];

// 쪽지를 받았나?
if ($member['mb_memo_unread'] && $member['mb_open_date'] <= date("Y-m-d", $g4['server_time']) ) {
    $memo_notice = '읽지 않은 쪽지가 있습니다.';
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$lo_location = addslashes($g4['title']);
if (!$lo_location)
    $lo_location = $_SERVER['REQUEST_URI'];
$lo_url = $_SERVER['REQUEST_URI'];
if (strstr($lo_url, "/$g4[admin]/") || $is_admin == 'super') $lo_url = '';

// 현재 접속자 게시판 번호
$lo_bo_table = '';
if (isset($bo_table) && $bo_table) $lo_bo_table = $bo_table;

// 회원, 방문객 구분
$lo_mb_id = '';
if ($member['mb_id'])
    $lo_mb_id = $member['mb_id'];

// 기타 정보
$lo_agent = $_SERVER['HTTP_USER_AGENT'];
$lo_referer = $_SERVER['HTTP_REFERER'];
$lo_ip = $_SERVER['REMOTE_ADDR'];

if ($lo_url && $lo_ip && !preg_match("/admin/", $lo_url)) 
    $tmp_sql = " insert into $g4[login_table] ( lo_ip, mb_id, lo_datetime, lo_location, lo_url, lo_referer, lo_agent, lo_bo_table )
                 values ( '$lo_ip', '$lo_mb_id', '$g4[time_ymdhis]', '$lo_location',  '$lo_url', '$lo_referer', '$lo_agent', '$lo_bo_table' ) ";
    // 기존의 같은 자료를 또 올리거나 기타 오류는 무시한다.
    @sql_query($tmp_sql, FALSE);

// 시간이 지난 접속은 삭제한다
sql_query(" delete from $g4[login_table] where lo_datetime < '".date("Y-m-d H:i:s", $g4['server_time'] - (60 * $config[cf_login_minutes]))."' ");

// 분류 - 영카트 사용하지 않으므로 주석처리
// $sql = " select * from $g4[yc4_category_table] where ca_id = '$ca_id' ";
// $ca = sql_fetch($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
<meta name="format-detection" content="telephone=no">

<?php if ($config['cf_add_meta']) { ?>
<?=$config['cf_add_meta']?>
<?php } ?>

<title><?=$g4['title']?></title>

<!-- SEO Meta Tags -->
<meta name="description" content="천주교 서울대교구 신당동성당 소화. 미사시간, 주보, 교리, 단체활동 안내">
<meta name="keywords" content="신당동성당, 소화성당, 천주교, 서울대교구, 미사시간, 주보">
<meta name="author" content="신당동성당">

<!-- Open Graph Tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?=$g4['title']?>">
<meta property="og:description" content="천주교 서울대교구 신당동성당 소화">
<meta property="og:url" content="http://sohwa.org">
<meta property="og:image" content="<?=$g4['path']?>/images/og_image.jpg">

<!-- Favicon -->
<link rel="icon" href="<?=$g4['path']?>/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?=$g4['path']?>/images/apple-touch-icon.png">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS Files -->
<link rel="stylesheet" href="<?=$g4['path']?>/style_modern_v2.css?v=<?=date('YmdHis')?>">
<link rel="stylesheet" href="<?=$g4['path']?>/style.css?v=<?=date('YmdHis')?>">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>

<!-- Common Scripts -->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g4_path      = "<?=$g4['path']?>";
var g4_bbs_path  = "<?=$g4['bbs_path']?>";
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
<script src="<?=$g4['path']?>/js/common.js"></script>
<script src="<?=$g4['path']?>/js/wrest.js"></script>

<?php if($member['mb_memo_unread']) { ?>
<script>
$(function() {
    // 쪽지 알림
    if("<?=$memo_notice?>" != "") {
        if(confirm("<?=$memo_notice?>\n\n쪽지를 확인하시겠습니까?")) {
            win_memo();
        }
    }
});
</script>
<?php } ?>

</head>
<body>

<!-- Accessibility: Skip to main content -->
<a href="#main-content" class="sr-only skip-nav">본문 바로가기</a>