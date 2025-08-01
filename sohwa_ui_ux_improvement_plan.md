# 소화(sohwa.org) 웹사이트 UI/UX 개선안

## 현재 상태 분석

### 1. 주요 문제점
1. **플래시 의존성**
   - 메인 메뉴와 배너가 플래시(SWF)로 구현
   - 2020년 12월 이후 모든 브라우저에서 플래시 지원 중단
   - 사용자가 메뉴를 볼 수 없어 사이트 탐색 불가능

2. **구식 웹 기술**
   - 테이블 기반 레이아웃 (1004px 고정 너비)
   - 이미지 슬라이싱 기법 사용
   - 반응형 디자인 미지원
   - jQuery 미사용, 순수 JavaScript만 사용

3. **접근성 및 사용성 문제**
   - 스크린리더 접근 불가
   - 모바일 기기에서 사용 불편
   - SEO 최적화 불가능
   - 느린 로딩 속도

## 개선안

### 1. 단기 개선안 (1-2주)

#### 1.1 플래시 대체
```html
<!-- 기존 플래시 메뉴 -->
<?=latest("mainbn", menu, 1, 24); //플래시메뉴 ?>

<!-- HTML/CSS 메뉴로 대체 -->
<nav class="main-navigation">
  <ul class="nav-menu">
    <li><a href="/sohwa/bbs/group.php?gr_id=m1">본당안내</a>
      <ul class="sub-menu">
        <li><a href="/sohwa/bbs/board.php?bo_table=m101">사목지침</a></li>
        <li><a href="/sohwa/bbs/board.php?bo_table=m102">본당연혁</a></li>
        <li><a href="/sohwa/bbs/board.php?bo_table=m103">성직/수도직</a></li>
      </ul>
    </li>
    <li><a href="/sohwa/bbs/group.php?gr_id=m3">단체&복지시설</a></li>
    <li><a href="/sohwa/bbs/group.php?gr_id=m4">자료실</a></li>
    <li><a href="/sohwa/bbs/group.php?gr_id=m5">본당게시판</a></li>
    <li><a href="/sohwa/bbs/group.php?gr_id=m6">가톨릭마당</a></li>
  </ul>
</nav>
```

#### 1.2 메인 배너 플래시 대체
```html
<!-- 기존 플래시 배너 -->
<?=latest("mainbn", mainbanner, 1, 24); //플래시 이미지 ?>

<!-- HTML5 이미지 슬라이더로 대체 -->
<div class="main-slider">
  <div class="slider-container">
    <img src="/sohwa/images/slide1.jpg" alt="신당동성당 소화 환영">
    <img src="/sohwa/images/slide2.jpg" alt="미사 안내">
    <img src="/sohwa/images/slide3.jpg" alt="성당 소식">
  </div>
  <div class="slider-controls">
    <button class="prev">이전</button>
    <button class="next">다음</button>
  </div>
</div>
```

#### 1.3 기본 CSS 개선
```css
/* 반응형 기본 설정 */
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Noto Sans KR', -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: 16px;
  line-height: 1.6;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* 메인 네비게이션 */
.main-navigation {
  background: #003FA8;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.nav-menu {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-menu > li {
  position: relative;
}

.nav-menu a {
  display: block;
  padding: 15px 20px;
  color: white;
  text-decoration: none;
  transition: background 0.3s;
}

.nav-menu a:hover {
  background: #0056D6;
}

/* 드롭다운 메뉴 */
.sub-menu {
  position: absolute;
  top: 100%;
  left: 0;
  background: #0056D6;
  list-style: none;
  padding: 0;
  margin: 0;
  min-width: 200px;
  display: none;
}

.nav-menu li:hover .sub-menu {
  display: block;
}

/* 반응형 처리 */
@media (max-width: 768px) {
  .nav-menu {
    flex-direction: column;
  }
  
  .sub-menu {
    position: static;
    display: none;
  }
  
  .nav-menu li.active .sub-menu {
    display: block;
  }
}
```

### 2. 중기 개선안 (1-2개월)

#### 2.1 레이아웃 현대화
- **Flexbox/Grid 기반 레이아웃**으로 테이블 구조 대체
- **반응형 디자인** 완전 구현
- **모바일 우선 접근법** 적용

#### 2.2 성능 최적화
- 이미지 최적화 (WebP 포맷 사용)
- CSS/JS 파일 압축 및 병합
- 캐싱 전략 구현
- 지연 로딩(Lazy Loading) 적용

#### 2.3 사용자 경험 개선
- **검색 기능 강화**: 자동완성, 실시간 검색
- **빠른 메뉴**: 자주 사용하는 기능 바로가기
- **다크 모드** 지원
- **글자 크기 조절** 기능

