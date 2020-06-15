<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Preview</title>
    </head>

    <body>
        <form action='image/upload' method='post' encType="multipart/form-data">

            <!-- novo elemento! -->
            <input class="file-button" type="button" value="Adicionar imagem do local">

            <!-- invisível -->

            <input class="file-chooser" type="file" accept="image/*" hidden>
            <img class="preview-img">
            <input type="submit" value="upload">
        </form>
        
        <script>
            // nosso script fica aqui!
            const $ = document.querySelector.bind(document);

            const previewImg = $('.preview-img');
            const fileChooser = $('.file-chooser');
            const fileButton = $('.file-button');

            fileButton.onclick = () => fileChooser.click();

            fileChooser.onchange = e => {
                const fileToUpload = e.target.files.item(0);
                const reader = new FileReader();
                reader.onload = e => previewImg.src = e.target.result;
                reader.readAsDataURL(fileToUpload);
            };

    </script>    
    </body>
</html>



