<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Our Company Name</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  
  <!-- Custom Styles -->
  <link rel="stylesheet" href="css/styles.css" />
  
  <style>
    /* Inline critical styles for mega menu caret & visibility */
    .dropdown-icon {
      transition: transform 0.3s ease;
      font-size: 0.8em;
      vertical-align: middle;
    }
    .mega-dropdown.active > .nav-link .dropdown-icon {
      transform: rotate(180deg);
    }
    .mega-menu {
      width: 100vw;
      left: 0;
      top: 100%;
      background-color: var(--bg-dark);
      color: var(--text-light);
      display: none;
      position: absolute;
      border-top: 2px solid var(--highlight);
      padding: 1rem 2rem;
      z-index: 1050;
    }
    .mega-menu.show {
      display: block;
    }
    @media (max-width: 991px) {
      .mega-menu {
        position: static;
        width: 100%;
        border-top: none;
        padding: 0.5rem 1rem;
      }
    }
  </style>
</head>
<body class="bg-dark text-light">
  
  <?php include('partials/header.html'); ?>
  
  <!-- Hero Section -->
  <section class="hero text-center d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
      <h1 class="display-4">Welcome to Our Company</h1>
      <p class="lead">Building reliable and scalable digital solutions</p>
    </div>
  </section>
  
  <!-- Footer -->
  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap Bundle JS (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Script -->
  <script src="js/script.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const dropdowns = document.querySelectorAll('.mega-dropdown');

      dropdowns.forEach(drop => {
        const toggle = drop.querySelector('.nav-link');
        const menu = drop.querySelector('.mega-menu');

        drop.addEventListener('mouseenter', () => {
          if (!drop.classList.contains('active')) {
            menu.classList.add('show');
          }
        });

        drop.addEventListener('mouseleave', () => {
          if (!drop.classList.contains('active')) {
            menu.classList.remove('show');
          }
        });

        toggle.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();

          const isActive = drop.classList.contains('active');

          dropdowns.forEach(d => {
            if (d !== drop) {
              d.classList.remove('active');
              d.querySelector('.mega-menu').classList.remove('show');
              d.querySelector('.nav-link').setAttribute('aria-expanded', 'false');
            }
          });

          if (!isActive) {
            drop.classList.add('active');
            menu.classList.add('show');
            toggle.setAttribute('aria-expanded', 'true');
          } else {
            drop.classList.remove('active');
            menu.classList.remove('show');
            toggle.setAttribute('aria-expanded', 'false');
          }
        });
      });

      document.addEventListener('click', () => {
        dropdowns.forEach(drop => {
          drop.classList.remove('active');
          drop.querySelector('.mega-menu').classList.remove('show');
          drop.querySelector('.nav-link').setAttribute('aria-expanded', 'false');
        });
      });
    });
  </script>
</body>
</html>
