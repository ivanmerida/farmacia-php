<!-- PIE DE PÁGINA -->
<footer>
    <div class="ad container hidden-xs">
        <div class="row">
            <div class="col-md-12">
                <img src="img/ad.jpg" alt="" />
            </div>
        </div>
    </div>
    <nav class="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?= base_url ?>">Inicio</a></li>
                        <li><a href="<?= base_url ?>/views/desarrolladores/index">Acerca de</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Terminos y Condiciones</a></li>
                    </ul>
                </div>
            </div </div> </nav> <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><b>Sitio creado por team DevWeb masters 2021 &copy;</b></p>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- FIN DE PIE DE PÁGINA -->
<!-- PARA QUE FUNCIONE BOOTSTRAP-->
<script type="text/javascript" src="<?=base_url?>assets/jquery/jquery-3.6.0.min.js"></script>
<!-- PARA QUE FUNCIONE LOS SLIDERS Y MÁS-->
<script type="text/javascript" src="<?=base_url?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".carousel").carousel({
            interval: 2000,
        });

        $(".btn-tool").tooltip();

        $(".btn-pop").popover();
    });
</script>
</body>

</html>