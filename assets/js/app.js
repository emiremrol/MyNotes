

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

const registerForm = document.forms['register_form'];
const firstName = registerForm['first_name'];
const lastName = registerForm['last_name'];
const username = registerForm['username'];
const email = registerForm['email'];
const password = registerForm['password'];
const confirmPass = registerForm['confirm_password'];

const signUp = registerForm['register'];

// registerForm.addEventListener("change", (e)=>{
//
//
// })

