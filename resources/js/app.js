import './bootstrap';
// import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import '../css/sb-admin-2.css';
import '../css/home.css';
import '../vendor/fontawesome-free/css/all.min.css'

import jQuery from 'jquery';

  // make jQuery global
window.$ = window.jQuery = jQuery;

             // bootstrap bundle (includes Popper)
import 'jquery.easing';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; 
import toastr from "toastr";
import "toastr/build/toastr.min.css";

window.toastr = toastr; // make it available globally
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "5000"
};


import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";
import "tom-select/dist/css/tom-select.bootstrap5.css";

import Swal from 'sweetalert2';

window.Swal = Swal; // Make it globally accessible

// Toggle the side navigation
$("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
  $("body").toggleClass("sidebar-toggled");
  $(".sidebar").toggleClass("toggled");
  if ($(".sidebar").hasClass("toggled")) {
    $('.sidebar .collapse').collapse('hide');
  };
});

// Close any open menu accordions when window is resized below 768px
$(window).resize(function() {
  if ($(window).width() < 768) {
    $('.sidebar .collapse').collapse('hide');
  };
});

// Prevent content wrapper from scrolling when the fixed side navigation hovered over
$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
  if ($(window).width() > 768) {
    var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  }
});

// Scroll to top button appear
$(document).on('scroll', function() {
  var scrollDistance = $(this).scrollTop();
  if (scrollDistance > 100) {
    $('.scroll-to-top').fadeIn();
  } else {
    $('.scroll-to-top').fadeOut();
  }
});

// Smooth scrolling using jQuery easing
$(document).on('click', 'a.scroll-to-top', function(e) {
  var $anchor = $(this);
  $('html, body').stop().animate({
    scrollTop: ($($anchor.attr('href')).offset().top)
  }, 1000, 'easeInOutExpo');
  e.preventDefault();
});

 $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This record?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                      
                        'success'
                      )
                    }
                  }) 


    });

  });
  document.addEventListener("DOMContentLoaded", function() {
        new TomSelect("#tags", {
            plugins: ['remove_button'],
            placeholder: "Select tags...",
        });  
    });
      document.addEventListener("DOMContentLoaded", function() {
        new TomSelect("#roles", {
            plugins: ['remove_button'],
            
        });  
    });
   
   

  