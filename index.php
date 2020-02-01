<?php
require_once 'conexionBD.php';
$conexion = new Conexion();
$articulo = $conexion->query('SELECT * FROM articulos', PDO::FETCH_ASSOC);

?>

<?php include_once('include/header.php'); ?>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Programacion Web I</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Proyecto Final - PHP + MYSQL</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Articulos</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">
  <?php
foreach ($articulo as $articuloItem) {
?>
<!-- Portfolio Item 1 -->
<div class="col-md-6 col-lg-4">
  <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal<?php echo $articuloItem['idarticulos']; ?>">
    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
      <div class="portfolio-item-caption-content text-center text-white">
        <i class="fas fa-plus fa-3x"></i>
      </div>
    </div>
    <img class="img-fluid" src="<?php echo $articuloItem['img']; ?>" alt="">
  </div>
</div>


 <!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal<?php echo $articuloItem['idarticulos']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="portfolioModal<?php echo $articuloItem['idarticulos']; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?php echo $articuloItem['nombre']; ?></h2>
                <h6 class="py-2 text-success"><?php echo $articuloItem['precio']; ?>.Bs.</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="<?php  echo $articuloItem['img']; ?>" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5"><?php  echo $articuloItem['descripcion']; ?></p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
                <a href="VentaCalcular.php" class="btn btn-info">Comprar!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
}
?>
    </div>
  </section>

  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Acerca de...</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Proyecto Final de la materia Programacion Web I, materia del 5to semestre de la carrera
          de Ing. de Sistemas de la Universidad Domingo Savio</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Autor: Samuel Vizcarra Aguilar, para descargar en proyecto de GitHub puede ingresar a http://github.com/samucoxd/web1 o en el siguiente Link</p>
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="http://github.com/samucoxd/web1">
          <i class="fas fa-download mr-2"></i>
          GitHub
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contactame</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nombre</label>
                <input class="form-control" id="name" type="text" placeholder="Nombre" required="required"
                  data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Correo</label>
                <input class="form-control" id="email" type="email" placeholder="Correo" required="required"
                  data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Numero de Telefono</label>
                <input class="form-control" id="phone" type="tel" placeholder="Numero de Telefono" required="required"
                  data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Mensaje</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Mensaje" required="required"
                  data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  

  
<?php include_once('include/footer.php'); ?>

