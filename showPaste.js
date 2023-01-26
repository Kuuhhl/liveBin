// get url parameters
const queryString = window.location.search

// extract form-id and password form url-parameters
const formId = new URLSearchParams(queryString).get('id')

// update title of site
document.title = 'liveBin - Paste ' + formId

// update header text
document.getElementById('header').innerHTML = 'liveBin - Paste ' + formId

// get poll questions from server
const fetchPromise = fetch('fetch_paste.php?id=' + formId)
fetchPromise
	.then((response) => {
		return response.json()
	})
	.then((data) => {
		document.getElementById('textBox').innerHTML = data
	})
	.catch((error) => {
		document.getElementById('textBox').innerHTML = 'Paste does not exist.'
	})
