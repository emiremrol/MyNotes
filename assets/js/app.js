

const viewPasswordBtns = document.querySelectorAll(".visiblePass");
viewPasswordBtns.forEach(btn => {
    btn.addEventListener("click", (e)=>{
        e.preventDefault();
        const input = btn.previousElementSibling;
        if(input.type === "password"){
            input.type = "text";
        }else{
            input.type = "password";
        }
    })
})

let pagLinks = document.querySelectorAll(".page-item .page-link");
let pageId = document.body.id;
pagLinks[pageId].classList.add('active');
