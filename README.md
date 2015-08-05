# Download
> Force downloads in your Statamic site.

## Installation

* Copy `hooks.download.php` and `pi.download.php` into `_add-ons/download/`

## Usage

Create a download URL by using the plugin tag:

~~~
<a href="
  {{ download file="/assets/IMG1234.jpg" as="photo.jpg" }}
">Download Photo</a>
~~~

By default this now requires the visitor to be logged in to download the file. If you want to allow non-logged-in visitor, use `logged_in=false` & `override=your-override-key`.

Set the `override` key in the add-on's config file.

The `file` parameter can also be `filename` or `url`. Whichever you prefer.  
The `as` parameter is optional. This will let you control the filename of the downloaded file.