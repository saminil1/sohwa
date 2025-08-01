# 소화 웹사이트 현대적 UI/UX 구현 가이드 v2

## 개선된 디자인 특징

### 1. 현대적 디자인 요소
- **Google Fonts**: Noto Sans KR로 가독성 향상
- **Font Awesome 아이콘**: 직관적인 시각적 요소
- **그라디언트 & 애니메이션**: 동적이고 생동감 있는 UI
- **카드 기반 레이아웃**: 정보 구조화 및 접근성 개선
- **스티키 헤더**: 항상 접근 가능한 네비게이션

### 2. 사용자 경험 개선
- **접근성 강화**: Skip navigation, ARIA 라벨, 키보드 네비게이션
- **반응형 디자인**: 모바일, 태블릿, 데스크톱 완벽 지원
- **검색 기능 개선**: 시각적으로 개선된 검색창
- **빠른 접근 카드**: 자주 사용하는 메뉴 바로가기
- **부드러운 전환 효과**: CSS 애니메이션으로 자연스러운 UX

### 3. 성능 최적화
- **지연 로딩**: Intersection Observer로 카드 애니메이션 최적화
- **CSS 기반 애니메이션**: JavaScript 최소화로 성능 향상
- **최적화된 이미지**: 아이콘 폰트 사용으로 로딩 속도 개선

## 구현 방법

### 1단계: 백업
```bash
# SSH 접속
ssh jesusmark2@sohwa.org

# 백업 디렉토리 생성
mkdir -p ~/backup/$(date +%Y%m%d)

# 원본 파일 백업
cp /home/hosting_users/jesusmark2/www/sohwa/mainhead.php ~/backup/$(date +%Y%m%d)/
cp /home/hosting_users/jesusmark2/www/sohwa/index.php ~/backup/$(date +%Y%m%d)/
cp /home/hosting_users/jesusmark2/www/sohwa/style.css ~/backup/$(date +%Y%m%d)/
```

### 2단계: 헤더 파일 수정 (mainhead.php)

#### A. <head> 섹션에 추가
```php
<!-- mainhead.php의 <head> 섹션에 추가 -->
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- 모바일 뷰포트 설정 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

#### B. 플래시 메뉴 교체
**기존 코드 찾기**:
```php
<td background="m_05.jpg" width="729" height="69">
    <?=latest("mainbn", menu, 1, 24); //플래시메뉴 ?>
</td>
```

**새로운 코드로 교체**:
```php
</td>
</tr>
</table>

<!-- 현대적 헤더로 교체 -->
<header class="header-wrapper">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="header-top-inner">
            <div class="quick-links">
                <a href="<?=$g4['path']?>/"><i class="fas fa-home"></i> HOME</a>
                <a href="<?=$g4['path']?>/bbs/login.php"><i class="fas fa-sign-in-alt"></i> 로그인</a>
                <a href="<?=$g4['path']?>/bbs/register.php"><i class="fas fa-user-plus"></i> 회원가입</a>
            </div>
            <div class="quick-links">
                <a href="#"><i class="fas fa-sitemap"></i> 사이트맵</a>
                <a href="#"><i class="fas fa-envelope"></i> 문의하기</a>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <div class="header-main">
        <a href="<?=$g4['path']?>/" class="logo">
            <i class="fas fa-church"></i>
            <div class="logo-text">
                <h1>신당동성당 소화</h1>
                <p>천주교 서울대교구</p>
            </div>
        </a>
        
        <!-- Search Box -->
        <form class="search-box" action="<?=$g4['path']?>/bbs/search.php" method="get">
            <input type="text" name="stx" placeholder="검색어를 입력하세요" aria-label="검색">
            <button type="submit" aria-label="검색하기">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    
    <!-- Navigation -->
    <nav class="main-nav" role="navigation" aria-label="주요 메뉴">
        <div class="nav-inner">
            <button class="mobile-menu-btn" aria-label="메뉴 열기" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
            
            <ul class="nav-menu" id="navMenu">
                <li>
                    <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m1">
                        <i class="fas fa-church"></i> 본당안내
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m101"><i class="fas fa-cross"></i> 사목지침</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m102"><i class="fas fa-history"></i> 본당연혁</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m103"><i class="fas fa-user-tie"></i> 성직/수도직</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m105"><i class="fas fa-clock"></i> 미사안내</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m107"><i class="fas fa-newspaper"></i> 본당주보</a></li>
                        <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m109"><i class="fas fa-map-marked-alt"></i> 오시는길</a></li>
                    </ul>
                </li>
                <!-- 나머지 메뉴 항목들... -->
            </ul>
        </div>
    </nav>
