function preguntarRecaudar() {

	if(confirm("Desea recaudar la mensualidad ?")){

		return true;

	}

	else{

		return false;

		}

}



function preguntarNC() {

	if(confirm("Los datos son correctos?")){

		return true;

	}

	else{

		return false;

		}

}





function validarContrasenas(form)

{

    if(form.password.value == form.confirmarpassword.value)

    { form.submit();

	alert("Registro exitoso");

	}

    else

    {

    alert("La contraseña no coincide.");

    return false;

    }

}

function confirmarContrasenas(form)

{

    if(form.nueva.value == form.confirmar.value)

    { form.submit();

	
	}

    else

    {

    alert("La confirmación contraseña no coincide.");

    return false;

    }

}



function validacionFecha() {



  if (buscador.ini2.value == ""){



        alert("Debe seleccionar una fecha Inicio")

	

	}

  if (buscador.fin.value == ""){



        alert("Debe seleccionar una fecha Fin")



    }

	else

		return true;

	

}

function mensajeErrorLogin(){
	 alert("Usuario o contraseña invalida")
	
}