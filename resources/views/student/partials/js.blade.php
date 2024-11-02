<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(window).on('load', function() {
        $('#preloader').fadeOut(800, function() {
            $('#inner-section').fadeIn(500);
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('custom-logo');

        function animateNav() {
            if (element) {
                if (window.scrollY > 25) {
                    element.style.height = '75px';
                } else {
                    element.style.height = '85px';
                }
            } else {
                console.error("Element not found.");
            }
        }

        // Animate navigation bar based on initial scroll position
        animateNav();

        // Event listener for scroll
        window.addEventListener('scroll', animateNav);
    });
</script>
