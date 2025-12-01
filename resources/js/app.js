import './bootstrap';
import "../css/app.css"

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
window.TomSelect=TomSelect
window.Swal = Swal; // Make it globally accessible



  document.addEventListener("DOMContentLoaded", function() {
      const tags = document.querySelector('#tags');
      const roles = document.querySelector('#roles');

    if (tags) {
        new TomSelect(tags, {
            plugins: ['remove_button']
        });
    }
    if(roles){
new TomSelect(roles, {
            plugins: ['remove_button']
        });
    }
    document.querySelectorAll('.toggle-password').forEach(icon => {
    icon.addEventListener('click', function () {
      const input = this.previousElementSibling;
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      this.classList.toggle('bi-eye-slash');
      this.classList.toggle('bi-eye');
    });
  });
    
    document.addEventListener("click", function (e) {
  // Check if the clicked element has id="delete"
  if (e.target && e.target.id === "delete") {
    e.preventDefault();

    const link = e.target.getAttribute("href");

    Swal.fire({
      title: "Are you sure?",
      text: "Delete this record?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;

        Swal.fire("Deleted!", "", "success");
      }
    });
  }
});

     const sidebarToggle = document.body.querySelector('#sidebarToggle');
     const adminLogo = document.body.querySelector('#adminLogo');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            adminLogo.classList.toggle("desactivateLogo")
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
       
    });
     
   
   

  