const navlinks = document.querySelectorAll(".navlink");
navlinks.forEach((link) => {
    const url = window.location.pathname;
    if (link.href.includes(url)) {
        link.classList.add("active");
    }
});
