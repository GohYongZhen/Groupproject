<?php
    echo '<script>   
    function makeTableScroll() {
        // Constant retrieved from server-side via JSP
        var maxRows = 10;

        var table = document.getElementById("message_table");
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

    document.addEventListener("DOMContentLoaded", ()=>{
        const rows = document.querySelectorAll("tr[data-href]");
            rows.forEach(row =>{
                row.addEventListener("click",() =>{
                    window.location.href=row.dataset.href;
                });
            });
        });
        
    </script>'
?>