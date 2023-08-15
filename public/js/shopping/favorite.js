import {setCookie, getCookie, removeBySlug} from '../cookies.js'

function favoriting(name, slug, img) {
    var favItems = JSON.parse(getCookie('favorites')) || [];
    
    favItems.push({"name": name, "slug": slug, "img": img});
    setCookie('favorites', JSON.stringify(favItems), 1);
    
    alert('Product added to favorites!');
}

function get_favorites(ul) {
    var favItems = JSON.parse(getCookie('favorites')) || []

    ul.innerHTML = ''
    if (favItems.length == 0) {
        const empty_msg = document.getElementById('favorites_empty')
        empty_msg.hidden = false
    }else {
        favItems.forEach((item) => {
            let li = document.createElement('li');
            li.className="list-group-item"
            li.innerHTML=`<a href='/product/${item.slug}'><img src='/images/products/${item.img}' class='img-fluid' style='max-height: 100px;'>${item.name}</a><button class="btn btn-danger removeFromFavorite" slug="${item.slug}">X</button>`
            ul.appendChild(li)
        })
    }
    let remove_btns = document.getElementsByClassName('removeFromFavorite')
    for (let i = 0; i < remove_btns.length; i++) {
        remove_btns[i].addEventListener("click", ()=>{
            let slug = remove_btns[i].getAttribute('slug')
            removeBySlug('favorites', slug)
            window.location.reload()
        })
    }
}

const favorite_btn = document.getElementById('favorites-btn')
if (favorite_btn) {
    favorite_btn.addEventListener("click", ()=>{
        let info = JSON.parse(favorite_btn.dataset.info)
        favoriting(info.name, info.slug, info.img)
    })
}

const favorites_ul = document.getElementById("favorites_ul")
if (favorites_ul) {
    get_favorites(favorites_ul)
}
