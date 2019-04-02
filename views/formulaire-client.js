function verifier(champ)
{
  if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }

}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifCode(champ)
{
	if (champ.value <1000 ||champ.value > 2500 )
	{
		surligne(champ,true);
		return false;
	}
	else
	{
		 surligne(champ, false);
      return true;
	}
}


function verifForm(f)
{
   var nomOk = verifier(f.nom);
  // var prenomOk = verifier(f.prenom);
   var mailOk = verifMail(f.email);
   var codeOk = verifCode(f.code);
   
   if(nomOk  && mailOk && code)
      {
      	alert("shiha");
      	return true;
      }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function verifform()
{
	let teste=true;
	let nom, mail, code;
	nom=clientf.nom.value;
	if(nom.length < 2 || nom.length > 25)
   {
   		//alert("faux");
   		teste=false;
    //  surligne(champ, true);
      
   }

   mail=clientf.email.value;
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(mail))
   {
   //	alert("Cette adresse mail est incorrecte");
   teste=false;
     // surligne(champ, true);
      
   }
code=clientf.codep.value;

if (code <1000 ||code > 2500 )
	{
		//surligne(champ,true);
		teste=false;
	}

   if (teste===false)
   	alert("Verifiez vos informations.");

}