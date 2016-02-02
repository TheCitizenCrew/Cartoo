/**
 * The Cartoo's map,
 * managed by the Cartoo's main controller (cf. Cartoo.js)
 */
"use strict";

function CartooMap( options )
{
	/**
	 * used in event context
	 */
	var self = this;
	var newLayer ;

	this._construct = function()
	{
		this.map = L.map( options.mapId, {zoomControl: true});          

		// Background Maps

		var osmUrl='http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png';
		var osmAttrib='Map data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>, Map tiles © <a href="http://openstreetmap.fr">OSM_Fr</a>';
		var osm = new L.TileLayer(osmUrl, {
			minZoom: 1, 
			maxZoom: 20, 
			attribution: osmAttrib
		});
		this.map.addLayer(osm);

		this.newLayer = new L.LayerGroup().addTo( this.map );

		this.markers = new L.MarkerClusterGroup().addTo(this.map);

		this.fitDataBounds();

		// Leaflet-hash lets you to add dynamic URL hashes to web pages with Leaflet maps.
		// You can easily link users to specific map views.
		// Warning: keep this instruction at the end of initialization - Cyrille
		var hash = new L.Hash( this.map );

	}

	this.addNewPoi = function( poiLocation, formHtml )
	{
        var marker = new L.Marker( poiLocation );
        self.newLayer.clearLayers();
        self.newLayer.addLayer( marker );

        marker.bindPopup( formHtml ).openPopup();
	}

	this.removeNewPoi = function()
	{
		self.newLayer.clearLayers();
	}

	this.fitDataBounds = function()
	{
		var bounds = self.markers.getBounds();
		if( bounds.isValid() )
		{
			self.map.fitBounds( bounds );
		}
		else
			this.map.setView([47.365, 0.633], 10);
	}

	// Call constructor
	this._construct();
}
