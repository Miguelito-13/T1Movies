<script type="text/javascript">
    // Seat Reservation Form Checkbox
    window.updateCount = function() {
        const counter = $(".checkCounter:checked").length;
        document.getElementById("checkCount").innerHTML = counter;

        // Subtotal
        let x = counter;
        let y = 300; //price
        let subTotal = x * y;
        document.getElementById("printSubtotal").innerHTML = subTotal;

        //Total
        let a = subTotal;
        let b = 0;
        let total = a + b;
        document.getElementById("printTotal").innerHTML = total;

        //Total (after change)
        // let i = counter;
        // let j = 420; //price
        // let total = i*j;
        // document.getElementById("printTotal").innerHTML = total;
    };
</script>