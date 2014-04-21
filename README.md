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

The `file` parameter can also be `filename` or `url`. Whichever you prefer.  
The `as` parameter is optional. This will let you control the filename of the downloaded file.