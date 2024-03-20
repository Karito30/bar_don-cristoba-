const submit_button = document.querySelector(".button")
submit_button.onclick = () => {
    e.preventDefault();
   // all input data recived this variables  
    const Pname = document.getElementById("Pname").value ;
    const Sname = document.getElementById("Sname").value ;
    const Lname = document.getElementById("Lname").value ;
    const Aname = document.getElementById("Aname").value ;
    const email = document.getElementById("email").value ;
    const pass = document.getElementById("pass").value ;
    const cpass = document.getElementById("cpass").value ;

    //now store this data in your web browser store
    localStorage .setItem('PrimerNombre',Pname);
    localStorage .setItem('SegundoNombre',Sname);
    localStorage .setItem('PrimerApellido',Lname);
    localStorage .setItem('SegundoApellido',Aname);
    localStorage .setItem('CorreoElectronico',email);
    localStorage .setItem('Contraseña',pass);
    localStorage .setItem('Cpassword',cpass);

    //now wtite some condition
    if(Pname =="" && Sname == "" && Lname == "" && Aname == "" && email =="" && pass == "" && cpass == ""){
        // let's change this alert systema
        swal ( "Opps..!", "este campo debe de estar lleno","error");
    }
    else{
        if(pass !== cpass ){
            swal ( "Opps..!", "la contraseña no coincide!","error");
        }else{
            swal ( "¡Buen trabajo!","Registro exitoso!","success");
         
        }
    }

}
