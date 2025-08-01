<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "";
include_once("./_mainhead.php");
?>

<!-- Hero Banner -->
<section class="hero-banner">
    <div class="hero-content">
        <h2>주님의 사랑과 평화가 함께하시길</h2>
        <p>천주교 서울대교구 신당동성당 소화에 오신 것을 환영합니다</p>
        <div class="hero-buttons">
            <a href="<?=$g4['path']?>/bbs/board.php?bo_table=m105" class="btn btn-primary">
                <i class="fas fa-clock"></i> 미사시간 안내
            </a>
            <a href="<?=$g4['path']?>/bbs/board.php?bo_table=m107" class="btn btn-secondary">
                <i class="fas fa-newspaper"></i> 주보 보기
            </a>
        </div>
    </div>
</section>

<!-- Quick Access Cards -->
<section class="quick-access">
    <div class="section-title">
        <h3>빠른 서비스</h3>
        <p>자주 찾는 메뉴를 빠르게 이용하세요</p>
    </div>
    
    <div class="cards-grid">
        <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m501'">
            <div class="card-icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h4>공지사항</h4>
            <p>성당의 중요한 소식과<br>공지사항을 확인하세요</p>
        </div>
        
        <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m502'">
            <div class="card-icon">
                <i class="fas fa-cross"></i>
            </div>
            <h4>예비자 입교</h4>
            <p>천주교 신자가 되기 위한<br>교리 교육 안내</p>
        </div>
        
        <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m504'">
            <div class="card-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h4>행사일정</h4>
            <p>성당의 주요 행사와<br>일정을 확인하세요</p>
        </div>
        
        <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m109'">
            <div class="card-icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <h4>오시는길</h4>
            <p>성당 위치와<br>교통편을 안내합니다</p>
        </div>
    </div>
</section>

<!-- Latest Posts Section -->
<section class="latest-posts">
    <div class="container">
        <div class="posts-grid">
            <!-- 공지사항 -->
            <div class="post-widget">
                <div class="widget-header">
                    <h3><i class="fas fa-bell"></i> 공지사항</h3>
                    <a href="<?=$g4['path']?>/bbs/board.php?bo_table=m501" class="more-link">더보기 <i class="fas fa-plus"></i></a>
                </div>
                <div class="widget-content">
                    <?= latest("modern_list", "m501", 5, 40)?>
                </div>
            </div>

            <!-- 본당소식 -->
            <div class="post-widget">
                <div class="widget-header">
                    <h3><i class="fas fa-newspaper"></i> 본당소식</h3>
                    <a href="<?=$g4['path']?>/bbs/board.php?bo_table=m41" class="more-link">더보기 <i class="fas fa-plus"></i></a>
                </div>
                <div class="widget-content">
                    <?= latest("modern_list", "m41", 5, 40)?>
                </div>
            </div>

            <!-- 자유게시판 -->
            <div class="post-widget">
                <div class="widget-header">
                    <h3><i class="fas fa-comments"></i> 자유게시판</h3>
                    <a href="<?=$g4['path']?>/bbs/board.php?bo_table=free_board" class="more-link">더보기 <i class="fas fa-plus"></i></a>
                </div>
                <div class="widget-content">
                    <?= latest("modern_list", "free_board", 5, 40)?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Photo Gallery Section -->
<section class="photo-gallery">
    <div class="container">
        <div class="section-title">
            <h3>포토 갤러리</h3>
            <p>성당의 아름다운 순간들을 함께 나눕니다</p>
        </div>
        <div class="gallery-wrapper">
            <?=latest("modern_gallery", "gellary_02", 8, 100, 100);?>
        </div>
    </div>
</section>

<!-- Information Banner -->
<section class="info-banner">
    <div class="container">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="info-content">
                    <h4>사무실 안내</h4>
                    <p>전화: 02-1234-5678<br>
                    팩스: 02-1234-5679</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-content">
                    <h4>사무실 운영시간</h4>
                    <p>평일: 09:00 - 18:00<br>
                    주일: 09:00 - 13:00</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-praying-hands"></i>
                </div>
                <div class="info-content">
                    <h4>고해성사</h4>
                    <p>미사 30분 전<br>
                    또는 예약</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="info-content">
                    <h4>혼인성사</h4>
                    <p>6개월 전 예약<br>
                    혼인교리 필수</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Styles for Index Page -->
<style>
/* Latest Posts Section */
.latest-posts {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}

.post-widget {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    overflow: hidden;
}

.widget-header {
    padding: 20px;
    background: linear-gradient(135deg, #003FA8 0%, #0056D6 100%);
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.widget-header h3 {
    margin: 0;
    font-size: 1.125rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.more-link {
    color: #FFD700;
    text-decoration: none;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: transform 0.3s;
}

.more-link:hover {
    transform: translateX(3px);
}

.widget-content {
    padding: 20px;
}

/* Photo Gallery */
.photo-gallery {
    padding: 60px 0;
    background: #fff;
}

.gallery-wrapper {
    margin-top: 30px;
}

/* Information Banner */
.info-banner {
    padding: 60px 0;
    background: linear-gradient(135deg, #003FA8 0%, #0056D6 100%);
    color: #fff;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 20px;
}

.info-icon {
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.info-icon i {
    font-size: 1.5rem;
    color: #FFD700;
}

.info-content h4 {
    margin: 0 0 5px 0;
    font-size: 1.125rem;
    color: #FFD700;
}

.info-content p {
    margin: 0;
    opacity: 0.9;
}

/* Responsive */
@media (max-width: 768px) {
    .posts-grid {
        grid-template-columns: 1fr;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .info-item {
        text-align: center;
        flex-direction: column;
    }
}
</style>

<?
include_once("./_maintail.php");
?>

<!-- 팝업창 -->
<?
include_once("{$g4['path']}/bbs/popup.php");
?>