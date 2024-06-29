document.addEventListener('DOMContentLoaded', function() {
    const expenseForm = document.getElementById('expenseForm');
    const expenseList = document.getElementById('list');

    expenseForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const date = document.getElementById('date').value;
        const description = document.getElementById('description').value;
        const amount = document.getElementById('amount').value;

        if (!date || !description || !amount) {
            alert('Please fill in all fields.');
            return;
        }

        const listItem = document.createElement('li');
        listItem.innerHTML = `
            <div>Date: ${date}</div>
            <div>Description: ${description}</div>
            <div>Amount: $${amount}</div>
        `;
        expenseList.appendChild(listItem);

        // Clear form fields after adding expense
        document.getElementById('date').value = '';
        document.getElementById('description').value = '';
        document.getElementById('amount').value = '';
    });
});

