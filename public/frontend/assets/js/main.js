        document.addEventListener('DOMContentLoaded', function () {
            const progressBar = document.querySelector('.scroll-progress');
            // Initialize Lenis
            const lenis = new Lenis({
                lerp: 0.4,
                duration: 2,
                smoothWheel: true,
                wheelMultiplier: 0.7,
                autoRaf: true,
            });

            // Listen for the scroll event and log the event data
            lenis.on('scroll', (e) => {
                const scrollTop = window.pageYOffset;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = (scrollTop / docHeight) * 100;

                progressBar.style.width = scrollPercent + '%';
            });


            // Custom Cursor
            const cursor = document.querySelector('.custom-cursor');
            const cursorDot = document.querySelector('.cursor-dot');

            // تأكد إن العناصر موجودة
            if (!cursor || !cursorDot) {
                console.error('Cursor elements not found!');
                return;
            }

            let mouseX = 0;
            let mouseY = 0;
            let cursorX = 0;
            let cursorY = 0;
            let dotX = 0;
            let dotY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            function animateCursor() {
                // الدايرة الكبيرة
                let dx = mouseX - cursorX;
                let dy = mouseY - cursorY;
                cursorX += dx * 0.1;
                cursorY += dy * 0.1;
                cursor.style.left = cursorX + 'px';
                cursor.style.top = cursorY + 'px';

                // النقطة الصغيرة
                let ddx = mouseX - dotX;
                let ddy = mouseY - dotY;
                dotX += ddx * 0.3;
                dotY += ddy * 0.3;
                cursorDot.style.left = dotX + 'px';
                cursorDot.style.top = dotY + 'px';

                requestAnimationFrame(animateCursor);
            }
            animateCursor();

            // Hover effects
            const hoverElements = document.querySelectorAll(
                'a, button, [onclick], input[type="submit"], .clickable');

            hoverElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    cursor.classList.add('hover');
                });

                element.addEventListener('mouseleave', () => {
                    cursor.classList.remove('hover');
                });
            });

            // إخفاء الكيرسر
            document.addEventListener('mouseleave', () => {
                cursor.style.opacity = '0';
                cursorDot.style.opacity = '0';
            });

            document.addEventListener('mouseenter', () => {
                cursor.style.opacity = '1';
                cursorDot.style.opacity = '1';
            });
        });

        const menuToggle = document.getElementById('menuToggle');
        const menuClose = document.getElementById('menuClose');
        const menuOverlay = document.getElementById('menuOverlay');

        menuToggle.addEventListener('click', () => {
            menuOverlay.classList.add('menu-overlay--active');
            document.body.style.overflow = 'hidden'; // Stop background scrolling
        });

        menuClose.addEventListener('click', () => {
            menuOverlay.classList.remove('menu-overlay--active');
            document.body.style.overflow = 'auto'; // Restore scrolling
        });