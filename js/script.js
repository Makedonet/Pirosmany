// let cart = {
//     'shs824': 2,
//     'sisls23': 2,
// };


// // Уменьшение количества товара
// // Удаление количества товара

// document.onclick = Event => {
//     // console.log(Event.target.classList);
//     if (Event.target.classList.contains('to-cart')) {
//         plusFunction(Event.target.dataSet.id);
//     }
// }

// // Увеличение количества товара
// const plusFunction = id => {
//     cart[id]++;
//     renderCart();
// }

// const renderCart = () => {
//     console.log(cart);
// }

// renderCart();
var cart = {};

function init() {
    // Вычитуем файл goods.json
    $.getJSON("goods.json", goodsOut);

}

function goodsOut(data) {
    // Вывод товара на главную страницу
    console.log(data);
    var out = '';
    for (var key in data) {
        // out += '<div class="img img_cart">' +cart[key].img;
        // out += '<div class="product product_cart">';
        // out += '<a href="" class="title title_cart">' + data[key].name + '</a>';
        // out += '</div>';

        // ------------

        out += '<div class="products-wrapper goods-out">';
        out += `<div class="img"><img src="img/${data[key].img}" alt=""></div>`;
        out += `<a href="" class="title">${data[key].name}</a>`;
        out += `<p class="description">${data[key].description}</p>`;
        out += `<div class="rating">
        <span class="active"></span>
        <span class="active"></span>
        <span class="active"></span>
        <span class="active"></span>
        <span></span>
        </div>`;
        out += `<div class="price"><b>${data[key].cost} ${data[key].cost2}</b></div>`;
        out += `<button class="to-cart" data-id="${key}">В корзину</button>`;
        out += '</div>';

    }
    $('.goods-out').html(out);
    $('.to-cart').on('click', addToCart);
}

function addToCart() {
    //Добавляем товар в корзину
    var id = $(this).attr('data-id');
    // console.log(id);
    if (cart[id] == undefined) {
        cart[id] = 1;
    }
    else {
        cart[id]++;
    }
    showMiniCart();
    saveCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function showMiniCart() {
    //Показываю мини корзину
    var out = "";
    for (var key in cart) {
        out += key + ' --- ' + cart[key] + '<br>';
    }
    $('.main-cart').html(out);
}

function loadCart() {
    //Проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        //Если есть - расшифровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

$(document).ready(function () {
    init();
    loadCart();
});