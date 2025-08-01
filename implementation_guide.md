# 소화 웹사이트 플래시 긴급 대체 구현 가이드

## 구현 방법

### 1. 메인 메뉴 플래시 대체

**파일 위치**: `/home/hosting_users/jesusmark2/www/sohwa/mainhead.php`

**찾을 코드**:
```php
<?=latest("mainbn", menu, 1, 24); //플래시메뉴 ?>
```

**대체할 코드**:
```php
<!-- 플래시 메뉴 대체 -->
<nav class="emergency-nav">
    <ul>
        <li>
            <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m1">본당안내</a>
            <ul class="sub-menu">
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m101">사목지침</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m102">본당연혁</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m103">성직/수도직</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m105">미사안내</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m107">본당주보</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m109">오시는길</a></li>
            </ul>
        </li>
        <li>
            <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m3">단체&복지시설</a>
            <ul class="sub-menu">
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m301">사목협의회</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m302">단체소개</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m303">청년단체</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m305">청소년단체</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m311">근화유치원</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m313">소화묘원</a></li>
            </ul>
        </li>
        <li>
            <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m4">자료실</a>
            <ul class="sub-menu">
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m401">사진자료실</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m402">동영상자료실</a></li>
            </ul>
        </li>
        <li>
            <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m5">본당게시판</a>
            <ul class="sub-menu">
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m501">공지사항</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m502">자유게시판</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m503">건의사항</a></li>
            </ul>
        </li>
        <li>
            <a href="<?=$g4['path']?>/bbs/group.php?gr_id=m6">가톨릭마당</a>
            <ul class="sub-menu">
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m601">교구소식</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m603">매일미사</a></li>
                <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m605">성인성녀</a></li>
            </ul>
        </li>
    </ul>
</nav>
```

### 2. CSS 추가

**파일 위치**: `/home/hosting_users/jesusmark2/www/sohwa/style.css` 또는 `mainhead.php`의 `<head>` 섹션

**추가할 CSS**:
```css
/* 긴급 대체용 메뉴 CSS */
.emergency-nav {
    background: #003FA8;
    padding: 0;
    margin: 0;
    width: 100%;
}

.emergency-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.emergency-nav li {
    position: relative;
}

.emergency-nav a {
    display: block;
    padding: 15px 25px;
    color: white;
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
}

.emergency-nav a:hover {
    background: #0056D6;
}

.emergency-nav .sub-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: #0056D6;
    list-style: none;
    padding: 0;
    margin: 0;
    min-width: 180px;
    display: none;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    z-index: 1000;
}

.emergency-nav li:hover .sub-menu {
    display: block;
}

.emergency-nav .sub-menu a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: normal;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.emergency-nav .sub-menu a:hover {
    background: #003FA8;
}

/* 메인 배너 임시 대체 */
.emergency-banner {
    width: 100%;
    max-width: 520px;
    height: 300px;
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin: 20px auto;
    border: 1px solid #ddd;
}

.emergency-banner-content {
    padding: 20px;
}

.emergency-banner h2 {
    color: #003FA8;
    font-size: 28px;
    margin-bottom: 10px;
}

.emergency-banner p {
    color: #666;
    font-size: 16px;
    line-height: 1.5;
}
```

### 3. 메인 배너 플래시 대체

**파일 위치**: `/home/hosting_users/jesusmark2/www/sohwa/index.php`

**찾을 코드**:
```php
<?=latest("mainbn", mainbanner, 1, 24); //플래시 이미지 ?>
```

**대체할 코드**:
```php
<!-- 플래시 배너 대체 -->
<div class="emergency-banner">
    <div class="emergency-banner-content">
        <h2>신당동성당 소화</h2>
        <p>
            주님의 사랑과 평화가 함께하시길 기도합니다.<br>
            우리 성당 홈페이지를 찾아주셔서 감사합니다.
        </p>
        <p style="margin-top: 20px; font-size: 14px; color: #999;">
            * 웹사이트 개선 작업이 진행 중입니다.
        </p>
    </div>
</div>
```

### 4. 작업 순서

1. **백업 먼저!**
   ```bash
   cp mainhead.php mainhead.php.backup
   cp index.php index.php.backup
   cp style.css style.css.backup
   ```

2. **mainhead.php 수정**
   - 플래시 메뉴 코드를 HTML 메뉴로 교체
   - CSS를 `<head>` 섹션에 추가 또는 style.css에 추가

3. **index.php 수정**
   - 플래시 배너를 임시 HTML 배너로 교체

4. **테스트**
   - 모든 메뉴 링크가 작동하는지 확인
   - 드롭다운 메뉴가 잘 보이는지 확인
   - 모바일에서도 확인

### 5. 주의사항

1. **경로 확인**: `$g4['path']`가 올바른지 확인 (보통 `/sohwa`)
2. **게시판 테이블명**: 실제 게시판 테이블명과 일치하는지 확인
3. **인코딩**: UTF-8 인코딩 유지
4. **캐시**: 브라우저 캐시 때문에 변경사항이 안 보일 수 있음 (Ctrl+F5)

### 6. 추가 개선사항 (선택)

모바일 대응을 위한 JavaScript 추가:
```javascript
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 768) {
        const menuItems = document.querySelectorAll('.emergency-nav > ul > li');
        
        menuItems.forEach(item => {
            const link = item.querySelector('a');
            const subMenu = item.querySelector('.sub-menu');
            
            if (subMenu) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    item.classList.toggle('active');
                });
            }
        });
    }
});
</script>
```

이 가이드를 따라 플래시를 긴급하게 HTML/CSS로 대체하면, 사용자들이 최소한 메뉴를 통해 사이트를 탐색할 수 있게 됩니다.