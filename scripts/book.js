let hot=document.querySelector('.hot');
let cold=document.querySelector('.cold');
let item=document.querySelector('.item');
let no=document.querySelector('.no');



if (hot.getAttribute=='checked'){
  cold.getAttribute='unchecked';
}

if (no.getAttribute=='checked'){
  cold.getAttribute='unchecked';
  hot.getAttribute='unchecked';
  item.getAttribute='unchecked';
}

/*
let resto = document.getElementsByName('resto');
let restoValue;
for(let i = 0; i < resto.length; i++){
    if(rates[i].checked){
        restoValue = resto[i].value;
    }
}
*/
