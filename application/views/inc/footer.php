
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p>Copyright &copy; <?php echo date(Y); ?> Tofra Web Development</p>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
  $('.carousel').carousel({
  interval: 5000 //changes the speed
  })
  $(function() {
        $('img').on('dblclick', function() {
        $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
        $('#enlargeImageModal').modal('show');
      });
  });
</script>

</body>

</html>
