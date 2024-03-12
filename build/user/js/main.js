const initApp =() => {
    const hamburgerBtn = document.getElementById('hamburger-button')
    const mobileMenu = document.getElementById('mobile-menu')

    const toggleMenu = () => {
        mobileMenu.classList.toggle('hidden')
        mobileMenu.classList.toggle('flex')
    //    // the added js file for the second variation for the hamburger 
    //     hamburgerBtn.classList.toggle('toggle-btn')
    }
    hamburgerBtn.addEventListener('click',toggleMenu)
    mobileMenu.addEventListener('click',toggleMenu)
}

document.addEventListener('DOMContentLoaded',initApp)