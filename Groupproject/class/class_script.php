<?php
    echo '<script type="text/javascript">   

    function previewImage() {
        const fileInput = document.getElementById("img_file");
        const imagePreview = document.getElementById("img_preview");
        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            // Read and display the selected image
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);

            document.getElementById("img_preview").style.display="block";
        }
    }

    function closeImage() {
        document.getElementById("img_preview").style.display="none";
    }
    </script>'
?>