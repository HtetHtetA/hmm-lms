<!DOCTYPE html>
<html>
<head>
  <title>Invoice Form</title>
  <script>
    let invoices = [];

    function calculateSubtotal(quantity, unitPrice) {
      return quantity * unitPrice;
    }

    function calculateTotal() {
      let total = 0;
      for (let i = 0; i < invoices.length; i++) {
        total += invoices[i].subtotal;
      }
      return total;
    }

    function saveInvoice() {
      const category = document.getElementById("category").value;
      const quantity = parseInt(document.getElementById("quantity").value);
      const unitPrice = parseFloat(document.getElementById("unitPrice").value);

      const subtotal = calculateSubtotal(quantity, unitPrice);
      const invoice = {
        category: category,
        quantity: quantity,
        unitPrice: unitPrice,
        subtotal: subtotal
      };

      invoices.push(invoice);
      resetForm();
      updateInvoiceTable();
    }

    function resetForm() {
      document.getElementById("category").value = "";
      document.getElementById("quantity").value = "";
      document.getElementById("unitPrice").value = "";
    }

    function updateInvoiceTable() {
      const table = document.getElementById("invoiceTable");
      const tbody = document.createElement("tbody");

      for (let i = 0; i < invoices.length; i++) {
        const invoice = invoices[i];

        const row = document.createElement("tr");
        const categoryCell = document.createElement("td");
        const quantityCell = document.createElement("td");
        const unitPriceCell = document.createElement("td");
        const subtotalCell = document.createElement("td");

        categoryCell.textContent = invoice.category;
        quantityCell.textContent = invoice.quantity;
        unitPriceCell.textContent = invoice.unitPrice;
        subtotalCell.textContent = invoice.subtotal;

        row.appendChild(categoryCell);
        row.appendChild(quantityCell);
        row.appendChild(unitPriceCell);
        row.appendChild(subtotalCell);

        tbody.appendChild(row);
      }

      table.replaceChild(tbody, table.tBodies[0]);

      const totalCost = calculateTotal();
      document.getElementById("totalCost").textContent = totalCost;
    }
  </script>
</head>
<body>
  <h1>Invoice Form</h1>
  <form>
    <label for="category">Product Category:</label>
    <select id="category">
      <option value="Category 1">Category 1</option>
      <option value="Category 2">Category 2</option>
      <option value="Category 3">Category 3</option>
    </select><br>

    <label for="quantity">Product Quantity:</label>
    <input type="number" id="quantity"><br>

    <label for="unitPrice">Product Unit Price:</label>
    <input type="number" step="0.01" id="unitPrice"><br>

    <button type="button" onclick="saveInvoice()">Save</button>
  </form>

  <table id="invoiceTable">
    <thead>
      <tr>
        <th>Category</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <div>
    Total Cost: <span id="totalCost"></span>
  </div>
</body>
</html>
