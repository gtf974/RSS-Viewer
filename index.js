const left = document.getElementById("left-content");
const right = document.getElementById("right-content");
const button1 = document.getElementById("submit-1");
const button2 = document.getElementById("submit-2");
const hidden1 = document.getElementById("memory-1");
const hidden2 = document.getElementById("memory-2");
const form1 = document.getElementById("form-1");
const form2 = document.getElementById("form-2");

const submit = (el) => {
    console.log(el.parentNode);
}

button1.addEventListener("click", () => {
    if (right.innerHTML != "") hidden1.value = right.innerHTML;
    form1.submit();
});

button2.addEventListener("click", () => {
    if (left.innerHTML != "") hidden2.value = left.innerHTML;
    form2.submit();
});