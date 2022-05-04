$(".imagem").change(function(event) {
    var x = URL.createObjectURL(event.target.files[0]);
    $("#upload-img").attr("src", x);
});

$(".imagemLivro").change(function(event) {
    var x = URL.createObjectURL(event.target.files[0]);
    $("#upload-img-livro").attr("src", x);
});

$(".imagemCapa").change(function(event) {
    var x = URL.createObjectURL(event.target.files[0]);
    $("#upload-img-capa").attr("src", x);
});