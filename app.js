var content = document.getElementById('content');

function onMapClick(e) {
	var formData = new FormData();
	formData.append('name', document.querySelector('input[name="name"]').value);
	formData.append('description', document.querySelector('input[name="description"]').value);
	formData.append('latitude', e.latlng.lat.toFixed(4));
	formData.append('longitude', e.latlng.lng.toFixed(4));

// Fetch the data from the API
fetch('api.php')
	.then(function(response) {
		return response.json();
	})
	.then(function(data) {
		// Create HTML for each post
		var html = '';
		for (var i = 0; i < data.length; i++) {
			html += '<article>';
			html += '<h2>' + data[i].title + '</h2>';
			html += '<p>' + data[i].content + '</p>';
			html += '</article>';
		}
		// Update the content
		content.innerHTML = html;
	});

// Register the service worker
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('service-worker.js');
}
}/*
// Register the service worker
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('service-worker.js');
}

function onMapClick(e) {
  var formData = new FormData();
  formData.append('name', document.querySelector('input[name="name"]').value);
  formData.append('description', document.querySelector('input[name="description"]').value);
  formData.append('latitude', e.latlng.lat.toFixed(4));
  formData.append('longitude', e.latlng.lng.toFixed(4));

  fetch('https://example.com/api.php', {
    method: 'POST',
    body: formData
  })
  .then(function(response) {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Network response was not ok.');
    }
  })
  .then(function(data) {
    if (data.success) {
      alert('Data submitted successfully!');
    } else {
      alert('An error occurred while submitting data.');
    }
  })
  .catch(function(error) {
    alert('An error occurred while submitting data: ' + error.message);
  });
}
*/
