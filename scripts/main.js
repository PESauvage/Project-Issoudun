const scrollButton = document.querySelector('.btn');
const hero = document.querySelector('.hero');
const height = document.querySelector('.hero').offsetHeight

console.log(height);

scrollButton.addEventListener('click', () => window.scrollTo({
	top: height,
	behavior: 'smooth',
}));

