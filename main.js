
// Item filter
const workBtnContainer = document.querySelector('.side__menu');
const workBtnContainer2 = document.querySelector('.main__menu');
const workBtnContainer3 = document.querySelector('.second__menu');
const mainBtnContainer = document.querySelector('.product__category');
const productContainer = document.querySelector('.main__top-level');
const products = document.querySelectorAll('.product');

workBtnContainer.addEventListener('click', (e) => {
    const filter = e.target.dataset.filter
    if (filter == null) {
        return;
    }
    products.forEach((product) => {
        console.log(product.dataset.type);
        if (filter === product.dataset.type) {
            product.classList.remove('invisible');
        } else {
            product.classList.add('invisible');
        }
    });
});

workBtnContainer2.addEventListener('click', (e) => {
    const filter = e.target.dataset.filter
    if (filter == null) {
        return;
    }
    products.forEach((product) => {
        console.log(product.dataset.type);
        if (filter === product.dataset.type) {
            product.classList.remove('invisible');
        } else {
            product.classList.add('invisible');
        }
    });
});


workBtnContainer3.addEventListener('click', (e) => {
    const filter = e.target.dataset.filter
    if (filter == null) {
        return;
    }
    products.forEach((product) => {
        console.log(product.dataset.type);
        if (filter === product.dataset.type) {
            product.classList.remove('invisible');
        } else {
            product.classList.add('invisible');
        }
    });
});

// not working
// When Side bar top menu clicked, Open the second level menu  
const navbarToggleBtn = document.querySelector('.side__top-menu');
const secondMenu = document.querySelector('.second-menu');
navbarToggleBtn.addEventListener('click', ()=> {
    secondMenu.classList.toggle('open');
});

// not working
// add item to cart
function addItemToCart() {
    var itemName = document.getElementById("item-name").innerHTML;
    var itemPrice = document.getElementById("item-price").innerHTML;
    var itemQuantity = document.getElementById("item-quantity").value;
    
    // Add item to shopping cart
    var cartItem = { name: itemName, price: itemPrice, quantity: itemQuantity };
    var cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.push(cartItem);
    localStorage.setItem("cart", JSON.stringify(cart));
  }