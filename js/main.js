window.onload = () => {
    // console.log('allready')
    // Timeout for example
    // setTimeout(() => document.querySelector('.preloader').remove(), 1000)

    document.querySelector('.preloader').remove()

    //Header action
    window.onscroll = () => {
        //Close menu after scroll
        document.querySelector('.header').classList.remove('open')
        //Go top, 300px to start
        document.querySelector('.gotop').addEventListener('click', () => {
            document.querySelector('#intro')
            .scrollIntoView({behavior: "smooth"})
        })
        if (300 <= window.scrollY) {
            document.querySelector('.gotop').classList.add('show')
        }else{
            document.querySelector('.gotop').classList.remove('show')
        }
        window.scrollY >= 1 ?
        document.querySelector("header").classList.add("scroll") :
        document.querySelector("header").classList.remove("scroll")

        document.querySelectorAll('section').forEach((element, i) => {
            if (element.offsetTop <= window.scrollY + 200 ){ // 200 = delta
                document.querySelectorAll('nav a').forEach(element => {
                    if (element.classList.contains('header__navigation-link_active')) {
                        element.classList.remove('header__navigation-link_active')
                    }
                })
                document.querySelectorAll('nav li')[i].querySelector('a')
                .classList.add('header__navigation-link_active')
            }
        })
    }

    //Scroll to section
    document.querySelectorAll('header a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault()
            document.querySelector(link.getAttribute('href'))
            .scrollIntoView({behavior: "smooth"})
        })
    })

    //Subscribe
    document.querySelector('#subscribe').addEventListener('submit', e => {
        // e.preventDefault()
        const data = new FormData(e.target)
        document.querySelector('.footer__link-subscribe-message')
        .textContent = `Вы подписались на рассылку, ваша почта ${[...data.entries()][0][1]}`
    })
    //Menu
    document.querySelector('.header__mobile-menu').addEventListener('click', () => {
        document.querySelector('.header').classList.toggle('open')
        document.querySelector('.header__navigation').style.top = `${document.querySelector('.header').offsetHeight - 1}px`
    })

    //Send file
    // document.querySelector('.addwork__file-add').onchange = function() {
    //     document.querySelector('#button-link').textContent = 'Отправить файл';
    //     document.querySelector('#submit').addEventListener('click', function(){
    //         document.querySelector('#sendfile').addEventListener('submit', function(e) {
    //             const data = Object.fromEntries(new FormData(e.target).entries());
    //             console.log(data);
    //             debugger;
    //         })
    //         document.querySelector('#sendfile').submit()
    //     })
    // };
    document.querySelector("#sendfile").addEventListener("submit", (e) => {
        const data = Object.fromEntries(new FormData(e.target).entries());
        console.log(data);
        // debugger;
        //debugger for check
      });
}
