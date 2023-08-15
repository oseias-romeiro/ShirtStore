import {setCookie, getCookie, removeBySlug} from '../cookies.js'

function bagging(name, slug, img, units, size, color, price) {
    var bagItems = JSON.parse(getCookie('bag')) || [];
    
    bagItems.push({"name": name, "slug": slug, "img": img, "units": units, "size": size, "color": color, "price": price});
    setCookie('bag', JSON.stringify(bagItems), 1);
    
    alert('Product added to bag!');
}

function get_bag(ul) {
    var bagItems = JSON.parse(getCookie('bag')) || []

    ul.innerHTML = ''
    if (bagItems.length == 0) {
        const empty_msg = document.getElementById('bag_empty')
        empty_msg.hidden = false
    }else {
        bagItems.forEach((item) => {
            let li = document.createElement('li');
            li.className="list-group-item"
            li.innerHTML = `<a href='/product/${item.slug}'><img src='/images/products/${item.img}' class='img-fluid' style='max-height: 100px;'>${item.name} ${item.color} ${item.size} ${item.units} units ${item.price}$</a><button class="btn btn-danger removeFromBag" slug="${item.slug}">X</button>`
            ul.appendChild(li);
        })
    }
    let remove_btns = document.getElementsByClassName('removeFromBag')
    for (let i = 0; i < remove_btns.length; i++) {
        remove_btns[i].addEventListener("click", ()=>{
            let slug = remove_btns[i].getAttribute('slug')
            removeBySlug('bag', slug)
            window.location.reload()
        })
    }
    
}

const baggin_btn = document.getElementById('baggin-btn')
if (baggin_btn) {
    baggin_btn.addEventListener("click", ()=>{
        let info = JSON.parse(baggin_btn.dataset.info)
        let color = document.getElementById('color').value
        let size = document.getElementById('size').value
        let units = document.getElementById('units').value
        bagging(info.name, info.slug, info.img, units, size, color, info.price)
    })
}

const bag_ul = document.getElementById("bag_ul")
if (bag_ul) {
    get_bag(bag_ul)
}
