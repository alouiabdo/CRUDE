let btn = document.querySelector("button");
let divDta = document.querySelector(".he");
let form = document.querySelector("form");
let inptyArray = [];
let typeN = "AddData"

btn.addEventListener("click", () => {
    data = fetch("getData.php")
        .then(response => response.text())
        .then(response => {
            divDta.innerHTML = response;
            modefie();
            document.body.removeChild(btn) // Remove event listener after button click
        })
        .catch(error => console.error('Error:', error)); // Error handling

    form.removeAttribute("style");
    form.innerHTML = `
        <label for="fn">FirstName:</label>
        <input type="text" name="fn">
        <label for="ln">LastName:</label>
        <input type="text" name="ln">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <input type="submit" id="he" value="Add Data">
    `;
});

function modefie() {
    let modef = document.querySelectorAll(".modefie");
    let dele = document.querySelectorAll(".delete")
    console.log(dele)
    let sub = document.getElementById("he");
    let ido = 0
    let FN = document.querySelectorAll(".FN")
    let LN = document.querySelectorAll(".LN")
    let EMAIL = document.querySelectorAll(".EMAIL")

    let height = screen.height;
    console.log(typeN)
    modef.forEach((e,i)=>{
        e.addEventListener("click", function () {
            typeN = "modefie"
            console.log(i)
            console.log(typeN)
            sub.value = "modefie";
            let id = e.getAttribute("alt");
            let req = new XMLHttpRequest();
            req.open("POST", "modefie.php");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("variabl=" + id+ "&sub="+ sub  );
            req.onload = () => {
                console.log(req.responseText);
                ido = req.responseText
            };
            form.elements.fn.value = FN[i].innerHTML
            form.elements.ln.value = LN[i].innerHTML
            form.elements.email.value = EMAIL[i].innerHTML
            window.scrollTo(0,height)
        });
    });
    dele.forEach((e,i)=>{
        e.addEventListener("click",function(){
            typeN = "delete"
            console.log(i)
            console.log(typeN)
            let id = e.getAttribute("alt");
            let req = new XMLHttpRequest();
            req.open("POST", "delete.php");
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send("variabl=" + id+ "&sub="+ sub  );
            req.onload = () => {
                console.log(req.responseText);
                ido = req.responseText
                document.location.reload()
            };
        })
    })

    sub.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent default form submission behavior
        var fn = form.elements.fn.value;
        var ln = form.elements.ln.value;
        var email = form.elements.email.value;

        if(typeN === "modefie"){
            if (fn === "" || ln === "" || email === "") {
                console.log("All fields are required.");
            } else {
                let req = new XMLHttpRequest();
                req.open("GET", "modefie.php?"+"ln=" + ln + "&fn=" + fn + "&email=" + email+"&ido="+ido);
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                req.send("ln=" + ln + "&fn=" + fn + "&email=" + email+"&ido="+ido);
                req.onload = () => {
                    console.log(req.responseText);
                };
            }
            function reloadPage() {
                // Reload the current page
                location.reload();
            }
            reloadPage()
        }else if(typeN == "delete"){

        }
    });
}
