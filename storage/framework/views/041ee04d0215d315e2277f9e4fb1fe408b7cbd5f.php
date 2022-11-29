
<script>
    var swiper = new Swiper(".tutorialheader", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
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
    var swiper = new Swiper(".pbjheader", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<script>
    var swiper = new Swiper(".ziheader", {
        spaceBetween: 30,
        effect: "fade",
        navigation: {
            nextEl: ".zi-button-next",
            prevEl: ".zi-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>

<script>
    var swiper = new Swiper(".pengaduanheader", {
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
    var swiper = new Swiper(".sopheader", {
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

<script>
    const toTop = document.querySelector(".to-top");

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
            toTop.classList.add("active");
        } else {
            toTop.classList.remove("active");
        }
    })

    var timeDisplay = document.getElementById("time");


    function refreshTime() {
        var dateString = new Date().toLocaleString("id", {
            timeZone: "Asia/Jakarta"
        });
        var formattedString = dateString.replace(/\./g, ':');
        timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);

    var today = new Date()
    var hours = today.getHours();

    const options = {
        year: "numeric",
        month: "long",
        day: "numeric"
    };

    const tanggal = today.toLocaleDateString('id-ID', options);

    if (hours >= 16) {
        hours = 16
    } else if (hours >= 12) {
        hours = 12
    } else if (hours >= 8) {
        hours = 8
    }
    // console.log(today)

    // today = formattedString + '?' + hours + ':00:00';

    var tagMR = document.getElementById('status_dataMR')
    var tagPBJ = document.getElementById('status_dataPBJ')
    var tagSIPTL = document.getElementById('status_dataSIPTL')
    var tagZI = document.getElementById('status_dataZI')
    var tagPeng = document.getElementById('status_dataPeng')
    var tagPeng1 = document.getElementById('status_dataPeng1')
    var tagPeng2 = document.getElementById('status_dataPeng2')
    var tagSop = document.getElementById('status_dataSop')

    tagMR.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagPBJ.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagZI.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagPeng.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagPeng1.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagPeng2.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    tagSop.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
</script>


<script>
    var swiper = new Swiper(".berita-home-Swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50
            }
        }
    });
</script>

<script>
    var swiper = new Swiper(".berita-home-Swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });
</script>
<?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/Home/components/script-js.blade.php ENDPATH**/ ?>