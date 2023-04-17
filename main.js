
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


//const workBtnContainer2 = document.querySelector('.main__menu');
// const workBtnContainer2 = document.querySelector('.main__menu');
// const mainBtnContainer2 = document.querySelector('.product__category');
// const productContainer2 = document.querySelector('.main__top-level');
// const products2 = document.querySelectorAll('.product');

// workBtnContainer2.addEventListener('click', (e) => {
//     const filter = e.target.dataset.filter
//     if (filter == null) {
//         return;
//     }
//     products2.forEach((product) => {
//         console.log(product.dataset.type);
//         if (filter === product.dataset.type) {
//             product.classList.remove('invisible');
//         } else {
//             product.classList.add('invisible');
//         }
//     });
// });

// mainBtnContainer.addEventListener('click', (e) => {
//         const mainFilter = e.target.dataset.mainFilter
//         if (mainFilter == null) {
//             return;
//         }
//         projects.forEach((product) => {
//             console.log(product.dataset.type);
//             if (mainFilter === product.dataset.type) {
//                 product.classList.remove('invisible');
//             } else {
//                 product.classList.add('invisible');
//             }
//         });
//         console.log(mainFilter);
    

// });
