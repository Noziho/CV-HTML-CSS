const h1 = document.querySelector("h1");
let h2 = document.querySelectorAll("h2");
let section = document.querySelectorAll("section");
let labelLetters = document.querySelectorAll("span.letters");
const colors = ["red", "yellow", "green", "gray", "rebeccapurple", "purple", "aqua", "blue", "bisque", "beige"];
const fontFamily = ["Agency FB", "Alef", "Algerian", "Amiri", "Amiri Quran", "Arial", "Arial Black", "Arial Narrow"];
const card = document.querySelector("#card");
const navbar = document.querySelector("#navbar");
const dl = document.querySelector("dl");

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
        section.style.minHeight = "30rem";
    })

    section.addEventListener("dblclick", function () {
        section.style.minHeight = "4rem";
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


fetch("ul.json")
    .then (response => response.json())
    .then (response => {
        console.log(response);
        let ul = document.createElement(response.Element.name);
        let li = document.createElement(response.Element.secondElement);
        let a = document.createElement(response.Element.thirdElement);
        a.href="contact.html";
        a.innerHTML="Contact";
        navbar.append(ul);
        ul.append(li);
        li.append(a);
    });

fetch("dd.json")
    .then (response => response.json())
    .then (response => {
        console.log(response);
        let jsonDD = document.createElement(response.Element.name);
        jsonDD.innerHTML = response.Element.content;
        dl.append(jsonDD);

    })

