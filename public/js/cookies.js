
export function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/; SameSite=Strict";
}

export function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

export function removeBySlug(cname, slug) {
    let cookies = JSON.parse(getCookie(cname)) || []
    for (let i=0; i<cookies.length; i++) {
        if (cookies[i].slug === slug) {
            cookies.splice(i, 1);
            break;
        }
    }
    setCookie(cname, JSON.stringify(cookies), 1)
    console.log(cookies)
}
