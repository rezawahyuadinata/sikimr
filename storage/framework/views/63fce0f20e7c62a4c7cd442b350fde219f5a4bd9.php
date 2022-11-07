
<script>
    var swiper = new Swiper(".tutorialSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
        },
    });
</script>


<script>
    var swiper = new Swiper(".pengadaanSwiper", {
        spaceBetween: 30,
        centeredSlides: false,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>


<script>
    var swiper = new Swiper(".pengaduanSwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>


<script>
    $(function() {
        $('.showSingle').click(function() {
            $('.targetDiv').not('#div' + $(this).attr('target')).hide();
            $('#div' + $(this).attr('target')).show();
        });
    });
</script>

<script>
    AOS.init();
</script>

<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/62c7da5c7b967b1179989c58/1g7eapuga';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<?php /**PATH D:\Codes\Programs\sikimr\projek-sikimr\resources\views/Home/components/home/script-js.blade.php ENDPATH**/ ?>