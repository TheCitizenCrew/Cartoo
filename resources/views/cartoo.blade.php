<!DOCTYPE HTML>
<html lang="fr" xmlns:th="http://www.thymeleaf.org">
<head>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Cartoo</title> 

    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/vendor/jquery-upload-file/css/uploadfile.css" />
    <link rel="stylesheet" href="/vendor/leaflet/leaflet.css" />
    <link rel="stylesheet" href="/vendor/Leaflet.markercluster/dist/MarkerCluster.Default.css" media="screen" />
    <link rel="stylesheet" href="/css/socialico.css" />
    <link rel="stylesheet" href="/css/cartoo.css" />
</head>
<body>
    <div class="container" id="container">
      <nav class="navbar navbar-fixed-top navbar-default" role="navigation">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cartoo</a>
          </div>

          <!-- Navigation -->
          <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <!-- Search -->
            <form class="navbar-form navbar-left" role="search">
            	<div class="form-group">
	              	<input type="text" class="form-control" placeholder="Recherche..." id="searchText" />
	        	    <button type="button" class="btn btn-primary btn-sm form-control" data-toggle="modal" data-target="#loginModal">Button</button>
	    	        <button type="button" class="btn btn-primary btn-sm form-control" data-toggle="modal" data-target="#addPoiIntroModal">Ajouter un Point</button>					
	    	        <button type="button" class="btn btn-primary btn-sm form-control" data-toggle="modal" data-target="#addPoiModal">Point</button>					
               </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" data-toggle="modal" data-target="#Credits">Crédits</a></li>
            </ul>
          </div>

          </nav>
      <div class="navbar-offset"></div>

      <!-- The Map -->
      <div id="theMap">The map...</div>
	</div>

	<!-- modal window to explain how to place a Poi -->

    <div class="modal fade" id="addPoiIntroModal" role="dialog" aria-labelledby="addPoiIntroModalLabel">
    	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="addPoiIntroModalLabel">Comment ajouter une contribution sur la carte ?</h4>
				</div>
				<div class="modal-body">
			        <p>Naviguez sur la carte jusqu'à l'endroit désiré puis cliquez pour ajouter un point et rédiger votre contribution.</p>
			        <p>Cliquez sur le bouton 'Ajouter !' pour démarrer.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="button" class="btn btn-primary" onclick="$('#addPoiIntroModal').modal('hide'); cartoo.addPOIStart(); return false;">Ajouter !</button>
				</div>
			</div>
    	</div>
    </div>

	<!-- modal window to display POI contribution form -->

    <div class="modal fade" id="addPoiModal" role="dialog" aria-labelledby="addPoiModalLabel">
    	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="addPoiModalLabel">Ajouter une contribution sur la carte:</h4>
				</div>
				<form id="addPoiForm" action="/addPoi" enctype="multipart/form-data" method="post">
				<div class="modal-body">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="addPoiFieldName">Nom:</label>
							<input type="text" id="addPoiFieldName" name="name" class="form-control" placeholder="Votre nom ou pseudo" minlength="2" required="required" value="Marcel Duchamps" />
							<span class="help-block">Votre nom ou pseudo qui sera affiché comme auteur de la contribution.</span>
						</div>
						<div class="form-group">
							<label for="addPoiFieldEmail">Email:</label>
							<input type="email" id="addPoiFieldEmail" name="email" class="form-control" placeholder="Votre adresse email" required="required" value="abc@internet.net" />
							<span class="help-block">Votre adresse email ne sera pas affichée, elle vous servira pour suivre ou modifier votre contribution.</span>							
						</div>
						<div class="form-group">
							<label for="addPoiFieldText">Texte:</label>
							<input type="text" id="addPoiFieldText" name="text" class="form-control" placeholder="Ici le contenu de votre contribution" required="required" value="et voilà là là" />
							<span class="help-block">Le texte de votre contribution</span>							
						</div>
						<div class="form-group">
							<label for="addPoiFieldImages">Image:</label>
							<span class="help-block">Un photo pour illustrer votre contribution</span>							
							<div id="addPoiFieldImage">Upload</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary" >Enregistrer</button>
					<!-- button type="button" class="btn btn-primary" onclick="if( cartoo.addPOI($('#addPoiForm')) ){ $('#addPoiModal').modal('hide'); } return false;" >Enregistrer</button -->
				</div>
				</form>
			</div>
    	</div>
    </div>

	<!-- Login window -->

    <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="loginModalLabel">
    	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="loginModalLabel">Connectez vous</h4>
				</div>
				<div class="modal-body">
			        <ul class="soci-ul">
						<li class="soci-li"><a href="/oauth/facebook/authorize"><span class="soci soci-4x soci-facebook" /></a></li>
			        	<li class="soci-li"><a href="/oauth/google/authorize"><span class="soci soci-4x soci-google" /></a></li>
			        	<li class="soci-li"><a href=""><span class="soci soci-4x soci-linkedin" /></a></li>
			        </ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				</div>
			</div>
    	</div>
    </div>

    <script src="/vendor/jquery.min.js"></script>
    <script src="/vendor/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>

    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/vendor/leaflet/leaflet.js"></script>
    <script src="vendor/Leaflet.markercluster/dist/leaflet.markercluster.js"></script>
	<script src="vendor/leaflet-hash.js"></script>

    <script src="/vendor/jquery-form/jquery.form.js"></script>
    <script src="/vendor/jquery-upload-file/js/jquery.uploadfile.min.js"></script>

    <script src="/javascript/CartooMap.js"></script>
    <script src="/javascript/Cartoo.js"></script>

    <script>
    "use strict";
    var cartoo ;
    $(function()
	{
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});

		cartoo = new Cartoo({
			mapId: 'theMap',
			btnId_AddPOI: 'btnAddPoi',
			addPoiModal: 'addPoiModal'
		});

		$('#addPoiFieldImage').uploadFile({
			url: '/upload',
			autoSubmit: false,
			fileName: 'image',
			returnType: 'json',
			acceptFiles: 'image/*',
			multiple: false,
			maxFileCount: 1,
			allowDuplicates: false,
			showPreview: true,
			previewHeight: '120px',
			previewWidth: '120px',

			uploadStr: 'Sélectionnez un fichier',
			dragDropStr: 'Glissez déposez',
			sizeErrorStr: ' est trop gros. La taille maximum est: ',
			multiDragErrorStr: 'Le glisser/déposer de plusieurs fichiers n\'est pas permis.',
			maxFileCountErrorStr:' est en trop. Nombre de fichiers maximum: '
		});

		$('#addPoiForm').ajaxForm({
			success: function( data )
			{ 
				console.log('Submit success'); 
				console.log( data );
			}, 
			error: function( data )
			{ 
				console.log('Submit error'); 
				console.log( data );
			} 
		});

	});

    </script>

</body>
</html>
