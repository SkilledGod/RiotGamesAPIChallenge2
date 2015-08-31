function getAbsolutePath(filename) {
var scriptFilename = filename;
var rootPath = ''; // Will contain the path to your file

$('script').each(function() {
    var $script = $(this);

    if ($script.attr('src') && $script.attr('src').indexOf(scriptFilename) > -1) {
        rootPath = $script.attr('src').split(scriptFilename)[0];

        return false;
    }
});
return rootPath;
}
