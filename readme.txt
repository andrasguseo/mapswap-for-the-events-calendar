=== OpenStreetMap for The Events Calendar ===
Contributors: aguseo
Donate link: https://paypal.me/guseo
Tags: openstreetmap, map, events, calendar
Requires at least: 6.7
Tested up to: 6.9.1
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPL version 3 or any later version
License URI: https://www.gnu.org/licenses/gpl-3.0.html

OpenStreetMap for The Events Calendar replaces Google Maps with OpenStreetMap on the single event pages.

== Description ==

OpenStreetMap for The Events Calendar replaces Google Maps with OpenStreetMap on the single event pages.

It requires the [Leaflet Map](https://wordpress.org/plugins/leaflet-map/) plugin and [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/).

== Installation ==

Install and activate like any other plugin!

* You can upload the plugin zip file via the *Plugins ‣ Add New* screen.
* You can unzip the plugin and then upload to your plugin directory (typically _wp-content/plugins_) via FTP.
* Once it has been installed or uploaded, visit the main plugin list and activate it.

== Frequently Asked Questions ==

= Does this plugin work without The Events Calendar? =

No, this plugin requires The Events Calendar to be installed and activated as it specifically replaces the maps on single event pages.

= Do I need the Leaflet Map plugin? =

Yes, the Leaflet Map plugin is required for this plugin to function properly. OpenStreetMap is rendered using the Leaflet library provided by the Leaflet Map plugin.

= Will this affect Google Maps on other parts of my site? =

No, this plugin only replaces Google Maps on single event pages within The Events Calendar only. Other Google Maps instances on your site remain unchanged.

= Do I need a Google Maps API key anymore? =

No, OpenStreetMap does not require an API key, which is one of the benefits of using this plugin. You can remove your Google Maps API key if you're only using it for The Events Calendar.

= Can I customize the map appearance or zoom level? =

The plugin includes settings for zoom control, zoom level for single events, and map container height and width that can be configured.

= Does this work with both the default and custom Google Maps configurations? =

Yes, the plugin replaces maps whether you're using The Events Calendar's default Google Maps setup or a custom Google Maps API key.

= Does this work with The Events Calendar Pro? =

Yes, it should work with both the free and Pro versions of The Events Calendar.

= Will this work with my theme? =

Yes, since it hooks into The Events Calendar's template system, it should work with any theme that properly supports The Events Calendar.

= The map is not showing on my event pages. What should I check? =

Ensure both The Events Calendar and Leaflet Map plugins are installed and activated. Check that your event has a valid venue with address/coordinates set.

= Can I revert back to Google Maps? =

Yes, simply deactivate or uninstall this plugin and Google Maps will be restored on your event pages.

= Does this affect event location data or geocoding? =

No, this plugin only changes the map display. All venue data, geocoding, and location functionality from The Events Calendar remains unchanged.

= What if I experience problems? =

We're always interested in your feedback. The [Issues](https://github.com/andrasguseo/openstreetmap-for-tec/issues) page is the best place to flag any issues. We do our best to respond to all issues.

== Changelog ==

= [1.0.0] 2026-02-14 =

* Initial release
