// get url parameters
const queryString = window.location.search

// extract form-id and password form url-parameters
const formId = new URLSearchParams(queryString).get('id')

// get poll questions from server
if (formId !== null) {
	window.location.replace('showPaste.html?id=' + formId)
}
