// get url parameters
const queryString = window.location.search

// extract form-id from url-parameters
const formId = new URLSearchParams(queryString).get('id')

// update title of site
document.title = 'liveBin - Paste ' + formId

// update header text
document.getElementById('header').textContent = 'liveBin - Paste ' + formId

// get poll questions from server
const fetchPromise = fetch('fetch_paste.php?id=' + formId)
fetchPromise
	.then((response) => {
		return response.json()
	})
	.then((data) => {
		document.getElementById('textBox').textContent = data
	})
	.catch((error) => {
		document.getElementById('textBox').textContent = 'Paste does not exist.'
	})
