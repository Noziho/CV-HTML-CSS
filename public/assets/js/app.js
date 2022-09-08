const h1 = document.querySelector("h1");
let h2 = document.querySelectorAll("h2");
let section = document.querySelectorAll("section");
let labelLetters = document.querySelectorAll("span.letters");
const colors = ["red", "yellow", "green", "gray", "rebeccapurple", "purple", "aqua", "blue", "bisque", "beige"];
const fontFamily = ["Agency FB", "Alef", "Algerian", "Amiri", "Amiri Quran", "Arial", "Arial Black", "Arial Narrow"];
const card = document.querySelector("#card");

h1.animate([
        {
            opacity: 0
        },

        {
            opacity: 1
        }

    ],
2500);

h2.forEach(function (h2) {
    h2.style.opacity = "0";
})

setTimeout(function () {
    h2.forEach(function (h2){
        h2.animate([
            {
                opacity: 0,
            },
            {
                opacity: 1
            }
        ], 2500)
        h2.style.opacity = "1";
    }
    )
},2500)


section.forEach(function (section) {
   section.addEventListener("click", function () {
        section.classList.toggle("height");
    })


})

labelLetters.forEach(function (letters) {
    letters.addEventListener("mouseover", function () {
        letters.style.color = random(colors);
        letters.style.fontFamily = random(fontFamily);
        setTimeout(function () {
            letters.style.color = "black";
            letters.style.fontFamily = "";
        }, 300);
    })


})

function random (table) {
    let random = Math.trunc(Math.random() * table.length);
    return table[random];
}

card.addEventListener("click", flipCard);

function flipCard() {
    card.classList.toggle("flipCard");
}

