const pwShow = document.querySelector(".fas"),
creacionPw = document.querySelector("#creacionPw"),
alertaTextoPw = document.querySelector(".texto"),
btnPw = document.querySelector("#button");

pwShow.addEventListener("click", ()=>{
 if((creacionPw.type === "password")){
    creacionPw.type = "text";    
    pwShow.classList.replace("fa-eye-slash", "fa-eye");
 }else {
    creacionPw.type = "password";    
    pwShow.classList.replace("fa-eye", "fa-eye-slash");
 }
}); 



    