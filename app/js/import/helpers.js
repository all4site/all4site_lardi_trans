export function myError(response, data, counter = 0)
{
	for (let i = counter; i < data.length; i++)
	{
		let name = data.elements[i].name
		let goatID = document.getElementById(name)

		// console.log(goatID)
		if (response.data.data[name] != undefined)
		{
			goatID.classList.add('is-invalid')
			goatID.nextElementSibling.insertAdjacentHTML('afterend', `<div class="invalid-feedback">` + response.data.data[name] + `</div>`)
			return false
		} else
		{
			goatID.classList.add('is-valid')
			goatID.nextElementSibling.insertAdjacentHTML('afterend', `<div class="valid-feedback">Все ок</div>`)
		}
	}
}

export function cleaarErrorMessages()
{
	let invalid = document.querySelectorAll('.is-invalid')
	for (let item of invalid)
	{
		item.classList.remove('is-invalid')
	}

	let valid = document.querySelectorAll('.is-valid')
	for (let item of valid)
	{
		item.classList.remove('is-valid')
	}

	let invalidDiv = document.querySelectorAll('.invalid-feedback')
	for (let item of invalidDiv)
	{
		item.remove()
	}

	let validDiv = document.querySelectorAll('.valid-feedback')
	for (let item of validDiv)
	{
		item.remove()
	}
}

export function addDataToForm(data, excludeInput = [], action)
{

	let form = new FormData();

	data.forEach(e =>
	{
		if (excludeInput.includes(e.type)) return
		form.append(e.name, e.value)
	})

	form.append('action', action)
	return form
}