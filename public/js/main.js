const header = document.querySelector('header');
let oldScrollPosition = 0;
let isScrollingUp = false;
let isHeaderVisible = true;

window.addEventListener('scroll', event => {
    isScrollingUp = oldScrollPosition > window.scrollY;
    oldScrollPosition = window.scrollY;
    if(!isScrollingUp && window.scrollY > 100 && isHeaderVisible){
        header.classList.add('invisible');
        isHeaderVisible = false;
    }
    if(isScrollingUp && !isHeaderVisible){
        header.classList.remove('invisible');
        isHeaderVisible = true;
    }
});

let buttons = document.querySelectorAll(".editable");
console.log(buttons);
buttons.forEach(item => {
    item.addEventListener('click', e => {
        e.preventDefault();
        if(item.classList.contains("edit")){
            window.location.href = "/"+item.dataset.page+"/editform/"+item.dataset.id;
        }else {
            window.location.href = "/"+item.dataset.page+"/delform/"+item.dataset.id;
        }
    });
});
