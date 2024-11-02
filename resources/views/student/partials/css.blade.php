<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
<link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
    rel="stylesheet">

<!-- Alpine Js -->
<script src="//unpkg.com/alpinejs" defer></script>
<style>
    .pl {
        width: 6em;
        height: 6em;
    }

    .pl__ring {
        animation: ringA 2s linear infinite;
    }

    .pl__ring--a {
        stroke: #f42f25;
    }

    .pl__ring--b {
        animation-name: ringB;
        stroke: #f49725;
    }

    .pl__ring--c {
        animation-name: ringC;
        stroke: #255ff4;
    }

    .pl__ring--d {
        animation-name: ringD;
        stroke: #f42582;
    }

    /* Animations */
    @keyframes ringA {

        from,
        4% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -330;
        }

        12% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -335;
        }

        32% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -595;
        }

        40%,
        54% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -660;
        }

        62% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -665;
        }

        82% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -925;
        }

        90%,
        to {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -990;
        }
    }

    @keyframes ringB {

        from,
        12% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -110;
        }

        20% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -115;
        }

        40% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -195;
        }

        48%,
        62% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        70% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        90% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -305;
        }

        98%,
        to {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -330;
        }
    }

    @keyframes ringC {
        from {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
        }

        8% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
        }

        28% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
        }

        36%,
        58% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        66% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        86% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
        }

        94%,
        to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
        }
    }

    @keyframes ringD {

        from,
        8% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
        }

        16% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
        }

        36% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
        }

        44%,
        50% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
        }

        58% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
        }

        78% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
        }

        86%,
        to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
        }
    }
</style>
<style>
    #custom-logo {
        transition: height 0.3s ease;
    }

    #sub-nav {
        transition: gap 1s ease;
    }

    .font-cookie {
        font-family: 'Cookie';
    }

    .font-dancing {
        font-family: 'Google Sans,Helvetica Neue,sans-serif';
    }

    .font-dm-sans {
        font-family: "DM Sans", sans-serif;
    }

    @media (max-width: 400px) {
        .hide-name {
            display: none !important;
        }
    }
</style>
<style>
    .love-heart{
        animation: beat .25s infinite alternate;
    }

    @keyframes beat{
        100%{
            -webkit-transform: scale(1.4);
            transform: scale(1.4);
        }
    }
</style>
