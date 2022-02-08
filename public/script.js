// Sticky Footer
//original code found at https://medium.com/@rvunabandi/how-to-make-a-sticky-footer-using-javascript-2445d899d7b4

window.addEventListener("load", activateStickyFooter);

function activateStickyFooter() {
    adjustFooterCssTopToSticky();
    window.addEventListener("resize", adjustFooterCssTopToSticky);
}

function adjustFooterCssTopToSticky() {
    const footer = document.querySelector("#footer");
    const bounding_box = footer.getBoundingClientRect();
    const footer_height = bounding_box.height;
    const window_height = window.innerHeight;
    const above_footer_height = bounding_box.top - getCssTopAttribute(footer);
    if (above_footer_height + footer_height <= window_height) {
        const new_footer_top = window_height - (above_footer_height + footer_height);
        footer.style.top = new_footer_top + "px";
    } else if (above_footer_height + footer_height > window_height) {
        footer.style.top = null;
    }
}