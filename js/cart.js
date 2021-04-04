var cart = {};

function loadCart() {
    //Проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        //Если есть - расшифровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));

        showCart();


    }
    else {
        $('.mini-cart').html('Корзина пуста!');
    }
}

function showCart() {
    // Вывод корзины
    if (!isEmpty(cart)) {
        $('.mini-cart').html('Корзина пуста!');
    }
    else {
        $.getJSON('goods.json', function (data) {
            var goods = data;
            var out = '';
            for (var id in cart) {

                out += `<div class="cartochka">`;
                out += `<button data-id="${id}" class="del-goods">Удалить товар</button>`;
                out += `<div class="img"><img src="img/${goods[id].img}"></div>`;
                out += `<a href="" class="title">${goods[id].name}</a>`;
                out += `<div class="input_2">`;
                out += `<button data-id="${id}" class="minus-goods">-</button>`;
                out += ` ${cart[id]} `;
                out += `<button data-id="${id}" class="plus-goods">+</button>`;
                out += `</div>`;
                out += '<br>';
                out += ` Стоисомть: ${cart[id] * goods[id].cost} руб.`;
                out += '<br>';
                out += `</div>`;

            }
            $('.mini-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        });
    }
}

function delGoods() {
    //Удаляем товар из корзины
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}

function plusGoods() {
    //Добавляет товар в корзине
    var id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showCart();
}

function minusGoods() {
    //Уменьшает товар в корзине
    var id = $(this).attr('data-id');

    if (cart[id] == 1) {
        delete cart[id];
    }
    else {
        cart[id]--;
    }
    saveCart();
    showCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function isEmpty(object) {
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}


function sendEmail() {
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename != '' && email != '' && ephone != '') {
        if (isEmpty(cart)) {
            $.post(
                "core/mail.php",
                {
                    "ename": ename,
                    "email": email,
                    "ephone": ephone,
                    "cart": cart
                },
                function (data) {
                    if (data == 1) {
                        alert('Заказ отправлен!');
                    }
                    else {
                        alert('Повторите заказ!');
                    }
                }
            );
        }
        else {
            alert('Корзина пуста!');
        }
    }
    else {
        alert('Заполните поля!');
    }
}

$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail); //Отправить письмо с заказом
});