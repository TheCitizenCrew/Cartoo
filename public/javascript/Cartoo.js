/**
 * The Cartoo's main controller
 */
"use strict";

function Cartoo( options )
{
	this.options = options ;

	/**
	 * used in event context
	 */
	var self = this;

	this._construct = function()
	{

		self.map = new CartooMap(
		{
			mapId: options.mapId
		});

		$('#'+self.options.addPoiModal ).on('hidden.bs.modal', function (e)
		{
			self.addPOICancel();
		});

		//$('#'+options.btnId_AddPOI).on( 'click', self.addPOIStart );
	}

	this.addPOIStart = function()
	{
		self.map.map.on('click', self.addPOIMapClick );
		$( '#'+self.options.mapId ).css( 'cursor', 'crosshair' );
		return false;
	}

	this.addPOICancel = function()
	{
		self.map.map.off('click', self.onMapClick );
		$( '#'+self.options.mapId ).css( 'cursor', '' );
		self.map.removeNewPoi();
		return false ;
	}

	this.addPOIMapClick = function( e )
	{
		var poiLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);

		// Prépare le formulaire
		// doc: http://jqueryvalidation.org/validate
		//
		$('#'+self.options.addPoiModal+' form').validate(
		{
			//debug: true,
			errorElement: 'span',
		    errorClass: 'help-block has-error',
			submitHandler: function( form )
			{
				console.log('submitHandler()');
				//$(form).ajaxSubmit();
			},
			invalidHandler: function(event, validator)
			{
				console.log('invalidHandler()');
				// 'this' refers to the form
				var errors = validator.numberOfInvalids();
				console.log( 'errors: ', errors );
			},
			highlight: function(element)
			{
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element)
			{
				$(element).closest('.form-group').removeClass('has-error');
			},
		});

		$('#'+self.options.addPoiModal).modal();

	}

	this.addPOI = function( form )
	{
		form.submit();
		return false ;
	}

	// Call the constructor
	self._construct();

}
