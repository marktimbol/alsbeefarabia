Dropzone.options.uploadPhotoForm = {

	init: function() {
		this.on('success', function(file) {
			// If you return JSON as response (with the proper `Content-Type` header
			// it will be parsed properly. So lets say you returned:
			// `{ "fileName": "my-file-2234.jpg" }`

			// Create a hidden input to submit to the server:
			$("form#addNewCategoryForm, form#AddNewMenuForm, form#AddNewStoreForm").append($('<input type="hidden" ' +
				'name="photo" ' +
				'value="' + file.name + '">'));
			
			console.log('filename: ' + file.name);

		}),

		this.on('queuecomplete', function() {
			// Invoked when all files finished uploading
			// Now just submit the form. It will send the filenames along since
			// they are added as hidden input fields.
		});
	},  

	paramName: "photo", // The name that will be used to transfer the file
	maxFilesize: 2, // MB
	uploadMultiple: false,
	acceptFiles: 'image/*'


};