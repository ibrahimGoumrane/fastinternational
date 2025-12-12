/**
 * FAST International - Modern JavaScript
 * Single Page Application functionality
 */

document.addEventListener("DOMContentLoaded", function () {
  // =========================================
  // NAVIGATION
  // =========================================

  const navbar = document.getElementById("navbar");
  const hamburger = document.getElementById("hamburger");
  const navMenu = document.getElementById("nav-menu");
  const navLinks = document.querySelectorAll(".nav-link");

  // Mobile menu toggle
  if (hamburger) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");
    });
  }

  // Close mobile menu on link click
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      hamburger.classList.remove("active");
      navMenu.classList.remove("active");
    });
  });

  // Navbar scroll effect
  function handleScroll() {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    // Update active nav link based on scroll position
    updateActiveNavLink();

    // Show/hide back to top button
    toggleBackToTop();
  }

  window.addEventListener("scroll", handleScroll);

  // =========================================
  // ACTIVE NAV LINK ON SCROLL
  // =========================================

  const sections = document.querySelectorAll("section[id]");

  function updateActiveNavLink() {
    const scrollY = window.pageYOffset;

    sections.forEach((section) => {
      const sectionHeight = section.offsetHeight;
      const sectionTop = section.offsetTop - 100;
      const sectionId = section.getAttribute("id");

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        navLinks.forEach((link) => {
          link.classList.remove("active");
          if (link.getAttribute("href") === "#" + sectionId) {
            link.classList.add("active");
          }
        });
      }
    });
  }

  // =========================================
  // SMOOTH SCROLL
  // =========================================

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        const headerOffset = 70;
        const elementPosition = target.getBoundingClientRect().top;
        const offsetPosition =
          elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  // =========================================
  // BACK TO TOP BUTTON
  // =========================================

  const backToTop = document.getElementById("backToTop");

  function toggleBackToTop() {
    if (window.scrollY > 500) {
      backToTop.classList.add("visible");
    } else {
      backToTop.classList.remove("visible");
    }
  }

  // =========================================
  // EXPERTISE TABS
  // =========================================

  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabPanes = document.querySelectorAll(".tab-pane");

  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const tabId = button.getAttribute("data-tab");

      // Remove active class from all buttons and panes
      tabButtons.forEach((btn) => btn.classList.remove("active"));
      tabPanes.forEach((pane) => pane.classList.remove("active"));

      // Add active class to clicked button and corresponding pane
      button.classList.add("active");
      document.getElementById(tabId).classList.add("active");
    });
  });

  // =========================================
  // SERVICE TABS (NEW)
  // =========================================

  const serviceTabBtns = document.querySelectorAll(".service-tabs .tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  serviceTabBtns.forEach((button) => {
    button.addEventListener("click", () => {
      const tabId = button.getAttribute("data-tab");

      // Remove active class from all buttons and contents
      serviceTabBtns.forEach((btn) => btn.classList.remove("active"));
      tabContents.forEach((content) => content.classList.remove("active"));

      // Add active class to clicked button and corresponding content
      button.classList.add("active");
      const targetContent = document.getElementById(tabId);
      if (targetContent) {
        targetContent.classList.add("active");
      }
    });
  });

  // =========================================
  // ACCORDION (FRANCE TELECOM MISSIONS)
  // =========================================

  const accordionHeaders = document.querySelectorAll(".accordion-header");

  accordionHeaders.forEach((header) => {
    header.addEventListener("click", () => {
      const accordionItem = header.parentElement;
      const isActive = accordionItem.classList.contains("active");

      // Close all accordion items
      document.querySelectorAll(".accordion-item").forEach((item) => {
        item.classList.remove("active");
      });

      // Open clicked item if it wasn't active
      if (!isActive) {
        accordionItem.classList.add("active");
      }
    });
  });

  // =========================================
  // STATS COUNTER ANIMATION
  // =========================================

  const statNumbers = document.querySelectorAll(".stat-number");
  let statsAnimated = false;

  function animateStats() {
    if (statsAnimated) return;

    const statsContainer = document.querySelector(".stats-container");
    if (!statsContainer) return;

    const rect = statsContainer.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;

    if (isVisible) {
      statsAnimated = true;

      statNumbers.forEach((stat) => {
        const target = parseInt(stat.getAttribute("data-target"));
        if (!target) return;

        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const updateCounter = () => {
          current += step;
          if (current < target) {
            stat.textContent = Math.floor(current);
            requestAnimationFrame(updateCounter);
          } else {
            stat.textContent = target + "+";
          }
        };

        updateCounter();
      });
    }
  }

  window.addEventListener("scroll", animateStats);
  animateStats(); // Check on load

  // =========================================
  // CONTACT FORM
  // =========================================

  const contactForm = document.getElementById("contact-form");
  const formMessage = document.getElementById("form-message");

  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      // Get form data
      const formData = new FormData(this);
      const name = formData.get("name");
      const email = formData.get("email");

      // Simple validation
      if (!name || !email) {
        e.preventDefault();
        if (formMessage) {
          formMessage.textContent = "Veuillez remplir les champs obligatoires.";
          formMessage.className = "form-message error";
        }
        showNotification("Veuillez remplir les champs obligatoires.", "error");
        return;
      }

      // Email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        e.preventDefault();
        if (formMessage) {
          formMessage.textContent = "Veuillez entrer une adresse email valide.";
          formMessage.className = "form-message error";
        }
        showNotification("Veuillez entrer une adresse email valide.", "error");
        return;
      }

      // Show loading state while form submits
      const submitBtn = this.querySelector('button[type="submit"]');
      submitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
      submitBtn.disabled = true;

      // Allow form to submit normally to the server (no preventDefault here)
    });
  }

  // =========================================
  // NOTIFICATION SYSTEM
  // =========================================

  function showNotification(message, type = "info") {
    // Remove existing notifications
    const existingNotification = document.querySelector(".notification");
    if (existingNotification) {
      existingNotification.remove();
    }

    // Create notification
    const notification = document.createElement("div");
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
            <i class="fas fa-${
              type === "success"
                ? "check-circle"
                : type === "error"
                ? "exclamation-circle"
                : "info-circle"
            }"></i>
            <span>${message}</span>
            <button class="notification-close"><i class="fas fa-times"></i></button>
        `;

    // Add styles
    notification.style.cssText = `
            position: fixed;
            top: 90px;
            right: 20px;
            padding: 16px 24px;
            background: ${
              type === "success"
                ? "#10b981"
                : type === "error"
                ? "#ef4444"
                : "#3b82f6"
            };
            color: white;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10000;
            animation: slideIn 0.3s ease;
            font-weight: 500;
        `;

    // Add animation keyframes
    if (!document.getElementById("notification-styles")) {
      const style = document.createElement("style");
      style.id = "notification-styles";
      style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
                .notification-close {
                    background: none;
                    border: none;
                    color: white;
                    cursor: pointer;
                    padding: 4px;
                    margin-left: 8px;
                    opacity: 0.8;
                    transition: opacity 0.2s;
                }
                .notification-close:hover {
                    opacity: 1;
                }
            `;
      document.head.appendChild(style);
    }

    document.body.appendChild(notification);

    // Close button
    notification
      .querySelector(".notification-close")
      .addEventListener("click", () => {
        notification.style.animation = "slideOut 0.3s ease";
        setTimeout(() => notification.remove(), 300);
      });

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (notification.parentNode) {
        notification.style.animation = "slideOut 0.3s ease";
        setTimeout(() => notification.remove(), 300);
      }
    }, 5000);
  }

  // =========================================
  // INTERSECTION OBSERVER FOR ANIMATIONS
  // =========================================

  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-in");
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe elements for animation
  document
    .querySelectorAll(
      ".service-card, .feature-card, .mission-card, .expertise-item"
    )
    .forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(20px)";
      el.style.transition = "all 0.5s ease";
      observer.observe(el);
    });

  // Add animate-in class styles
  const animationStyle = document.createElement("style");
  animationStyle.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
  document.head.appendChild(animationStyle);

  // =========================================
  // LANGUAGE SWITCH PRESERVATION
  // =========================================

  // Preserve scroll position on language switch
  const langLinks = document.querySelectorAll(".lang-link");
  langLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Store current scroll position and active section
      const activeSection =
        document.querySelector("section.active") ||
        document.querySelector("section");
      if (activeSection) {
        sessionStorage.setItem("scrollTarget", "#" + activeSection.id);
      }
    });
  });

  // Restore scroll position after language switch
  const scrollTarget = sessionStorage.getItem("scrollTarget");
  if (scrollTarget) {
    sessionStorage.removeItem("scrollTarget");
    const target = document.querySelector(scrollTarget);
    if (target) {
      setTimeout(() => {
        target.scrollIntoView({ behavior: "smooth" });
      }, 100);
    }
  }

  // =========================================
  // INITIALIZE
  // =========================================

  handleScroll();
});
