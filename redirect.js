function redirect(page) {
    var URI = "http://" + location.hostname + ":" + location.port + "/" + page;
    window.location.href= URI;
}