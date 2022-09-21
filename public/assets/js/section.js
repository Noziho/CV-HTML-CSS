const flagSection = document.querySelector("#flagSection");

if (flagSection) {
    fetch('/?c=section&a=get-all', {method: 'POST'})
        .then(response => response.json())
        .then(response => {
            for (let i = 0; i < response.length; i++) {
                flagSection.innerHTML += "<section><h2>" + response[i]['title'] + "</h2>" + "<div class='content'>" + response[i]['content'] + "</div></section>" ;


                let sections = document.querySelectorAll("section");

                sections.forEach(function (section) {
                    section.addEventListener("click", function () {
                        section.classList.toggle("height");
                    })

                });
            }
        })
}