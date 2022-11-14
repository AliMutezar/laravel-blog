const title = document.querySelector("#title");
const slug = document.querySelector("#slug");

title.addEventListener("change", function() {
    let preslug = title.value;
    preslug = preslug.replace(/ /g,"-");
    slug.value = preslug.toLowerCase();
});

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
});