<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/mainhead.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("$g4[path]/lib/latest.lib.php");

//print_r2(get_defined_constants());

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.

$table_width = 1004;
?>

<!-- 상단 배경 시작 -->
<table width="1005" height="824" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign=top rowspan="3">
			<img src="<?=$g4['path']?>/images/m_01.jpg" border=0 width="11" height="694" alt=""></td>
		<td valign=top rowspan="2">
			<a href="<?=$g4['path']?>/"><img src="<?=$g4['path']?>/images/m_02.jpg" border=0 width="214" height="93" alt=""></a></td>
		<td valign=top colspan="2" background="<?=$g4['path']?>/images/s_03.jpg" border=0 width="729" height="24">

<!--로그인 및 검색시작-->
		<table width=100% border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align=right>
            <a href="<?=$g4['path']?>/index.php">HOME</a>
            ㅣ
            <? if (!$member['mb_id']) { ?>
<!-- 로그인 이전-->
            <a href="<?=$g4['bbs_path']?>/login.php?url=<?=$urlencode?>">로그인</a>
            ㅣ
            <a href="<?=$g4['bbs_path']?>/register.php">회원가입</a>
            ㅣ
            <? } else { ?>
<!--로그인 이후-->
            <a href="<?=$g4['bbs_path']?>/logout.php">로그아웃</a>
            ㅣ
            <a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php">정보수정</a>
            ㅣ
            <? } ?>

            <a href="<?=$g4['path']?>/include/sitemap/site_map.php">사이트맵</a>
            </td>
            <td width="190" align="right">
<!--검색 시작-->
   <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
     <td>
        <table width="100%" height="20" cellspacing="0" cellpadding="0">
        <form name="fsearchbox" method="get" action="javascript:fsearchbox_submit(document.fsearchbox);">
        <!-- <input type="hidden" name="sfl" value="concat(wr_subject,wr_content)"> -->
        <input type="hidden" name="sfl" value="wr_subject||wr_content">
        <input type="hidden" name="sop" value="and">
        <tr>
            <td width="10"></td>
            <td width="126" valign="middle"><INPUT name="stx" maxlengt=20 style="BORDER : 1px solid; border-color:#CCCCCC; width: 126px; HEIGHT: 20px; BACKGROUND-COLOR: #FFFFFF" maxlength="20"></td>
            <td width="5"></td>
            <td width="44"><input type="image" src="<?=$g4['path']?>/img/search_button.gif" border="0"></td>
            <td width="5"></td>
        </tr>
        </form>
        </table>
        </td>
     </tr>
    </table>

<script language="JavaScript">
function fsearchbox_submit(f)
{
    if (f.stx.value == '')
    {
        alert("검색어를 입력하세요.");
        f.stx.select();
        f.stx.focus();
        return;
    }

    /*
    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
    var cnt = 0;
    for (var i=0; i<f.stx.value.length; i++)
    {
        if (f.stx.value.charAt(i) == ' ')
            cnt++;
    }

    if (cnt > 1)
    {
        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
        f.stx.select();
        f.stx.focus();
        return;
    }
    */

    f.action = "<?=$g4['bbs_path']?>/search.php";
    f.submit();
}
</script>
<!-- 검색 끝 -->
		  </td>
	   </tr>
    </table>
<!--로그인 및 검색끝-->

</td>
		<td valign=top rowspan="2">
			<img src="<?=$g4['path']?>/images/m_04.jpg" border=0 width="51" height="93" alt=""></td>
	</tr>
	<tr>
		<td valign=top colspan="2" background="<?=$g4['path']?>/images/m_05.jpg" border=0 width="729" height="69">
			<!-- 플래시메뉴를 HTML 메뉴로 교체 -->
			<div class="main-menu-container">
				<ul class="main-menu">
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m1">교회 소개</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=greeting">인사말</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=history">교회 연혁</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=vision">비전</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=location">오시는 길</a></li>
						</ul>
					</li>
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m2">예배 안내</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=worship_time">예배 시간</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=worship_guide">예배 안내</a></li>
						</ul>
					</li>
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m3">설교 말씀</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=sermon_video">설교 영상</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=sermon_text">설교 원고</a></li>
						</ul>
					</li>
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m4">교육부서</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=sunday_school">주일학교</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=youth">청소년부</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=young_adult">청년부</a></li>
						</ul>
					</li>
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m5">교회 소식</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=notice">공지사항</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=weekly">주보</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=photo">포토갤러리</a></li>
						</ul>
					</li>
					<li><a href="<?=$g4['path']?>/bbs/group.php?gr_id=m6">커뮤니티</a>
						<ul class="sub-menu">
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=free">자유게시판</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=testimony">간증</a></li>
							<li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=prayer">기도제목</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</td>
	</tr>
	<tr>
		<td valign=top colspan="2" background="<?=$g4['path']?>/images/m_06.jpg" border=0 width="520" height="601">
			<?=latest("mainbn", mainbanner, 1, 24); //플래시 이미지 ?>
			</td>
		<td valign=top background="<?=$g4['path']?>/images/m_07.jpg" border=0 width="423" height="601">