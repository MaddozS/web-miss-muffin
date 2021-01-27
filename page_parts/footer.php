
<?php 
$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
?>
<footer id="footer" class="borderFooter">
    <div class="text-center py-2">
      <h4>Encuéntranos en:</h4>
        <a class="btn-floating btn-lg btn-fb" type="button" role="button" href="https://www.facebook.com/missmuffinmx" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <a class="btn-floating btn-lg btn-ins" type="button" role="button" href="https://www.instagram.com/missmuffinmx/" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <a class="btn-floating btn-lg btn-whatsapp" type="button" role="button" href="http://bit.ly/2JX4oQq" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>
    <div class="text-center py-2"><h6>2020 © Miss Muffin</h6></div>
  </footer>

  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
  <script src="<?php echo "http://",$uri, "/js/bootstrap.bundle.min.js" ?>"></script>
  <script src="<?php echo "http://",$uri, "/js/app.js" ?>"></script>
</body>
<style>
.borderFooter{
  border-top: solid #D381C2;
}
</style>
</html>

<?php 
//exit();
?>