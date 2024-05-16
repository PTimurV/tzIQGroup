document.addEventListener('DOMContentLoaded', function () {
	const amountSlider = document.getElementById('amount-slider')
	var amountInput = document.getElementById('amount')
	const replenishAmountSlider = document.getElementById(
		'replenishAmount-slider'
	)
	const replenishAmountInput = document.getElementById('replenishAmount')

	noUiSlider.create(amountSlider, {
		start: [10000],
		connect: [true, false],
		range: {
			min: 1000,
			'40%': 10000,
			max: 3000000,
		},
		step: 1000,
		format: {
			to: function (value) {
				return Math.round(value).toLocaleString()
			},
			from: function (value) {
				return Number(value.replace(/,/g, ''))
			},
		},
	})

	noUiSlider.create(replenishAmountSlider, {
		start: [10000],
		connect: [true, false],
		range: {
			min: 1000,
			'40%': 10000,
			max: 3000000,
		},
		step: 1000,
		format: {
			to: function (value) {
				return Math.round(value).toLocaleString()
			},
			from: function (value) {
				return Number(value.replace(/,/g, ''))
			},
		},
	})
	amountInput.addEventListener('change', function () {
		amountSlider.noUiSlider.set(this.value)
	})

	amountInput.addEventListener('keypress', function (e) {
		if (e.keyCode === 13) {
			amountSlider.noUiSlider.set(this.value)
			this.blur()
		}
	})

	amountSlider.noUiSlider.on('update', function (values, handle) {
		amountInput.value = values[handle].replace(/\s/g, '')
	})

	replenishAmountInput.addEventListener('change', function () {
		replenishAmountSlider.noUiSlider.set(this.value)
	})

	replenishAmountInput.addEventListener('keypress', function (e) {
		if (e.keyCode === 13) {
			replenishAmountSlider.noUiSlider.set(this.value)
			this.blur()
		}
	})

	replenishAmountSlider.noUiSlider.on('update', function (values, handle) {
		replenishAmountInput.value = values[handle].replace(/\s/g, '')
	})
})

$(document).ready(function () {
	$('.calculate-btn').click(function (event) {
		event.preventDefault()
		var formData = $('form').serializeArray()

		var dateIsEmpty = true
		formData.forEach(function (item) {
			if (item.name === 'date' && item.value.trim() !== '') {
				dateIsEmpty = false
			}
		})

		if (dateIsEmpty) {
			alert('Дата оформления вклада не заполнена.')
			return
		}
		$.ajax({
			url: 'calc.php',
			type: 'POST',
			data: $('form').serialize(),
			success: function (response) {
				var result = JSON.parse(response)
				$('#result').text(
					result.result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ')
				)
			},
		})
	})
})
