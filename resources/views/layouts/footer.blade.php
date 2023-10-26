<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script type='text/javascript'>
    window.addEventListener('load', function () {
        document.querySelector('.pre-loader').className += ' hidden';
    });
</script>
@yield('script')
