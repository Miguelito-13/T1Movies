<div class="container custom-users-profile">
    <div class="row">
        <div class="col-12 mb-3 mx-auto px-3 py-3 custom-transaction-history">
            <table class="table table-hover table-striped">
                <tbody>
                    <thead>
                        <th class="transaction-table-subtitle">DATE</td>
                        <th class="transaction-table-subtitle">SEAT PLAN</td>
                        <th class="transaction-table-subtitle">NO. OF TICKETS</td>
                        <th class="transaction-table-subtitle">TOTAL</td>
                    </thead>

                    <!-- PHP: If there are previous transactions, print this table. Else, print: "No Previous Transactions" -->
                    <tr>
                        <td>00/00/0000</td> <!-- insert php for date -->
                        <td>Regular</td>
                        <td>
                            <div id="checkCount">0</div>
                        </td>
                        <td>
                            <div>₱<span id="printTotal">0</span>.00</div> <!-- checkCount * price -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>