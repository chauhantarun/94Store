<script>

function fn_Add_Cust(element) {
	window.location.href = "/index.php?cust_type=" + element.id;
}

function fn_Add_Prod(element) {
	window.location.href = window.location.href + "&prod_type=" + element.id;
}
</script>