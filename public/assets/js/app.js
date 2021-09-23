$('.js-tilt').tilt({
    maxTilt:        20,
    perspective:    3000,   // Transform perspective, the lower the more extreme the tilt gets.
    easing:         "cubic-bezier(.03,.98,.52,.99)",    // Easing on enter/exit.
    scale:          1,      // 2 = 200%, 1.5 = 150%, etc..
    speed:          600,    // Speed of the enter/exit transition.
    transition:     true,   // Set a transition on enter/exit.
    disableAxis:    null,   // What axis should be disabled. Can be X or Y.
    reset:          true,   // If the tilt effect has to be reset on exit.
    glare:          false,  // Enables glare effect
    maxGlare:       1       // From 0 - 1.
});

document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});

$('#delete_button').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {

        if (result.isConfirmed) {

          $('#delete_form').submit();

        }

      });

});

$("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(500);
});
