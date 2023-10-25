

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


