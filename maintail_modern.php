        </div><!-- .container -->
    </main><!-- .main-content -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- Footer Info -->
                    <div class="footer-widget">
                        <h3 class="widget-title">신당동성당 소화</h3>
                        <p class="footer-desc">
                            천주교 서울대교구 소속 성당으로<br>
                            1962년에 설립되어 지역사회와 함께<br>
                            하느님의 사랑을 전하고 있습니다.
                        </p>
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-widget">
                        <h3 class="widget-title">바로가기</h3>
                        <ul class="footer-links">
                            <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m105">미사시간</a></li>
                            <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m107">주보</a></li>
                            <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m501">공지사항</a></li>
                            <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m502">예비자입교</a></li>
                            <li><a href="<?=$g4['path']?>/bbs/board.php?bo_table=m109">오시는길</a></li>
                        </ul>
                    </div>

                    <!-- Mass Schedule -->
                    <div class="footer-widget">
                        <h3 class="widget-title">미사 시간</h3>
                        <ul class="mass-schedule">
                            <li><strong>주일미사</strong>
                                <ul>
                                    <li>오전 6:00, 9:00, 11:00</li>
                                    <li>오후 5:00 (청년)</li>
                                    <li>오후 7:00</li>
                                </ul>
                            </li>
                            <li><strong>평일미사</strong>
                                <ul>
                                    <li>오전 6:00, 오후 7:00</li>
                                </ul>
                            </li>
                            <li><strong>토요일</strong>
                                <ul>
                                    <li>오전 6:00</li>
                                    <li>오후 6:00 (주일 전야)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="footer-widget">
                        <h3 class="widget-title">연락처</h3>
                        <ul class="contact-info">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>서울특별시 중구 신당동<br>123-45번지</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>02-1234-5678</span>
                            </li>
                            <li>
                                <i class="fas fa-fax"></i>
                                <span>02-1234-5679</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>sohwa@catholic.or.kr</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        © 2024 신당동성당 소화. All rights reserved.
                    </p>
                    <div class="footer-menu">
                        <a href="<?=$g4['path']?>/privacy.php">개인정보처리방침</a>
                        <a href="<?=$g4['path']?>/terms.php">이용약관</a>
                        <a href="<?=$g4['bbs_path']?>/login.php?url=<?=$g4['admin_path']?>">관리자</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" aria-label="맨 위로">
        <i class="fas fa-chevron-up"></i>
    </button>

</div><!-- .site-wrapper -->

<!-- Additional Scripts -->
<script>
// Back to top button visibility
window.addEventListener('scroll', function() {
    const backToTop = document.querySelector('.back-to-top');
    if (window.pageYOffset > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add animation classes when elements come into view
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fadeInUp');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe elements with animation classes
document.querySelectorAll('.card, .footer-widget').forEach(el => {
    observer.observe(el);
});

// Print functionality
function printPage() {
    window.print();
}

// Add class to body when scrolled
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.body.classList.add('scrolled');
    } else {
        document.body.classList.remove('scrolled');
    }
});
</script>

<?
include_once("$g4[path]/tail.sub.php");
?>