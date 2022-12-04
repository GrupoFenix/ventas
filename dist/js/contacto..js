
/**
 * Controlar error de  campos requeridos
*/
var campos = document.getElementsByTagName('input');
for (campo  in  campos ){
    campos[campo].onkeypress = (e)=> {
        let id = e.target.name
        if (e.target.value  != '' ){
            document.getElementsByClassName(id)[0].innerHTML="";
        }
        
    }
}