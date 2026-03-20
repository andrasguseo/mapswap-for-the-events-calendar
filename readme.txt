=== MapSwap for The Events Calendar ===
Contributors: aguseo
Donate link: https://paypal.me/guseo
Tags: openstreetmap, map, events, calendar
Requires at least: 6.7
Tested up to: 6.9
Requires PHP: 8.0
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

MapSwap for The Events Calendar replaces Google Maps with an alternative map provider on the single event pages.

== Description ==

MapSwap for The Events Calendar replaces Google Maps with an alternative map provider on the single event pages. Currently, it supports OpenStreetMap.

It requires the [Leaflet Map](https://wordpress.org/plugins/leaflet-map/) plugin and [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/).

Want to replace maps on Venue pages and the Map view as well? Download the beta version of MapSwap Pro at [andrasguseo.com/mapswap-for-the-events-calendar](https://andrasguseo.com/mapswap-for-the-events-calendar) and give it a try!

= Requirements =

* [Leaflet Map](https://wordpress.org/plugins/leaflet-map/)
* [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/)

== Installation ==

Install and activate like any other plugin!

* You can upload the plugin zip file via the *Plugins ‣ Add New* screen.
* You can unzip the plugin and then upload to your plugin directory (typically _wp-content/plugins_) via FTP.
* Once it has been installed or uploaded, visit the main plugin list and activate it.

== Frequently Asked Questions ==

= Does this plugin work without The Events Calendar? =

No, this plugin requires [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/) to be installed and activated as it specifically replaces the maps on single event pages.

= Do I need the Leaflet Map plugin? =

Yes, the [Leaflet Map](https://wordpress.org/plugins/leaflet-map/) plugin is required for this plugin to function properly. OpenStreetMap is rendered using the Leaflet library provided by the [Leaflet Map](https://wordpress.org/plugins/leaflet-map/) plugin.

= What map providers are currently supported? =

At the moment, only OpenStreetMap is supported. There are plans to add support for other map providers in the future. If you want support for a specific provider, please let us know in the [Support Forum](https://wordpress.org/support/plugin/mapswap-for-the-events-calendar/).

= Will this affect Google Maps on other parts of my site? =

No, this plugin only replaces Google Maps on single event pages within [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/) only. Other Google Maps instances on your site remain unchanged.

= Do I need a Google Maps API key anymore? =

No, OpenStreetMap does not require an API key, which is one of the benefits of using this plugin. You can remove your Google Maps API key if you're only using it for [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/).

= Can I customize the map appearance or zoom level? =

The plugin includes settings for zoom control, zoom level for single events, and map container height and width that can be configured.

= Does this work with both the default and custom Google Maps configurations? =

Yes, the plugin replaces maps whether you're using [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/)'s default Google Maps setup or a custom Google Maps API key.

= Does this work with The Events Calendar Pro? =

Yes, it should work with both the free and Pro versions of [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/). Note however, that this plugin does not replace maps provided by Events Calendar Pro (e.g., Map view, Venue page).

= Will this work with my theme? =

Yes, since it hooks into [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/)'s template system, it should work with any theme that properly supports [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/).

= The map is not showing on my event pages. What should I check? =

Ensure both [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/) and [Leaflet Map](https://wordpress.org/plugins/leaflet-map/) plugins are installed and activated. Check that your event has a valid venue with address/coordinates set.

= Can I revert to Google Maps? =

Yes, simply deactivate or uninstall this plugin, and Google Maps will be restored on your event pages.

= Does this affect event location data or geocoding? =

No, this plugin only changes the map display. All venue data, geocoding, and location functionality from [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/) remains unchanged.

= What if I experience problems? =

We're always interested in your feedback. The [Support](https://wordpress.org/support/plugin/mapswap-for-the-events-calendar/) page is the best place to flag any issues. We do our best to respond to all issues.

== External Services ==

This plugin connects to OpenStreetMap to display an interactive map on single event pages. When a visitor views an event page with a venue address, the plugin generates a link to OpenStreetMap using that address so the map can be rendered.

**What data is sent:** The venue address entered in The Events Calendar is included in the request URL sent to OpenStreetMap's servers.

**When it is sent:** Every time a visitor loads a single event page that has a venue with an address.

**Service provider:** OpenStreetMap Foundation

* Website: https://www.openstreetmap.org
* Terms of Use: https://wiki.osmfoundation.org/wiki/Terms_of_Use
* Privacy Policy: https://wiki.osmfoundation.org/wiki/Privacy_Policy

== Changelog ==

= [1.1.0] 2026-03-20 =

* Feature - Added a setting to enable/disable the plugin functionality without having to deactivate it.
* Feature - Added a Settings link on the Plugins page to allow easy access to the plugin settings.
* Tweak - Added default placeholders for zoom level, map height, and map width settings.

= [1.0.0] 2026-03-03 =

* Initial release
