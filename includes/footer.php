</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>

</div>

<!-- JS ============================================ -->
<script>
$(document).ready(function() {
    addtocart = function(product) {
        var id_product = product.dataset.product;

        $.ajax({
            url: "ajax.php?task=addtocart",
            type: "post",
            dataType: "text",
            data: {
                id: id_product
            },
            success: function(result) {
                alert(result);
            }
        });
    }
});
</script>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="../js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="../js/datatables-simple-demo.js"></script>

</body>


</html>