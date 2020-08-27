<!-- Load library jquery js -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>

<!-- Load library jquery ui js -->
<script src="<?= base_url('assets/jquery-ui/jquery-ui.min.js') ?>"></script>

<!-- Load library bootstrap js -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>



<!-- jQuery UI -->
<script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "dd-mm-yy",
      changeMonth: true,
      changeYear: true
    });
  });
  $(function() {
    $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true
    });
});
</script>

<!-- Back to Top -->
<script>
    var $backToTop = $(".backTop");
    $backToTop.hide();
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 100) {
        $backToTop.fadeIn();
      } else {
        $backToTop.fadeOut();
      }
    });

    $backToTop.on('click', function(e) {
      $("html, body").animate({scrollTop: 0}, 900);
    });
</script>

</body>
</html>