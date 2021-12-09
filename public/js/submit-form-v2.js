document.querySelectorAll(".submit-form").forEach(
	element => element.addEventListener('click', async function(){
		let send = this.dataset.send;
		let formData = {};
		let headers = {};

		if(typeof this.dataset.id !== 'undefined'){
			formData = new FormData();
			formData.append('id', this.dataset.id);

			headers = {
				'X-CSRF-TOKEN': document.querySelector("meta[name=csrf-token]").getAttribute("content")
			};
		}else{
			formData = new FormData(document.getElementById(this.dataset.form));
		}

		const response = await fetch(send, {
			method: 'POST',
			headers: headers,
			body: formData
		})
		.then(response => response.json())
		.then(result => {
			if(typeof result.data !== 'undefined')
				for (const [key, value] of Object.entries(result.data)) {
					const input = document.querySelector(`[name=${key}]`);
					const static = document.querySelector(`.${key}`);

					if(input != null){
						if(input.tagName == 'INPUT')
							input.value = value;

						if(input.tagName == 'SELECT')
							$(`.menu.${key}-select .item[data-value=${value}]`).click();
							
						if(input.tagName == 'TEXTAREA')
							input.innerHTML = value;
					}

					if(static != null)
						static.innerHTML = value;
				};
			
			

			if(typeof result.errorFields !== 'undefined')
				result.errorFields.forEach(function(name, index){
					document.querySelector(`[name=${name}]`).closest('.field').classList.add(result.color);
					document.querySelector(`[name=${name}]`).classList.add(result.color);
				});				

			if(typeof result.message !== 'undefined')
				$('#main-error').addClass('error').html(result.message).transition('fade up');

			if(typeof result.modal !== 'undefined')
				$(result.modal).modal('show');

			if(typeof result.redirect !== 'undefined')
				if(result.url)
					location.href = result.url;
			
			if(typeof result.reload !== 'undefined')
				location.reload();

			if(typeof result.changeSend !== 'undefined')
				$(result.changeSend[0]).attr('data-send',result.changeSend[1]);
			
			if(typeof result.disable !== 'undefined')
				for (const [key, value] of Object.entries(result.disable)) {
					$(value).attr('disabled','disabled');
				}
				
			if(typeof result.enable !== 'undefined')
				for (const [key, value] of Object.entries(result.enable)) {
					$(value).removeAttr('disabled');
				}
		});
	})
);
