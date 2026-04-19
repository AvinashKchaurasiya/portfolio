(function () {
  "use strict";

  function initCursor() {
    var cursor = document.getElementById("cursor");
    var trail = document.getElementById("cursor-trail");
    if (!cursor || !trail) return;

    var mx = 0,
      my = 0,
      tx = 0,
      ty = 0;
    document.addEventListener("mousemove", function (e) {
      mx = e.clientX;
      my = e.clientY;
      cursor.style.left = mx + "px";
      cursor.style.top = my + "px";
    });
    (function animTrail() {
      tx += (mx - tx) * 0.12;
      ty += (my - ty) * 0.12;
      trail.style.left = tx + "px";
      trail.style.top = ty + "px";
      requestAnimationFrame(animTrail);
    })();

    var hoverTargets = "a,button,.skill-card,.project-card,.service-card,.filter-btn";
    document.querySelectorAll(hoverTargets).forEach(function (el) {
      el.addEventListener("mouseenter", function () {
        cursor.style.transform = "translate(-50%,-50%) scale(2.5)";
        trail.style.transform = "translate(-50%,-50%) scale(0.5)";
      });
      el.addEventListener("mouseleave", function () {
        cursor.style.transform = "translate(-50%,-50%) scale(1)";
        trail.style.transform = "translate(-50%,-50%) scale(1)";
      });
    });
  }

  function initThreeBackground() {
    var canvas = document.getElementById("bg-canvas");
    if (!canvas || typeof THREE === "undefined") return;

    var renderer = new THREE.WebGLRenderer({
      canvas: canvas,
      alpha: true,
      antialias: true,
    });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);

    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(
      75,
      window.innerWidth / window.innerHeight,
      0.1,
      1000,
    );
    camera.position.z = 5;

    var geo = new THREE.BufferGeometry();
    var count = 1800;
    var pos = new Float32Array(count * 3);
    var colors = new Float32Array(count * 3);
    for (var i = 0; i < count; i++) {
      pos[i * 3] = (Math.random() - 0.5) * 20;
      pos[i * 3 + 1] = (Math.random() - 0.5) * 20;
      pos[i * 3 + 2] = (Math.random() - 0.5) * 20;
      var t = Math.random();
      if (t < 0.6) {
        colors[i * 3] = 0;
        colors[i * 3 + 1] = 0.96;
        colors[i * 3 + 2] = 0.83;
      } else if (t < 0.85) {
        colors[i * 3] = 0;
        colors[i * 3 + 1] = 0.47;
        colors[i * 3 + 2] = 1;
      } else {
        colors[i * 3] = 0.48;
        colors[i * 3 + 1] = 0.19;
        colors[i * 3 + 2] = 1;
      }
    }
    geo.setAttribute("position", new THREE.BufferAttribute(pos, 3));
    geo.setAttribute("color", new THREE.BufferAttribute(colors, 3));
    var mat = new THREE.PointsMaterial({
      size: 0.025,
      vertexColors: true,
      transparent: true,
      opacity: 0.7,
      sizeAttenuation: true,
    });
    var particles = new THREE.Points(geo, mat);
    scene.add(particles);

    var lineMat = new THREE.LineBasicMaterial({
      color: 0x00f5d4,
      transparent: true,
      opacity: 0.04,
    });
    for (var j = -5; j <= 5; j++) {
      var hg = new THREE.BufferGeometry().setFromPoints([
        new THREE.Vector3(-10, j * 2, -5),
        new THREE.Vector3(10, j * 2, -5),
      ]);
      var vg = new THREE.BufferGeometry().setFromPoints([
        new THREE.Vector3(j * 2, -10, -5),
        new THREE.Vector3(j * 2, 10, -5),
      ]);
      scene.add(new THREE.Line(hg, lineMat));
      scene.add(new THREE.Line(vg, lineMat));
    }

    var mouseX = 0,
      mouseY = 0;
    document.addEventListener("mousemove", function (e) {
      mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
      mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    });

    var clock = new THREE.Clock();
    function animate() {
      requestAnimationFrame(animate);
      var t = clock.getElapsedTime();
      particles.rotation.y = t * 0.04 + mouseX * 0.1;
      particles.rotation.x = t * 0.02 + mouseY * 0.05;
      renderer.render(scene, camera);
    }
    animate();

    window.addEventListener("resize", function () {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });
  }

  function initTypedRoles() {
    var el = document.getElementById("typed-text");
    if (!el) return;

    var roles = [
      "PHP Laravel Developer",
      "Full-Stack Web Developer",
      "API Architect",
      "Backend Specialist",
      "5+ Years Experience",
    ];
    var ri = 0,
      ci = 0,
      deleting = false;
    function type() {
      var r = roles[ri];
      if (!deleting) {
        el.textContent = r.slice(0, ci + 1);
        ci++;
        if (ci === r.length) {
          deleting = true;
          setTimeout(type, 2000);
          return;
        }
      } else {
        el.textContent = r.slice(0, ci - 1);
        ci--;
        if (ci === 0) {
          deleting = false;
          ri = (ri + 1) % roles.length;
        }
      }
      setTimeout(type, deleting ? 50 : 90);
    }
    type();
  }

  function initScrollReveal() {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) e.target.classList.add("visible");
        });
      },
      { threshold: 0.1 },
    );
    document.querySelectorAll(".fade-up,.fade-in").forEach(function (el) {
      observer.observe(el);
    });
  }

  function initPortfolioFilter() {
    var buttons = document.querySelectorAll(".filter-btn");
    if (!buttons.length) return;

    buttons.forEach(function (btn) {
      btn.addEventListener("click", function () {
        buttons.forEach(function (b) {
          b.classList.remove("active");
        });
        btn.classList.add("active");
        var filter = btn.getAttribute("data-filter") || "all";
        document.querySelectorAll(".project-card").forEach(function (card) {
          var cat = card.getAttribute("data-category") || "";
          var show = filter === "all" || cat === filter;
          card.style.display = show ? "" : "none";
        });
      });
    });
  }

  function initProjectTilt() {
    document.querySelectorAll(".project-card").forEach(function (card) {
      card.addEventListener("mousemove", function (e) {
        var r = card.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width - 0.5;
        var y = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform =
          "translateY(-8px) rotateX(" + -y * 10 + "deg) rotateY(" + x * 10 + "deg)";
      });
      card.addEventListener("mouseleave", function () {
        card.style.transform = "";
      });
    });
  }

  function initNavScroll() {
    var navLinks = document.querySelectorAll(".nav-links a");
    var sections = document.querySelectorAll("section");
    var nav = document.querySelector("nav");
    if (!navLinks.length || !sections.length || !nav) return;

    window.addEventListener("scroll", function () {
      var cur = "";
      sections.forEach(function (s) {
        if (window.scrollY >= s.offsetTop - 200) cur = s.id;
      });
      navLinks.forEach(function (a) {
        var href = a.getAttribute("href") || "";
        var m = href.match(/#([\w-]+)$/);
        var linkHash = m ? m[1] : "";
        a.style.color = linkHash === cur ? "var(--cyan)" : "";
      });
      nav.style.background =
        window.scrollY > 50 ? "rgba(6,8,18,0.95)" : "rgba(6,8,18,0.7)";
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      initCursor();
      initThreeBackground();
      initTypedRoles();
      initScrollReveal();
      initPortfolioFilter();
      initProjectTilt();
      initNavScroll();
    });
  } else {
    initCursor();
    initThreeBackground();
    initTypedRoles();
    initScrollReveal();
    initPortfolioFilter();
    initProjectTilt();
    initNavScroll();
  }
})();
