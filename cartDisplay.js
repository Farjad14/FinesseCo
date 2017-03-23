<script>
	function myCart() {
            var request = $.ajax({
                url: "api/api.php",
                method: "POST",
                data: JSON.stringify({
                    type: "cart"
                }),
                contentType: "application/json; charset=UTF-8",

            });
            request.done(function(msg) {
		alert("display the shit bitch!");
                var returned = JSON.parse(msg);
                for (var x = 1; x <= returned.length; x++) {
                    var id = "t" + x;
                    document.getElementById(id).value = returned[x - 1].product + " - " + returned[x - 1].price;
                }

            });
        }
	$(function() {
           myCart();
        });
</script>

