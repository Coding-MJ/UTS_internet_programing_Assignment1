
// Item filter
const workBtnContainer = document.querySelector('.side__menu');
const projectContainer = document.querySelector('.main__top-level');
const projects = document.querySelectorAll('.product');

workBtnContainer.addEventListener('click', (e) => {
    const filter = e.target.dataset.filter
    if (filter == null) {
        return;
    }
    projects.forEach((product) => {
        console.log(product.dataset.type);
        if (filter === product.dataset.type) {
            product.classList.remove('invisible');
        } else {
            product.classList.add('invisible');
        }
    });

    // <this is also same as forEach
    // console.log('---------------------');
    // for (let project of projects) {
    //     console.log(project);
    // }
    // console.log('---------------------');
    console.log(filter);
});
