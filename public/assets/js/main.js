/**
 * Main
 */

'use strict';

let menu, animate;

(function () {
  // Initialize menu
  //-----------------

  let layoutMenuEl = document.querySelectorAll('#layout-menu');
  layoutMenuEl.forEach(function (element) {
    menu = new Menu(element, {
      orientation: 'vertical',
      closeChildren: false
    });
    // Change parameter to true if you want scroll animation
    window.Helpers.scrollToActive((animate = false));
    window.Helpers.mainMenu = menu;
  });

  // Initialize menu togglers and bind click on each
  let menuToggler = document.querySelectorAll('.layout-menu-toggle');
  menuToggler.forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      window.Helpers.toggleCollapsed();
    });
  });

  // Display menu toggle (layout-menu-toggle) on hover with delay
  let delay = function (elem, callback) {
    let timeout = null;
    elem.onmouseenter = function () {
      // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
      if (!Helpers.isSmallScreen()) {
        timeout = setTimeout(callback, 300);
      } else {
        timeout = setTimeout(callback, 0);
      }
    };

    elem.onmouseleave = function () {
      // Clear any timers set to timeout
      document.querySelector('.layout-menu-toggle').classList.remove('d-block');
      clearTimeout(timeout);
    };
  };
  if (document.getElementById('layout-menu')) {
    delay(document.getElementById('layout-menu'), function () {
      // not for small screen
      if (!Helpers.isSmallScreen()) {
        document.querySelector('.layout-menu-toggle').classList.add('d-block');
      }
    });
  }

  // Display in main menu when menu scrolls
  let menuInnerContainer = document.getElementsByClassName('menu-inner'),
    menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];
  if (menuInnerContainer.length > 0 && menuInnerShadow) {
    menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
      if (this.querySelector('.ps__thumb-y').offsetTop) {
        menuInnerShadow.style.display = 'block';
      } else {
        menuInnerShadow.style.display = 'none';
      }
    });
  }

  // Init helpers & misc
  // --------------------

  // Init BS Tooltip
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Accordion active class
  const accordionActiveFunction = function (e) {
    if (e.type == 'show.bs.collapse' || e.type == 'show.bs.collapse') {
      e.target.closest('.accordion-item').classList.add('active');
    } else {
      e.target.closest('.accordion-item').classList.remove('active');
    }
  };

  const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'));
  const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
    accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction);
    accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction);
  });

  // Auto update layout based on screen size
  window.Helpers.setAutoUpdate(true);

  // Toggle Password Visibility
  window.Helpers.initPasswordToggle();

  // Speech To Text
  window.Helpers.initSpeechToText();

  // Manage menu expanded/collapsed with templateCustomizer & local storage
  //------------------------------------------------------------------

  // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
  if (window.Helpers.isSmallScreen()) {
    return;
  }

  // If current layout is vertical and current window screen is > small

  // Auto update menu collapsed/expanded based on the themeConfig
  window.Helpers.setCollapsed(true, false);
})();

$('#togglePassword').click(function() {
  var passwordInput = $('#password');
  if (passwordInput.attr('type') === 'password') {
    passwordInput.attr('type', 'text');
    $('#icon-password').removeClass('fa-eye').addClass('fa-eye-slash');
  } else {
    passwordInput.attr('type', 'password');
    $('#icon-password').removeClass('fa-eye-slash').addClass('fa-eye');
  }
});

$('#togglePasswordRepeat').click(function() {
  var passwordInput = $('#passwordRepeat');
  if (passwordInput.attr('type') === 'password') {
    passwordInput.attr('type', 'text');
    $('#icon-password-repeat').removeClass('fa-eye').addClass('fa-eye-slash');
  } else {
    passwordInput.attr('type', 'password');
    $('#icon-password-repeat').removeClass('fa-eye-slash').addClass('fa-eye');
  }
});

$('#submitProfile').click(function() {
  var password = $('#password').val();
  var passwordRepeat = $('#passwordRepeat').val();

  if (password !== '' || passwordRepeat !== '') {
    if (password === passwordRepeat) {
      $('#password').removeClass('is-invalid');
      $('#passwordRepeat').removeClass('is-invalid');
      $('#passwordRepeatValidation').addClass('d-none');
      $('#formAccountSettings').submit();
    } else {
      $('#password').addClass('is-invalid');
      $('#passwordRepeat').addClass('is-invalid');
      $('#passwordRepeatValidation').removeClass('d-none');
    }
  } else {
    $('#password').removeClass('is-invalid');
    $('#passwordRepeat').removeClass('is-invalid');
    $('#passwordRepeatValidation').addClass('d-none');
    $('#formAccountSettings').submit();
  }
})

function toggle(key) {
  var all = document.getElementsByName("" + key + "");
  var checkboxes = document.querySelectorAll("[id=" + key + "]");
  if (all[0].checked == true) {
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = true;
    }
  } else {
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = false;
    }
  }
}

function confirmDelete(id,status,module){

  var action = (status === 0) ? 'habilitar' : 'inhabilitar';

  Swal.fire({
    text: '¿Está seguro que desea ' + action + ' ' + module + '?',
    icon: 'info',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#696cff',
    cancelButtonText: 'No',
    confirmButtonText: 'Si',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("delete_form_" + id).submit();
    }
  })
}

function confirmRecover(id){
  Swal.fire({
    text: '¿Está seguro que desea reestablecer la contraseña del usuario?, esto le enviara un correo electrónico con una nueva contraseña.',
    icon: 'info',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#696cff',
    cancelButtonText: 'No',
    confirmButtonText: 'Si',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("recover_form_" + id).submit();
    }
  })
}