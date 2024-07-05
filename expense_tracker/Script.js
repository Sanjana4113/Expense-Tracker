document.addEventListener('DOMContentLoaded', function() {
  const expenseForm = document.getElementById('expenseForm');
  const expensesList = document.getElementById('expensesList');

  expenseForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const date = document.getElementById('date').value;
      const description = document.getElementById('description').value;
      const amount = document.getElementById('amount').value;

      if (!date || !description || !amount) {
          alert('Please fill in all fields.');
          return;
      }

      // Create a FormData object to send form data
      const formData = new FormData();
      formData.append('date', date);
      formData.append('description', description);
      formData.append('amount', amount);

      // AJAX request to send form data to PHP
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'connection.php', true);
      xhr.onload = function() {
          if (xhr.status === 200) {
              alert(xhr.responseText); 
              // Clear form fields after adding expense
              document.getElementById('date').value = '';
              document.getElementById('description').value = '';
              document.getElementById('amount').value = '';
              // Reload the page to update the expenses list
              location.reload();
          } else {
              alert('Error: ' + xhr.statusText);
          }
      };
      xhr.onerror = function() {
          alert('Request failed.');
      };
      xhr.send(formData);
  });

  // Attach click event listener to the entire expensesList element
  expensesList.addEventListener('click', function(event) {
      if (event.target.classList.contains('delete-btn')) {
          // Ensure clicked element has the 'delete-btn' class
          const expenseId = event.target.parentElement.querySelector('.expense-id').value;

          // Confirmation dialog using confirm()
          if (confirm('Are you sure you want to delete this expense?')) {
              // AJAX request to delete.php
              const xhr = new XMLHttpRequest();
              xhr.open('GET', `delete.php?action=delete&id=${expenseId}`, true);
              xhr.onload = function() {
                  if (xhr.status === 200) {
                      alert(xhr.responseText); // Alert the response from PHP
                      // Reload the page to update the expenses list
                      location.reload();
                  } else {
                      alert('Error: ' + xhr.statusText);
                  }
              };
              xhr.onerror = function() {
                  alert('Request failed.');
              };
              xhr.send();
          }
      }
  });
});
