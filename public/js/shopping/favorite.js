import {setCookie, getCookie} from '../cookies.js'

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
            li.innerHTML=`<a href='/product/${item.slug}'><img src='/images/products/${item.img}' class='img-fluid' style='max-height: 100px;'>${item.name}</a>`
            
            ul.appendChild(li)
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
