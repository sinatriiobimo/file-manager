const showMenu = (toggleId, navbarId, bodyId) => {
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodyPadding = document.getElementById(bodyId)

    if(toggle && navbar) {
        toggle.addEventListener('click', () => {
            navbar.classList.toggle('show')
            toggle.classList.toggle('rotate')
            bodyPadding.classList.toggle('expander')
        })
    }
}

showMenu('nav-toggle', 'sidebar-wrapper', 'content-panel')

//LINK ACTIVE COLOR
const linkColor = document.querySelectorAll('.nav__link')

function colorLink() {
    linkColor.forEach(link => link.classList.remove('active'))
    this.classList.add('active')
}
linkColor.forEach(link => link.addEventListener('click', colorLink))