### 3. 장기 개선안 (3-6개월)

#### 3.1 프레임워크 도입
- **Vue.js** 또는 **React** 도입으로 SPA 구현
- **Bootstrap 5** 또는 **Tailwind CSS** 활용
- **PWA(Progressive Web App)** 구현

#### 3.2 콘텐츠 관리 시스템 업그레이드
- **그누보드5**로 마이그레이션
- **REST API** 구현
- **GraphQL** 도입 검토

#### 3.3 고급 기능 추가
- **온라인 미사 스트리밍**
- **교적 관리 시스템** 통합
- **온라인 헌금** 기능
- **성당 일정 캘린더** 연동

## 구현 우선순위

### 1단계: 긴급 (즉시 시행)
1. 플래시 메뉴를 HTML/CSS 메뉴로 교체
2. 플래시 배너를 정적 이미지로 임시 교체
3. 모바일에서 최소한의 탐색 가능하도록 조치

### 2단계: 필수 (2주 내)
1. 반응형 CSS 기본 구조 적용
2. 이미지 슬라이더 구현
3. 모바일 메뉴 구현

### 3단계: 권장 (1개월 내)
1. 전체 레이아웃 현대화
2. 성능 최적화
3. 접근성 개선

## 예상 효과
1. **접근성 향상**: 모든 기기와 브라우저에서 정상 작동
2. **SEO 개선**: 검색엔진 노출 증가
3. **사용자 만족도**: 빠른 로딩과 직관적인 인터페이스
4. **유지보수성**: 현대적인 기술 스택으로 개발자 확보 용이

## 디자인 시스템

### 색상 팔레트
- **Primary**: #003FA8 (진한 파랑 - 신뢰감, 안정감)
- **Secondary**: #0056D6 (밝은 파랑 - 활력)
- **Accent**: #FFD700 (금색 - 신성함, 특별함)
- **Success**: #28a745 (녹색 - 긍정)
- **Warning**: #ffc107 (주황 - 주의)
- **Danger**: #dc3545 (빨강 - 경고)
- **Light**: #f8f9fa (연한 회색 - 배경)
- **Dark**: #333 (진한 회색 - 텍스트)

### 타이포그래피
- **폰트**: Noto Sans KR (한글), -apple-system (시스템 폰트)
- **크기 체계**:
  - h1: 48px (메인 제목)
  - h2: 36px (섹션 제목)
  - h3: 24px (서브 제목)
  - h4: 20px (카드 제목)
  - body: 16px (본문)
  - small: 14px (부가 정보)

### 그리드 시스템
- **최대 너비**: 1200px
- **컬럼**: 12 column grid
- **간격**: 30px gutter
- **반응형 분기점**:
  - Mobile: < 768px
  - Tablet: 768px - 1024px
  - Desktop: > 1024px

### 컴포넌트 가이드

#### 1. 버튼
```css
.btn {
    padding: 15px 30px;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-primary { background: #003FA8; color: white; }
.btn-secondary { background: transparent; border: 2px solid; }
.btn-success { background: #28a745; color: white; }
```

#### 2. 카드
```css
.card {
    background: white;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: all 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}
```

#### 3. 폼 요소
```css
input, textarea {
    padding: 12px 20px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input:focus, textarea:focus {
    border-color: #003FA8;
    outline: none;
}
```

### 애니메이션 가이드
- **기본 전환**: 0.3s ease
- **호버 효과**: transform, box-shadow 활용
- **페이드인**: opacity + transform 조합
- **로딩**: skeleton screen 사용

### 접근성 체크리스트
- [ ] 모든 이미지에 alt 텍스트
- [ ] 폼 요소에 label 연결
- [ ] 키보드 네비게이션 지원
- [ ] ARIA 라벨 적절히 사용
- [ ] 색상 대비 4.5:1 이상
- [ ] 포커스 표시 명확히
- [ ] 스크린리더 테스트

### 성능 최적화 가이드
1. **이미지 최적화**
   - WebP 포맷 우선 사용
   - 반응형 이미지 (srcset)
   - Lazy loading 적용

2. **CSS/JS 최적화**
   - Critical CSS 인라인화
   - JS 번들 분할
   - 압축 및 최소화

3. **캐싱 전략**
   - 정적 자산 장기 캐싱
   - Service Worker 활용
   - CDN 사용 검토

## 참고 사항
- 기존 콘텐츠와 URL 구조는 최대한 유지
- 단계적 개선으로 서비스 중단 최소화
- 사용자 교육 자료 제공 필요
- 디자인 시스템 일관성 유지 중요