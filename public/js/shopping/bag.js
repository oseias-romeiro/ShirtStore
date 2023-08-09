import {setCookie, getCookie} from '../cookies.js'

function bagging(product) {
    var bagItems = JSON.parse(getCookie('bag')) || [];
    
    bagItems.push(product);
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
            li.textContent = item;
            ul.appendChild(li);
        })
    }
}

const baggin_btn = document.getElementById('baggin-btn')
if (baggin_btn) {
    baggin_btn.addEventListener("click", ()=>{
        bagging(baggin_btn.getAttribute('data'))
    })
}

const bag_ul = document.getElementById("bag_ul")
if (bag_ul) {
    get_bag(bag_ul)
}
