let menuIcon = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList("active");
};

/*section d'activation de lien */

let sections = document.querySelectorAll("section");
let navlinks = document.querySelectorAll("header nav a");

window.onscroll = () => {
    sections.forEach((sec) =>{
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute("id");

        if(top >= offset && top < offset + height){
            navlinks.foreach((links) => {
                links.classList.remove("active");
                document
                .querySelector("header nav a[href*=" +id +"]")
                .classList.add("active");
            });
        }
    });

    /*nav nar  */
    let header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 100);


    menuIcon.classList.remove("bx-x");
    navbar.classList.remove("active");
};


scrollReveal({
    reset:true,
    distance: "80px",
    duration : 2000,
    delay: 200,
});

scrollReveal().reveal(".home-content, .heading", {origin: "top"});
scrollReveal().reveal(
    ".home-img, services .services-container , .portofolio-box, contact form", {origin : "bottom"}
);

scrollReveal().reveal(".home-content h1, .about-img",{origin: "left"});
scrollReveal().reveal(".home-content p, .about-content", {origin:"right"});
//scrollReveal().reveal("")

// const typed = new Typed(".multiple-text",{
//     String:["Fronend Developpeur", "Content Creator", "UI/UX Designer"],
//     typeSpeed:100,
//     backSpeed:100,
//     backDekay: 1000,
//     loop:true,
// });

