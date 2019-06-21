/* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*//* Nav Bar*/

const navSlide = () => {
    const burger = document.querySelector('.burger')
    const nav = document.querySelector('.nav-links')
    const navLinks = document.querySelectorAll('.nav-links li')

    burger.addEventListener('click', () => {
    //Toggle nav
        nav.classList.toggle('nav-active')

    //Animate Links
        navLinks.forEach((link, index) => {
            if(link.style.animation){
                link.style.animation = ''
            } else {
                link.style.animation = link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.2}s`
            }
        })
        //Burger animation
        burger.classList.toggle('toggle')
    })

}
navSlide()

let makeDisappear = document.querySelector('.make-disappear')
let disappear = document.querySelector('#book-not-displayed')

makeDisappear.addEventListener('mouseover', () => {
    disappear.classList.add("disappear")
})
makeDisappear.addEventListener('mouseout', () => {
    disappear.classList.remove("disappear")
})