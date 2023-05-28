// Get references to the search components
const searchInput = document.querySelector('.search-input');
const searchSelect = document.querySelector('.form-select');
const searchButton = document.querySelector('.btn-primary');

// Add event listener to the search button
searchButton.addEventListener('click', performSearch);

// Function to handle the search action
function performSearch() {
  // Get the search query and selected search option
  const query = searchInput.value;
  const option = searchSelect.value;

  // Perform the search based on the query and option
  console.log('Performing search...');
  console.log('Search Query:', query);
  console.log('Search Option:', option);

  // Clear the search input
  searchInput.value = '';
}

// Additional functionality can be added, such as capturing user input on pressing Enter key
searchInput.addEventListener('keydown', function (event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    performSearch();
  }
});
