const h1 = document.querySelector("h1");
let h2 = document.querySelectorAll("h2");
let section = document.querySelectorAll("section");

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

