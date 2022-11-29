<style>
    html {
        scroll-behavior: smooth;
    }

    .thumbnails {
        overflow: hidden;
        margin: 1em 0;
        padding: 0;
        text-align: center;
    }

    .thumbnails li {
        display: inline-block;
        width: 140px;
        margin: 0 5px;
    }

    .thumbnails img {
        display: block;
        min-width: 100%;
        max-width: 100%;
    }

    .carousel-inner {
        width: 100%;
        max-height: auto;
    }

    .to-top {
        position: fixed;
        bottom: 16px;
        right: 32px;
        color: #49a3f1;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        border-radius: 50%;
        font-size: 32px;
        text-decoration: none;
        opacity: 0;
        pointer-events: none;
        transition: all .4s;
        padding-left: 15px;
    }

    .to-top:hover {
        background-image: linear-gradient(195deg, #49a3f1 0%, #1A73E8 100%);
        color: black;
    }

    .to-top.active {
        bottom: 32px;
        pointer-events: auto;
        opacity: 1;
    }

    .bagianatas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #cc5350;
        color: white;
        z-index: 1000;
        height: 200px;
        overflow: hidden;
        -webkit-transition: height 0.3s;
        -moz-transition: height 0.3s;
        transition: height 0.3s;
        text-align: center;
        line-height: 160px;

    }

    /* Navbar SHIFT Hover */
    div.shift ul li a:hover {
        color: #ffffff;
    }

    div.shift ul li a::after {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 100%;
        height: 1px;
        content: '.';
        color: transparent;
        background-image: linear-gradient(195deg, #49a3f1 0%, #1A73E8 100%);
        visibility: none;
        opacity: 0;
        z-index: -1;
    }

    div.shift ul li a:hover:after {
        opacity: 1;
        visibility: visible;
        height: 100%;
    }

    /* Keyframes */
    @-webkit-keyframes div.shift {
        0% {
            width: 0%;
            height: 1px;
        }

        50% {
            width: 100%;
            height: 1px;
        }

        100% {
            width: 100%;
            height: 100%;
            background: #333;
        }
    }

    @keyframes shift {
        0% {
            width: 0%;
            height: 1px;
        }

        50% {
            width: 100%;
            height: 1px;
        }

        100% {
            width: 100%;
            height: 100%;
            background: #333;
        }
    }

    /* Keyframes */
    @-webkit-keyframes circle {
        0% {
            width: 1px;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            height: 1px;
            z-index: -1;
            background: rgb(255, 255, 255);
            border-radius: 100%;
        }

        100% {
            background: white;
            height: 5000%;
            width: 5000%;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            border-radius: 0;
        }
    }

    .chartbox {
        width: 700px;
        height: 350px;
        padding-left: 20px;
        padding-right: 20px;
        align-items: center;
    }

    .flexbox {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media only screen and (max-width: 1366px) {}

    .warnaterverif {
        color: rgb(54, 162, 235)
    }

    .warnadraft {
        color: rgb(255, 205, 86)
    }

    .warnabelum {
        color: rgb(255, 99, 132)
    }
</style>

{{-- catatan: script animasi --}}
<style>
    .fadeDown {
        opacity: 1;
        animation-name: fadeDownOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeDownOpacity {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    .fadeUp {
        opacity: 1;
        animation-name: fadeUpOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeUpOpacity {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    .fadeLeft {
        opacity: 1;
        animation-name: fadeLeftOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeLeftOpacity {
        0% {
            transform: translateX(-20px);
            opacity: 0;
        }

        100% {
            transform: translateX(0px);
            opacity: 1;
        }
    }

    .fadeRight {
        transform: translateX(20px);
        opacity: 0;
        animation-name: fadeRightOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    .fadeRightOpacity {
        transform: translateX(0px);
        opacity: 1;
    }

    .fadeIn {
        opacity: 1;
        animation-name: fadeInOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 1s;
    }

    @keyframes fadeInOpacity {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }

    .ubh-0 {
        transition: 1s all ease;
    }

    .ubh-1 {
        transition: 1.5s all ease;
    }

    .ubh-2 {
        transition: 2s all ease;
    }

    .ubh-3 {
        transition: 2.5s all ease;
    }

    .ubh-4 {
        transition: 3s all ease;
    }

    .ubh-5 {
        transition: 3.5s all ease;
    }
</style>

{{-- catatan: script css timeline --}}
<style>
    .cd-horizontal-timeline ol,
    .cd-horizontal-timeline ul {
        list-style: none;
    }

    .cd-timeline-navigation a:hover,
    .cd-timeline-navigation a:focus {
        border-color: #313740;

    }

    .cd-horizontal-timeline a,
    .cd-horizontal-timeline a:hover,
    .cd-horizontal-timeline a:focus {
        color: #313740;
    }

    .cd-horizontal-timeline blockquote,
    .cd-horizontal-timeline q {
        quotes: none;
    }

    .cd-horizontal-timeline blockquote:before,
    .cd-horizontal-timeline blockquote:after,
    .cd-horizontal-timeline q:before,
    .cd-horizontal-timeline q:after {
        content: '';
        content: none;
    }

    .cd-horizontal-timeline table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .cd-horizontal-timeline {
        opacity: 0;
        margin: 2em auto;
        -webkit-transition: opacity 0.2s;
        -moz-transition: opacity 0.2s;
        transition: opacity 0.2s;
    }

    .cd-horizontal-timeline::before {
        /* never visible - this is used in jQuery to check the current MQ */
        content: 'mobile';
        display: none;
    }

    .cd-horizontal-timeline.loaded {
        /* show the timeline after events position has been set (using JavaScript) */
        opacity: 1;
    }

    .cd-horizontal-timeline .timeline {
        position: relative;
        height: 100px;
        width: 90%;
        max-width: 800px;
        margin: 0 auto;
    }

    .cd-horizontal-timeline .events-wrapper {
        position: relative;
        height: 100%;
        margin: 0 40px;
        overflow: hidden;
    }

    .cd-horizontal-timeline .events-wrapper::after,
    .cd-horizontal-timeline .events-wrapper::before {
        /* these are used to create a shadow effect at the sides of the timeline */
        content: '';
        position: absolute;
        z-index: 2;
        top: 0;
        height: 100%;
        width: 20px;
    }

    .cd-horizontal-timeline .events-wrapper::before {
        left: 0;

    }

    .cd-horizontal-timeline .events-wrapper::after {
        right: 0;

    }

    .cd-horizontal-timeline .events {
        /* this is the grey line/timeline */
        position: absolute;
        z-index: 1;
        left: 0;
        top: 50px;
        height: 2px;
        /* width will be set using JavaScript */
        background: #dfdfdf;
        -webkit-transition: -webkit-transform 0.4s;
        -moz-transition: -moz-transform 0.4s;
        transition: transform 0.4s;
    }

    .cd-horizontal-timeline .filling-line {
        /* this is used to create the green line filling the timeline */
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: #313740;
        -webkit-transform: scaleX(0);
        -moz-transform: scaleX(0);
        -ms-transform: scaleX(0);
        -o-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transform-origin: left center;
        -moz-transform-origin: left center;
        -ms-transform-origin: left center;
        -o-transform-origin: left center;
        transform-origin: left center;
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
    }

    .cd-horizontal-timeline .events a {
        position: absolute;
        bottom: 0;
        z-index: 2;
        text-align: center;
        font-size: 1rem;
        padding-bottom: 15px;

        /* fix bug on Safari - text flickering while timeline translates */
        -webkit-transform: translateZ(0);
        -moz-transform: translateZ(0);
        -ms-transform: translateZ(0);
        -o-transform: translateZ(0);
        transform: translateZ(0);
    }

    .cd-horizontal-timeline .events a::after {
        /* this is used to create the event spot */
        content: '';
        position: absolute;
        left: 50%;
        right: auto;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        bottom: -5px;
        height: 12px;
        width: 12px;
        border-radius: 50%;
        border: 2px solid #dfdfdf;
        background-color: #f8f8f8;
        -webkit-transition: background-color 0.3s, border-color 0.3s;
        -moz-transition: background-color 0.3s, border-color 0.3s;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .no-touch .cd-horizontal-timeline .events a:hover::after {
        background-color: #313740;
        border-color: #313740;
    }

    .cd-horizontal-timeline .events a.selected {
        pointer-events: none;
    }

    .cd-horizontal-timeline .events a.selected::after {
        background-color: #313740;
        border-color: #313740;
    }

    .cd-horizontal-timeline .events a.older-event::after {
        border-color: #313740;
    }

    @media only screen and (min-width: 1100px) {
        .cd-horizontal-timeline::before {
            /* never visible - this is used in jQuery to check the current MQ */
            content: 'desktop';
        }
    }

    .cd-timeline-navigation a {
        /* these are the left/right arrows to navigate the timeline */
        position: absolute;
        z-index: 1;
        top: 50%;
        bottom: auto;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        height: 34px;
        width: 34px;
        border-radius: 50%;
        border: 2px solid #dfdfdf;
        /* replace text with an icon */
        overflow: hidden;
        color: transparent;
        text-indent: 100%;
        white-space: nowrap;
        -webkit-transition: border-color 0.3s;
        -moz-transition: border-color 0.3s;
        transition: border-color 0.3s;
    }

    .cd-timeline-navigation a::after {
        /* arrow icon */
        content: '';
        position: absolute;
        height: 16px;
        width: 16px;
        left: 50%;
        top: 50%;
        bottom: auto;
        right: auto;
        -webkit-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);
        -ms-transform: translateX(-50%) translateY(-50%);
        -o-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background: url(../img/cd-arrow.svg) no-repeat 0 0;
    }

    .cd-timeline-navigation a.prev {
        left: 0;
        -webkit-transform: translateY(-50%) rotate(180deg);
        -moz-transform: translateY(-50%) rotate(180deg);
        -ms-transform: translateY(-50%) rotate(180deg);
        -o-transform: translateY(-50%) rotate(180deg);
        transform: translateY(-50%) rotate(180deg);
    }

    .cd-timeline-navigation a.next {
        right: 0;
    }

    .no-touch .cd-timeline-navigation a:hover {
        border-color: #7b9d6f;
    }

    .cd-timeline-navigation a.inactive {
        cursor: not-allowed;
    }

    .cd-timeline-navigation a.inactive::after {
        background-position: 0 -16px;
    }

    .no-touch .cd-timeline-navigation a.inactive:hover {
        border-color: #dfdfdf;
    }

    .cd-horizontal-timeline .events-content {
        position: relative;
        width: 100%;
        margin: 2em 0;
        overflow: hidden;
        -webkit-transition: height 0.4s;
        -moz-transition: height 0.4s;
        transition: height 0.4s;
    }

    .cd-horizontal-timeline .events-content li {
        position: absolute;
        z-index: 1;
        width: 100%;
        left: 0;
        top: 0;
        -webkit-transform: translateX(-100%);
        -moz-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
        -o-transform: translateX(-100%);
        transform: translateX(-100%);
        padding: 0 5%;
        opacity: 0;
        -webkit-animation-duration: 0.4s;
        -moz-animation-duration: 0.4s;
        animation-duration: 0.4s;
        -webkit-animation-timing-function: ease-in-out;
        -moz-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
    }

    .cd-horizontal-timeline .events-content li.selected {
        /* visible event content */
        position: relative;
        z-index: 2;
        opacity: 1;
        -webkit-transform: translateX(0);
        -moz-transform: translateX(0);
        -ms-transform: translateX(0);
        -o-transform: translateX(0);
        transform: translateX(0);
    }

    .cd-horizontal-timeline .events-content li.enter-right,
    .cd-horizontal-timeline .events-content li.leave-right {
        -webkit-animation-name: cd-enter-right;
        -moz-animation-name: cd-enter-right;
        animation-name: cd-enter-right;
    }

    .cd-horizontal-timeline .events-content li.enter-left,
    .cd-horizontal-timeline .events-content li.leave-left {
        -webkit-animation-name: cd-enter-left;
        -moz-animation-name: cd-enter-left;
        animation-name: cd-enter-left;
    }

    .cd-horizontal-timeline .events-content li.leave-right,
    .cd-horizontal-timeline .events-content li.leave-left {
        -webkit-animation-direction: reverse;
        -moz-animation-direction: reverse;
        animation-direction: reverse;
    }

    .cd-horizontal-timeline .events-content li>* {
        max-width: 800px;
        margin: 0 auto;
    }

    .cd-horizontal-timeline .events-content h4 {
        font-weight: 700;
        margin-bottom: 0px;
        line-height: 20px;
        margin-bottom: 15px;
    }

    .cd-horizontal-timeline .events-content h4 small {
        font-weight: 400;
        line-height: normal;
        font-size: 15px;
    }

    .cd-horizontal-timeline .events-content em {
        display: block;
        font-style: italic;
        margin: 10px auto;
    }

    .cd-horizontal-timeline .events-content em::before {
        content: '- ';
    }

    .cd-horizontal-timeline .events-content p {
        font-size: 16px;
        margin-top: 15px;

    }

    @media only screen and (min-width: 768px) {

        .cd-horizontal-timeline .events-content em {
            font-size: 1rem;
        }
    }

    @media only screen and (max-width: 767px) {

        .cd-horizontal-timeline.loaded {
            margin: 0;
        }

        .cd-horizontal-timeline .timeline {
            width: 100%;
        }

        .cd-horizontal-timeline ol,
        .cd-horizontal-timeline ul {
            padding: 0;
            margin: 0;
        }

        .cd-horizontal-timeline .events-content h4 {
            font-size: 16px;
        }

        .cd-horizontal-timeline .events-content {
            margin: 0;
        }

    }

    @-webkit-keyframes cd-enter-right {
        0% {
            opacity: 0;
            -webkit-transform: translateX(100%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateX(0%);
        }
    }

    @-moz-keyframes cd-enter-right {
        0% {
            opacity: 0;
            -moz-transform: translateX(100%);
        }

        100% {
            opacity: 1;
            -moz-transform: translateX(0%);
        }
    }

    @keyframes cd-enter-right {
        0% {
            opacity: 0;
            -webkit-transform: translateX(100%);
            -moz-transform: translateX(100%);
            -ms-transform: translateX(100%);
            -o-transform: translateX(100%);
            transform: translateX(100%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateX(0%);
            -moz-transform: translateX(0%);
            -ms-transform: translateX(0%);
            -o-transform: translateX(0%);
            transform: translateX(0%);
        }
    }

    @-webkit-keyframes cd-enter-left {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-100%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateX(0%);
        }
    }

    @-moz-keyframes cd-enter-left {
        0% {
            opacity: 0;
            -moz-transform: translateX(-100%);
        }

        100% {
            opacity: 1;
            -moz-transform: translateX(0%);
        }
    }

    @keyframes cd-enter-left {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-100%);
            -moz-transform: translateX(-100%);
            -ms-transform: translateX(-100%);
            -o-transform: translateX(-100%);
            transform: translateX(-100%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateX(0%);
            -moz-transform: translateX(0%);
            -ms-transform: translateX(0%);
            -o-transform: translateX(0%);
            transform: translateX(0%);
        }
    }

    .timeline:before {
        content: " ";
        display: none;
        bottom: 0;
        left: 0%;
        width: 0px;
        margin-left: -1.5px;
        background-color: #eeeeee;
    }
</style>

{{-- catatan: script carousel MR --}}

{{-- catatan: script carousel PBJ --}}

{{-- catatan: script carousel SIPTL --}}

{{-- catatan: script carousel ZI --}}

{{-- catatan: script carousel pengaduan1 --}}

{{-- catatan: script carousel pengaduan2 --}}

{{-- catatan: script carousel SOP --}}
