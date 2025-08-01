<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/mainhead.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("$g4[path]/lib/latest.lib.php");

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.
?>

<!-- Skip Navigation -->
<a href="#main-content" class="skip-nav">본문 바로가기</a>

<!-- Modern Header Container -->
<div class="site-wrapper">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <span class="welcome-text">신당동성당 소화에 오신 것을 환영합니다</span>
            </div>
            <div class="top-bar-right">
                <nav class="top-menu" aria-label="사용자 메뉴">
                    <a href="<?=$g4['path']?>/index.php"><i class="fas fa-home"></i> HOME</a>
                    <? if (!$member['mb_id']) { ?>
                    <a href="<?=$g4['bbs_path']?>/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a>
                    <a href="<?=$g4['bbs_path']?>/register.php"><i class="fas fa-user-plus"></i> 회원가입</a>
                    <? } else { ?>
                    <a href="<?=$g4['bbs_path']?>/logout.php"><i class="fas fa-sign-out-alt"></i> 로그아웃</a>
                    <a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php"><i class="fas fa-user-cog"></i> 정보수정</a>
                    <? } ?>
                    <a href="<?=$g4['path']?>/include/sitemap/site_map.php"><i class="fas fa-sitemap"></i> 사이트맵</a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <a href="<?=$g4['path']?>/">
                        <img src="<?=$g4['path']?>/images/m_02.jpg" alt="신당동성당 소화" class="logo-img">
                        <div class="logo-text">
                            <h1>신당동성당</h1>
                            <span class="subtitle">천주교 서울대교구 소화성당</span>
                        </div>
                    </a>
                </div>

                <!-- Search Box -->
                <div class="search-box">
                    <form name="fsearchbox" method="get" onsubmit="return fsearchbox_submit(this);">
                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                        <input type="hidden" name="sop" value="and">
                        <div class="search-wrapper">
                            <input type="text" name="stx" placeholder="검색어를 입력하세요" class="search-input" maxlength="20" required>
                            <button type="submit" class="search-btn" aria-label="검색">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" onclick="toggleMobileMenu()" aria-label="메뉴 열기">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Navigation -->
    <nav class="main-nav" role="navigation" aria-label="주요 메뉴">
        <div class="container">
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m1" class="nav-link">
                        <i class="fas fa-church"></i> 본당안내
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m11">사목지침</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m12">본당연혁</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m13">성직/수도직</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m14">미사안내</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m15">본당주보</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m18">오시는길</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m3" class="nav-link">
                        <i class="fas fa-users"></i> 단체&복지시설
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m21">사목협의회</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m22">단체소개</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m23">청년단체</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m24">청소년단체</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m26">근화유치원</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m27">소화묘원</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m4" class="nav-link">
                        <i class="fas fa-folder-open"></i> 자료실
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m31">본당행사사진</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m32">영상자료</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m33">보고서및 문서양식</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m5" class="nav-link">
                        <i class="fas fa-bullhorn"></i> 본당게시판
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m41">공지사항&본당소식</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m42">자유게시판</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m43">예비자입교</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m16">본당일정</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m6" class="nav-link">
                        <i class="fas fa-comments"></i> 가톨릭마당
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m51">성경과말씀나눔</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m52">성가/생활성가</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m53">가톨릭교리&교회문헌등</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m55">기도하는방</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main id="main-content" class="main-content">
        <div class="container">

<script>
function fsearchbox_submit(f) {
    if (f.stx.value.trim() == '') {
        alert("검색어를 입력하세요.");
        f.stx.select();
        f.stx.focus();
        return false;
    }
    f.action = "<?=$g4['bbs_path']?>/search.php";
    return true;
}

function toggleMobileMenu() {
    const navMenu = document.getElementById('navMenu');
    const menuBtn = document.querySelector('.mobile-menu-btn');
    navMenu.classList.toggle('active');
    
    const isOpen = navMenu.classList.contains('active');
    menuBtn.setAttribute('aria-label', isOpen ? '메뉴 닫기' : '메뉴 열기');
    
    const icon = menuBtn.querySelector('i');
    icon.className = isOpen ? 'fas fa-times' : 'fas fa-bars';
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const nav = document.querySelector('.main-nav');
    const menuBtn = document.querySelector('.mobile-menu-btn');
    
    if (!nav.contains(e.target) && !menuBtn.contains(e.target)) {
        document.getElementById('navMenu').classList.remove('active');
        menuBtn.querySelector('i').className = 'fas fa-bars';
    }
});

// Sub-menu hover effect
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.querySelector('.sub-menu')?.classList.add('show');
    });
    
    item.addEventListener('mouseleave', function() {
        this.querySelector('.sub-menu')?.classList.remove('show');
    });
});
</script>