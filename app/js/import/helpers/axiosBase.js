import axios from 'axios';

export const HTTP = axios.create({
	baseURL: `/wp-admin/admin-ajax.php`,
	headers: {
		'Content-Type': 'multipart/form-data'
	},
	onUploadProgress: ((progressEvent) =>
	{

		document.getElementById('spinner').classList.remove('d-none')
		document.getElementById('spinner').classList.add('d-flex')
		document.body.classList.add('overflow-hidden')


	}),
	onDownloadProgress: ((progressEvent) =>
	{
		setTimeout(function ()
		{
			document.getElementById('spinner').classList.remove('d-flex')
			document.getElementById('spinner').classList.add('d-none')
			document.body.classList.remove('overflow-hidden')
		}, 1000)

	}),
})
