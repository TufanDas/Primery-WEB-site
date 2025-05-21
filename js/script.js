<script>
document.addEventListener("DOMContentLoaded", () => {
  const dropdowns = document.querySelectorAll(".mega-dropdown");

  dropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector(".nav-link");
    const menu = dropdown.querySelector(".mega-menu");

    // Prevent Bootstrap's default dropdown behavior
    toggle.setAttribute("data-bs-toggle", ""); // disables BS toggle
    dropdown.classList.remove("dropdown");

    // Show on hover (desktop only)
    dropdown.addEventListener("mouseenter", () => {
      if (!dropdown.classList.contains("active")) {
        menu.classList.add("show");
      }
    });

    dropdown.addEventListener("mouseleave", () => {
      if (!dropdown.classList.contains("active")) {
        menu.classList.remove("show");
      }
    });

    // Click to toggle open/close
    toggle.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();

      const isActive = dropdown.classList.contains("active");

      // Close all
      dropdowns.forEach((d) => {
        d.classList.remove("active");
        d.querySelector(".mega-menu").classList.remove("show");
      });

      if (!isActive) {
        dropdown.classList.add("active");
        menu.classList.add("show");
      }
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".mega-dropdown")) {
      dropdowns.forEach((d) => {
        d.classList.remove("active");
        d.querySelector(".mega-menu").classList.remove("show");
      });
    }
  });
});
</script>
