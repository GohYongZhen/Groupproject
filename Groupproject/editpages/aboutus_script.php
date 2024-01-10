<?php
    echo '<script type="text/javascript">   
    function makeTableScroll() {
        // Constant retrieved from server-side via JSP
        var maxRows = 2;

        var table = document.getElementById("admin_table");
        var wrapper = table.parentNode;
        var rowsInTable = table.rows.length;
        var height = 0;
        if (rowsInTable > maxRows) {
            for (var i = 0; i < maxRows; i++) { 
                height += table.rows[i].clientHeight;
            }
            wrapper.style.height = height + "px";
        }
    }

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