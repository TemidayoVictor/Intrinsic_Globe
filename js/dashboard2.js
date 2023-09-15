const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('aside');
const closeAccount = document.querySelector('#drop');
const closeAccount2 = document.querySelector('#drop2');
const accountList = document.querySelector('.header .account-list');

menuBtn.addEventListener('click', () => {
   sidebar.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sidebar.style.display = 'none';
});

closeAccount.addEventListener('click', () =>{
    accountList.classList.toggle('active');
});

closeAccount2.addEventListener('click', () =>{
    accountList.classList.toggle('active');
});

const themeBtn = document.querySelector('.theme-btn');

themeBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');

    themeBtn.querySelector('span:first-child').classList.toggle('active');
    themeBtn.querySelector('span:last-child').classList.toggle('active');
})