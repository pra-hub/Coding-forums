let textChange = document.getElementById('textChange');
let content = textChange.innerText;

textChange.addEventListener('mouseenter', () => {
    textChange.textContent = "View Profile";
})
textChange.addEventListener('mouseleave', () => {
    textChange.innerText = content;
});