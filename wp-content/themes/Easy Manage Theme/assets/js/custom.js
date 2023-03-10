document.addEventListener("DOMContentLoaded", function(event) {

    const toggleNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
              nav = document.getElementById(navId),
              bodypd = document.getElementById(bodyId),
              headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
            // Open the navbar by default
            nav.classList.add('show');
            toggle.classList.add('bx-x');
            bodypd.classList.add('body-pd');
            headerpd.classList.add('body-pd');

            toggle.addEventListener('click', ()=>{
                // toggle navbar on click
                nav.classList.toggle('show');
                toggle.classList.toggle('bx-x');
                bodypd.classList.toggle('body-pd');
                headerpd.classList.toggle('body-pd');
            });
        }
    }

    toggleNavbar('header-toggle','nav-bar','body-pd','header');

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link');

    function colorLink(){
        if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'));
            this.classList.add('active');
        }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink));

    // Your code to run since DOM is loaded and ready
});
