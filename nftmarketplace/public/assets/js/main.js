


const menuBlock = document.getElementById('menu-collapse-block');
const content = document.getElementById('content');



// const clickHeader = function(){
//     menuBlock.style.display = 'none';
// }

function showMenuCollapse (){
    menuBlock.style.display = 'block';
}

const clickContent = function(){
    menuBlock.style.display = 'none';
}

// header.addEventListener('click', clickHeader);
content.addEventListener('click', clickContent);