</header>

<!-- 기존 테이블 구조 시작을 숨김 -->
<div style="display:none;">
```

### 3단계: CSS 추가 (style_modern.css 생성)

새로운 CSS 파일 생성:
```bash
# style_modern.css 파일 생성
vi /home/hosting_users/jesusmark2/www/sohwa/style_modern.css
```

그리고 emergency_flash_replacement_v2.html의 <style> 섹션 내용을 복사하여 붙여넣기

### 4단계: mainhead.php에 새 CSS 링크 추가
```php
<!-- 기존 style.css 아래에 추가 -->
<link rel="stylesheet" type="text/css" href="<?=$g4['path']?>/style_modern.css">
```

### 5단계: 메인 페이지 배너 교체 (index.php)

**기존 플래시 배너 찾기**:
```php
<td background="m_06.jpg" width="520" height="601">
    <?=latest("mainbn", mainbanner, 1, 24); //플래시 이미지 ?>
</td>
```

**새로운 코드로 교체**:
```php
</td>
</tr>
</table>

<!-- Main Content -->
<main id="main-content">
    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="hero-content">
            <h2>주님의 사랑과 평화가 함께하시길</h2>
            <p>신당동성당 소화에 오신 것을 환영합니다</p>
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
                <p>성당의 중요한 소식과 공지사항을 확인하세요</p>
            </div>
            
            <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m105'">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>미사안내</h4>
                <p>주일미사, 평일미사 시간을 확인하세요</p>
            </div>
            
            <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m107'">
                <div class="card-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h4>주보</h4>
                <p>이번 주 본당 주보를 확인하세요</p>
            </div>
            
            <div class="card" onclick="location.href='<?=$g4['path']?>/bbs/board.php?bo_table=m109'">
                <div class="card-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h4>오시는길</h4>
                <p>성당 위치와 교통편을 안내합니다</p>
            </div>
        </div>
    </section>
</main>

<div style="display:none;">
```

### 6단계: JavaScript 추가

maintail.php 파일의 </body> 태그 바로 위에 추가:
```php
<!-- JavaScript 추가 -->
<script>
// Mobile menu toggle
function toggleMobileMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
    
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const isOpen = navMenu.classList.contains('active');
    menuBtn.setAttribute('aria-label', isOpen ? '메뉴 닫기' : '메뉴 열기');
    
    const icon = menuBtn.querySelector('i');
    icon.className = isOpen ? 'fas fa-times' : 'fas fa-bars';
}

// Smooth scroll
document.addEventListener('DOMContentLoaded', function() {
    // Skip navigation
    const skipNav = document.querySelector('.skip-nav');
    if (skipNav) {
        skipNav.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
                target.setAttribute('tabindex', '-1');
                target.focus();
            }
        });
    }
    
    // Card animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out';
                entry.target.style.animationFillMode = 'both';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
});
</script>
```

## 주의사항

### 1. 단계별 적용
1. 먼저 개발/테스트 환경에서 테스트
2. 백업 후 실제 서버에 적용
3. 각 단계별로 확인하며 진행

### 2. 호환성 체크
- Internet Explorer 11 이상
- Chrome, Firefox, Safari 최신 버전
- 모바일 브라우저 지원

### 3. 성능 모니터링
- 페이지 로딩 속도 체크
- 모바일 성능 확인
- 서버 부하 모니터링

### 4. 추가 개선사항
- 이미지 최적화 (WebP 포맷 고려)
- CSS/JS 파일 압축
- 캐싱 정책 설정

## 롤백 방법

문제 발생 시:
```bash
# 백업 파일로 복원
cp ~/backup/$(date +%Y%m%d)/mainhead.php /home/hosting_users/jesusmark2/www/sohwa/
cp ~/backup/$(date +%Y%m%d)/index.php /home/hosting_users/jesusmark2/www/sohwa/
cp ~/backup/$(date +%Y%m%d)/style.css /home/hosting_users/jesusmark2/www/sohwa/

# 새로 생성한 파일 제거
rm /home/hosting_users/jesusmark2/www/sohwa/style_modern.css
```

## 다음 단계 권장사항

1. **콘텐츠 관리**
   - 최신 공지사항 업데이트
   - 주보 정기 업로드 시스템 구축
   - 사진/동영상 자료 정리

2. **기능 추가**
   - 온라인 교적 조회
   - 미사 신청 시스템
   - 헌금 내역 조회

3. **장기 계획**
   - 그누보드5 마이그레이션
   - PWA(Progressive Web App) 전환
   - 실시간 미사 스트리밍