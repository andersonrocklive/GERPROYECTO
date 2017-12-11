<?php
// Omitir errores
ini_set("display_errors", false);


// Incluimos nustro script php de funciones y conexión a la base de datos
include('includes/mainFunctions.inc.php');

if($errorDbConexion == false){
	// MAnda a llamar la función para mostrar la lista de usuarios
	$consultaUsuarios = consultaUsers($mysqli);
}
else
{
	// Regresa error en la base de datos
	$consultaUsuarios = '
		<tr id="sinDatos">
			<td colspan="5" class="centerTXT">ERROR AL CONECTAR CON LA BASE DE DATOS</td>
	   	</tr>
	';
}

?>
<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>:: Proyecto de Computing Cloud en PHP y MySQL ::</title>
<meta charset="utf-8" />
<link type="text/css" href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<link type="text/css" href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" href="css/master.css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery_ui/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery_ui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery-validation-1.10.0/lib/jquery.metadata.js"></script>
<script type="text/javascript" src="js/jquery-validation-1.10.0/localization/messages_es.js"></script>

<script type="text/javascript" src="js/mainJavaScript.js"></script>

</head>

<body>
<h2 align=center >Registro de Personal</h2>
<src="http://www.utn.edu.ec/web/uniportal/wp-content/uploads/2017/09/logo-UTN-2017.png" border="1" alt="Este es el ejemplo de un texto alternativo" width="100" height="100" >
		<div class="hide" id="agregarUser" Title="Agregar Usuario">
	    	<form action="" method="post" id="formUsers" name="formUsers">
	    		<fieldset id="ocultos">
	    			<input type="hidden" id="accion" name="accion" class="{required:true}"/>
	    			<input type="hidden" id="id_user" name="id_user" class="{required:true}" value="0"/>
	    		</fieldset>
				<fieldset id="datosUser">
					<p>Nombres</p>
					<span></span>
					<input type="text" id="usr_nombre" name="usr_nombre" placeholder="Nombre Completo" class="{required:true,maxlength:120} span3"/>
					<p>Puesto</p>
					<span></span>
					<input type="text" id="usr_puesto" name="usr_puesto" placeholder="puesto que desempeña" class="{required:true,maxlength:80} span3"/>
					<p>Nickname</p>
					<span></span>
					<input type="text" id="usr_nick" name="usr_nick" placeholder="nickname" class="{required:true,maxlength:25} span3"/>
					<p>Estado</p>
					<span></span>
					<select id="usr_status" name="usr_status" class="{required:true} span3">
						<option value="">Seleccione una opcion</option>
						<option value="Activo">Activo</option>
						<option value="Suspendido">Suspendido</option>	        	
					</select>
				<fieldset id="btnAgregar" style="text-align:center;">
					<input type="submit" id="continuar" value="Continuar" />
				</fieldset>

				<fieldset id="ajaxLoader" class="ajaxLoader hide">
					<img src="images/default-loader.gif">
					<p>Espere un momento...</p>
				</fieldset>
			</form>
	    </div>

	    <div id="dialog-borrar" title="Eliminar registro" class="hide">
			<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Este registro se borrará de forma permanente. ¿Esta seguro?</p>
		</div>
		
		<div id="wraper">
		    <section id="content">
		    	<div id="btnAddUser" class="center addUser">
		    		<button id="goNuevoUser" class="btn btn-inverse btn-small"><i class="icon-plus"></i> Agregar Usuario</button>
		    	</div>
				<div id="listaOrganizadores">
					<table id="listadoUsers" class="table table-striped table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th>Nombres</th>
								<th>Puesto</th>
								<th>Nickname</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody id="listaUsuariosOK">
							<?php echo $consultaUsuarios ?>
						</tbody>
					</table>
				</div>

		    </section>
 		</div>
  		<footer>
	        Powered by Dj Kleber || 2017
			<img src="http://www.utn.edu.ec/web/uniportal/wp-content/uploads/2017/09/logo-UTN-2017.png" border="1" alt="Este es el ejemplo de un texto alternativo" width="100" height="100">
		</footer>
</body>
</html>


